<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kampanye;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KampanyeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\KampanyeResource\RelationManagers;
use App\Mail\KampanyeDisetujuiMail;
use App\Mail\KampanyeDitolakMail;
use App\Mail\KampanyePendingMail;
use Illuminate\Support\Facades\Mail;

class KampanyeResource extends Resource
{
    protected static ?string $model = Kampanye::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationGroup = 'Kampanye';
    
    protected static ?string $navigationLabel = 'Pengajuan Kampanye';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pengaju')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email_pengaju')  // Tambahkan field email
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('wa_pengaju')     // Tambahkan field WhatsApp
                    ->label('Nomor WhatsApp')
                    ->tel()
                    ->required()
                    ->maxLength(15),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(16)
                    ->minLength(16),
                Forms\Components\TextInput::make('judul_kampanye')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('lokasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tanggal_mulai')
                    ->required()
                    ->seconds(false) // Hilangkan detik untuk tampilan yang lebih bersih
                    ->timezone('Asia/Jakarta'), // Sesuaikan dengan timezone Indonesia
                Forms\Components\DateTimePicker::make('tanggal_selesai')
                    ->required()
                    ->seconds(false)
                    ->timezone('Asia/Jakarta')
                    ->after('tanggal_mulai'), // Validasi tanggal selesai harus setelah tanggal mulai
                Forms\Components\FileUpload::make('proposal')
                    ->required()
                    ->acceptedFileTypes(['application/pdf'])
                    ->directory('kampanye/proposals')
                    ->label('Proposal (PDF)'),
                Forms\Components\FileUpload::make('thumbnail')
                    ->required()
                    ->image()
                    ->directory('kampanye/thumbnails'),
                Forms\Components\FileUpload::make('banner_images')
                    ->required()
                    ->multiple()
                    ->minFiles(3)
                    ->maxFiles(3)
                    ->image()
                    ->directory('kampanye/banners')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('rekening_donasi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'disetujui' => 'Disetujui',
                        'ditolak' => 'Ditolak',
                    ])
                    ->default('pending'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pengaju')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_pengaju')  // Tambahkan kolom email
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('wa_pengaju')     // Tambahkan kolom WhatsApp
                    ->label('WhatsApp')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('judul_kampanye')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->dateTime() // Tampilkan tanggal dan waktu
                    ->sortable()
                    ->label('Waktu Mulai')
                    ->timezone('Asia/Jakarta'), // Sesuaikan dengan timezone Indonesia
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->dateTime()
                    ->sortable()
                    ->label('Waktu Selesai')
                    ->timezone('Asia/Jakarta'),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->circular(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'disetujui' => 'success',
                        'ditolak' => 'danger',
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'disetujui' => 'Disetujui',
                        'ditolak' => 'Ditolak',
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('setStatusPending')
                        ->label('Set Pending')
                        ->icon('heroicon-o-clock')
                        ->color('warning')
                        ->visible(fn ($record) => $record->status !== 'pending')
                        ->action(function ($record) {
                            $oldStatus = $record->status;
                            $record->update(['status' => 'pending']);
                            
                            // Kirim email notifikasi
                            if ($record->email_pengaju) {
                                try {
                                    Mail::to($record->email_pengaju)->send(new KampanyePendingMail($record));
                                    Notification::make()
                                        ->title('Email berhasil dikirim ke pengaju')
                                        ->success()
                                        ->send();
                                } catch (\Exception $e) {
                                    Notification::make()
                                        ->title('Gagal mengirim email')
                                        ->body($e->getMessage())
                                        ->danger()
                                        ->send();
                                }
                            }
                        }),
                    Tables\Actions\Action::make('setStatusDisetujui')
                        ->label('Setujui')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->visible(fn ($record) => $record->status !== 'disetujui')
                        ->action(function ($record) {
                            $oldStatus = $record->status;
                            $record->update(['status' => 'disetujui']);
                            
                            // Kirim email notifikasi
                            if ($record->email_pengaju) {
                                try {
                                    Mail::to($record->email_pengaju)->send(new KampanyeDisetujuiMail($record));
                                    Notification::make()
                                        ->title('Email berhasil dikirim ke pengaju')
                                        ->success()
                                        ->send();
                                } catch (\Exception $e) {
                                    Notification::make()
                                        ->title('Gagal mengirim email')
                                        ->body($e->getMessage())
                                        ->danger()
                                        ->send();
                                }
                            }
                        }),
                    Tables\Actions\Action::make('setStatusDitolak')
                        ->label('Tolak')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->visible(fn ($record) => $record->status !== 'ditolak')
                        ->modalHeading('Tolak Kampanye')
                        ->modalDescription('Apakah Anda yakin ingin menolak kampanye ini?')
                        ->modalSubmitActionLabel('Ya, Tolak')
                        ->action(function ($record) {
                            $oldStatus = $record->status;
                            $record->update(['status' => 'ditolak']);
                            
                            // Kirim email notifikasi
                            if ($record->email_pengaju) {
                                try {
                                    Mail::to($record->email_pengaju)->send(new KampanyeDitolakMail($record));
                                    Notification::make()
                                        ->title('Email berhasil dikirim ke pengaju')
                                        ->success()
                                        ->send();
                                } catch (\Exception $e) {
                                    Notification::make()
                                        ->title('Gagal mengirim email')
                                        ->body($e->getMessage())
                                        ->danger()
                                        ->send();
                                }
                            }
                        }),
                ])
                    ->label('Ubah Status')
                    ->icon('heroicon-o-adjustments-horizontal'),
                    
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Kampanye')
                    ->modalDescription('Apakah Anda yakin ingin menghapus kampanye ini? Tindakan ini tidak dapat dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus'),
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
            'index' => Pages\ListKampanyes::route('/'),
            'create' => Pages\CreateKampanye::route('/create'),
            'view' => Pages\ViewKampanye::route('/{record}'),
            'edit' => Pages\EditKampanye::route('/{record}/edit'),
        ];
    }
}
