<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KampanyeDisetujuiResource\Pages;
use App\Models\Kampanye;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KampanyeDisetujuiResource extends Resource
{
    protected static ?string $model = Kampanye::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static ?string $navigationGroup = 'Kampanye';
    
    protected static ?string $navigationLabel = 'List Kampanye Aktif';
    
    protected static ?int $navigationSort = 2;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('status', 'disetujui');
    }

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
                    ->seconds(false)
                    ->timezone('Asia/Jakarta'),
                Forms\Components\DateTimePicker::make('tanggal_selesai')
                    ->required()
                    ->seconds(false)
                    ->timezone('Asia/Jakarta')
                    ->after('tanggal_mulai'),
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
                    ->dateTime()
                    ->sortable()
                    ->label('Waktu Mulai')
                    ->timezone('Asia/Jakarta'),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->dateTime()
                    ->sortable()
                    ->label('Waktu Selesai')
                    ->timezone('Asia/Jakarta'),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->circular(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => 'success'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make()
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Kampanye')
                    ->modalDescription('Apakah Anda yakin ingin menghapus kampanye ini? Tindakan ini tidak dapat dibatalkan.')
                    ->modalSubmitActionLabel('Ya, Hapus'),
            ])
            ->bulkActions([
                // No bulk actions needed for approved kampanye
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
            'index' => Pages\ListKampanyeDisetujui::route('/'),
            'view' => Pages\ViewKampanyeDisetujui::route('/{record}'),
        ];
    }
}
