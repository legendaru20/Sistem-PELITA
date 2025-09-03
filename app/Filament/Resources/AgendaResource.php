<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Agenda;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AgendaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AgendaResource\RelationManagers;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')->required()->maxLength(255),
                TextInput::make('alamat')->required()->maxLength(255),
                TextInput::make('author')->default('Admin')->required(),
                
                // Thumbnail utama
                FileUpload::make('thumbnail')
                    ->image()
                    ->directory('agenda-thumbnails')
                    ->label('Thumbnail Utama')
                    ->helperText('Gambar utama untuk daftar agenda (Format: jpg, png)'),
                    
                // Galeri gambar (maksimal 3)
                FileUpload::make('gallery_images')
                    ->multiple()
                    ->image()
                    ->maxFiles(3)
                    ->directory('agenda-galleries')
                    ->label('Galeri Gambar (Maks. 3)')
                    ->helperText('Upload hingga 3 gambar untuk ditampilkan dalam galeri'),
                    
                // Jika ingin menghubungkan dengan kampanye
                Select::make('kampanye_id')
                    ->relationship('kampanye', 'judul_kampanye')
                    ->searchable()
                    ->preload()
                    ->label('Hasil dari Kampanye (Opsional)')
                    ->placeholder('Pilih kampanye terkait (kosongkan jika tidak ada)')
                    ->nullable(),
                    
                RichEditor::make('konten')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')->sortable()->searchable(),
                TextColumn::make('author')->sortable(),
                ImageColumn::make('thumbnail')->size(50),
                TextColumn::make('created_at')->sortable()->label('Tanggal')->dateTime('d M Y'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }
    public static function getNavigationGroup(): ?string
{
    return 'Artikel';
}

}
