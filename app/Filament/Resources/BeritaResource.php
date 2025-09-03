<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('author')
                    ->default('Admin')
                    ->required(),
                    
                FileUpload::make('thumbnail')
                    ->image()
                    ->directory('beritas')
                    ->visibility('public'),
                    
                // Tambahkan field untuk pilih pengaduan yang telah selesai
                Select::make('pengaduan_id')
                    ->label('Hasil dari Pengaduan (Opsional)')
                    ->options(function () {
                        return Pengaduan::where('status', 'telah_selesai')
                            ->pluck('deskripsi_pengaduan', 'id');
                    })
                    ->searchable()
                    ->preload()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state) {
                            $pengaduan = Pengaduan::find($state);
                            $set('alamat', $pengaduan->lokasi_pengaduan);
                        }
                    })
                    ->helperText('Pilih pengaduan yang sudah selesai ditangani untuk dibuatkan beritanya'),
                    
                RichEditor::make('konten')
                    ->required()
                    ->extraInputAttributes(['class' => 'hide-attachments-name'])
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('beritas-attachment'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('author')
                    ->sortable(),
                ImageColumn::make('thumbnail')
                    ->size(50),
                TextColumn::make('pengaduan.deskripsi_pengaduan')
                    ->label('Pengaduan Terkait')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->pengaduan ? $record->pengaduan->deskripsi_pengaduan : null)
                    ->placeholder('Bukan dari pengaduan'),
                TextColumn::make('created_at')
                    ->sortable()
                    ->label('Tanggal')
                    ->dateTime('d M Y'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('has_pengaduan')
                    ->label('Jenis Berita')
                    ->options([
                        '1' => 'Dari Pengaduan',
                        '0' => 'Berita Umum',
                    ])
                    ->query(function ($query, array $data) {
                        if ($data['value'] === '1') {
                            return $query->whereNotNull('pengaduan_id');
                        }
                        if ($data['value'] === '0') {
                            return $query->whereNull('pengaduan_id');
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Artikel';
    }
}
