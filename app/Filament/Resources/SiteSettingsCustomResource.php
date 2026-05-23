<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingsCustomResource\Pages;
use App\Models\SiteCustomization;
use BackedEnum;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class SiteSettingsCustomResource extends Resource
{
    protected static ?string $model = SiteCustomization::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-paint-brush';

    protected static ?int $navigationSort = 11;

    protected static ?string $navigationLabel = 'Site Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('key')
                    ->required()
                    ->unique(ignorable: fn (?SiteCustomization $record): ?SiteCustomization => $record),
                Forms\Components\TextInput::make('value')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->options([
                        'text' => 'Text',
                        'color' => 'Color',
                        'image' => 'Image',
                        'boolean' => 'Yes/No',
                        'number' => 'Number',
                    ])
                    ->default('text'),
                Forms\Components\Select::make('group')
                    ->options([
                        'header' => 'Header',
                        'footer' => 'Footer',
                        'colors' => 'Colors',
                        'logo' => 'Logo',
                        'social' => 'Social Media',
                        'contact' => 'Contact Info',
                        'general' => 'General',
                    ])
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('key'),
                \Filament\Tables\Columns\TextColumn::make('value')
                    ->limit(50),
                \Filament\Tables\Columns\TextColumn::make('type'),
                \Filament\Tables\Columns\TextColumn::make('group'),
                \Filament\Tables\Columns\IconColumn::make('is_active')->boolean(),
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
            'index' => Pages\ListSiteCustomizations::route('/'),
            'create' => Pages\CreateSiteCustomization::route('/create'),
            'edit' => Pages\EditSiteCustomization::route('/{record}/edit'),
        ];
    }
}