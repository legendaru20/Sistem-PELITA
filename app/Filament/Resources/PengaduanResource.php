<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pengaduan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use App\Filament\Resources\PengaduanResource\Pages;
use Illuminate\Support\Facades\Mail;
use App\Mail\PengaduanDiterimaMail;
use App\Mail\PengaduanPendingMail;
use App\Mail\PengaduanSedangDiatasiMail;
use App\Mail\PengaduanTelahSelesaiMail;
use App\Mail\PengaduanDitolakMail;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-triangle';

    protected static ?string $navigationLabel = 'Pengaduan';

    protected static ?int $navigationSort = 3;

    protected static function checkStatus($record, $status, $comparison = '=='): bool
    {
        if (!$record) {
            return false;
        }
        
        return $comparison === '==' 
            ? $record->status === $status 
            : $record->status !== $status;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nik')
                    ->label('NIK KTP')
                    ->required()
                    ->maxLength(16)
                    ->minLength(16),
                Forms\Components\TextInput::make('nomor_wa')
                    ->label('Nomor WhatsApp')
                    ->tel()
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lokasi_pengaduan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi_pengaduan')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('lampiran_foto')
                    ->image()
                    ->multiple()
                    ->minFiles(2)
                    ->required()
                    ->directory('pengaduan/foto'),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'sedang_diatasi' => 'Sedang Diatasi',
                        'telah_selesai' => 'Telah Selesai',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('pending')
                    ->reactive(),
                Forms\Components\TextInput::make('dinas_penanggung_jawab')
                    ->maxLength(255)
                    ->hidden(fn (callable $get) => in_array($get('status'), ['pending', 'ditolak']))
                    ->requiredIf('status', ['sedang_diatasi', 'telah_selesai']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lokasi_pengaduan')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Tanggal Pengaduan'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'sedang_diatasi' => 'Sedang Diatasi',
                        'telah_selesai' => 'Telah Selesai',
                        'ditolak' => 'Ditolak',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'sedang_diatasi' => 'info',
                        'telah_selesai' => 'success',
                        'ditolak' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('dinas_penanggung_jawab')
                    ->label('Dinas Penanggung Jawab')
                    ->placeholder('-')
                    ->visible(fn ($record) => $record && in_array($record->status, ['sedang_diatasi', 'telah_selesai'])),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'sedang_diatasi' => 'Sedang Diatasi',
                        'telah_selesai' => 'Telah Selesai',
                        'ditolak' => 'Ditolak',
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('setStatusPending')
                        ->label('Set Pending')
                        ->icon('heroicon-o-clock')
                        ->color('warning')
                        ->visible(fn ($record) => $record && $record->status !== 'pending')
                        ->action(function ($record) {
                            $oldStatus = $record->status;
                            $record->update(['status' => 'pending']);
                            
                            // Kirim email notifikasi
                            try {
                                Mail::to($record->email)->send(new PengaduanPendingMail($record));
                                Notification::make()
                                    ->title('Email berhasil dikirim')
                                    ->success()
                                    ->send();
                            } catch (\Exception $e) {
                                Notification::make()
                                    ->title('Gagal mengirim email')
                                    ->body($e->getMessage())
                                    ->danger()
                                    ->send();
                            }
                        }),
                    
                    Tables\Actions\Action::make('setStatusSedangDiatasi')
                        ->label('Set Sedang Diatasi')
                        ->icon('heroicon-o-cog')
                        ->color('info')
                        ->visible(fn ($record) => $record && $record->status !== 'sedang_diatasi')
                        ->form([
                            Forms\Components\TextInput::make('dinas_penanggung_jawab')
                                ->label('Dinas Penanggung Jawab')
                                ->required()
                                ->maxLength(255),
                        ])
                        ->action(function ($record, array $data) {
                            $oldStatus = $record->status;
                            $record->update([
                                'status' => 'sedang_diatasi',
                                'dinas_penanggung_jawab' => $data['dinas_penanggung_jawab'],
                            ]);
                            
                            // Kirim email notifikasi
                            try {
                                Mail::to($record->email)->send(new PengaduanSedangDiatasiMail($record));
                                Notification::make()
                                    ->title('Email berhasil dikirim')
                                    ->success()
                                    ->send();
                            } catch (\Exception $e) {
                                Notification::make()
                                    ->title('Gagal mengirim email')
                                    ->body($e->getMessage())
                                    ->danger()
                                    ->send();
                            }
                        }),
                        
                    Tables\Actions\Action::make('setStatusTelahSelesai')
                        ->label('Set Telah Selesai')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(fn ($record) => $record && $record->status !== 'telah_selesai')
                        ->form([
                            Forms\Components\TextInput::make('dinas_penanggung_jawab')
                                ->label('Dinas Penanggung Jawab')
                                ->required()
                                ->maxLength(255)
                                // Isi nilai default jika sudah ada sebelumnya
                                ->default(fn ($record) => $record->dinas_penanggung_jawab),
                        ])
                        ->action(function ($record, array $data) {
                            $oldStatus = $record->status;
                            $record->update([
                                'status' => 'telah_selesai',
                                'dinas_penanggung_jawab' => $data['dinas_penanggung_jawab'],
                            ]);
                            
                            // Kirim email notifikasi
                            try {
                                Mail::to($record->email)->send(new PengaduanTelahSelesaiMail($record));
                                Notification::make()
                                    ->title('Email berhasil dikirim')
                                    ->success()
                                    ->send();
                            } catch (\Exception $e) {
                                Notification::make()
                                    ->title('Gagal mengirim email')
                                    ->body($e->getMessage())
                                    ->danger()
                                    ->send();
                            }
                        }),
                        
                    Tables\Actions\Action::make('setStatusDitolak')
                        ->label('Set Ditolak')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->visible(fn ($record) => $record && $record->status !== 'ditolak')
                        ->action(function ($record) {
                            $oldStatus = $record->status;
                            $record->update(['status' => 'ditolak']);
                            
                            // Kirim email notifikasi
                            try {
                                Mail::to($record->email)->send(new PengaduanDitolakMail($record));
                                Notification::make()
                                    ->title('Email berhasil dikirim')
                                    ->success()
                                    ->send();
                            } catch (\Exception $e) {
                                Notification::make()
                                    ->title('Gagal mengirim email')
                                    ->body($e->getMessage())
                                    ->danger()
                                    ->send();
                            }
                        }),
                ])
                    ->label('Ubah Status')
                    ->icon('heroicon-o-adjustments-horizontal'),
                    
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Pengaduan')
                    ->modalDescription('Apakah Anda yakin ingin menghapus pengaduan ini? Tindakan ini tidak dapat dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus'),
                
                // Tambahkan di sini
                Tables\Actions\Action::make('downloadLaporan')
                    ->label('Download Laporan')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->visible(fn ($record) => $record && in_array($record->status, ['sedang_diatasi', 'telah_selesai']))
                    ->url(fn ($record) => route('pengaduan.generate-pdf', $record))
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
            'view' => Pages\ViewPengaduan::route('/{record}'),
        ];
    }
}
