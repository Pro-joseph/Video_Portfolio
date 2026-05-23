<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryImageResource\Pages;
use App\Models\GalleryImage;
use BackedEnum;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class GalleryImageResource extends Resource
{
    protected static ?string $model = GalleryImage::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-photo';

    protected static ?int $navigationSort = 9;

    protected static ?string $navigationLabel = 'Gallery';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\Select::make('client_id')
                    ->relationship('client', 'name')
                    ->required(),
                Forms\Components\FileUpload::make('image_path')
                    ->image()
                    ->disk('public')
                    ->directory('gallery')
                    ->required(),
                Forms\Components\TextInput::make('caption')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image_path'),
                \Filament\Tables\Columns\TextColumn::make('client.name'),
                \Filament\Tables\Columns\TextColumn::make('caption'),
                \Filament\Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('client_id')
                    ->relationship('client', 'name'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleryImages::route('/'),
            'create' => Pages\CreateGalleryImage::route('/create'),
            'edit' => Pages\EditGalleryImage::route('/{record}/edit'),
        ];
    }
}