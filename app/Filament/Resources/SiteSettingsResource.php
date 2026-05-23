<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingsResource\Pages;
use App\Models\SiteSettings;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

class SiteSettingsResource extends Resource
{
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSettings::route('/'),
        ];
    }

    protected static bool $shouldSkipAuthorization = true;

    protected static ?string $model = SiteSettings::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationLabel = 'Site Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('key')->required(),
                Forms\Components\TextInput::make('value'),
                Forms\Components\Select::make('group')
                    ->options([
                        'general' => 'General',
                        'contact' => 'Contact',
                        'social' => 'Social',
                        'seo' => 'SEO',
                        'stats' => 'Stats',
                    ]),
                Forms\Components\Toggle::make('is_visible')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')->searchable(),
                TextColumn::make('value')->limit(50),
                TextColumn::make('group'),
                IconColumn::make('is_visible')->boolean(),
            ])
            ->filters([
                SelectFilter::make('group'),
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
}