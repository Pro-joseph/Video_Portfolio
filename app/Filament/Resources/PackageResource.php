<?php

namespace App\Filament\Resources;

use App\Models\Package;
use App\Filament\Resources\PackageResource\Pages;
use BackedEnum;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class PackageResource extends Resource
{
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPackages::route('/'),
        ];
    }

    protected static bool $shouldSkipAuthorization = true;

    protected static ?string $model = Package::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationLabel = 'Services';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\Textarea::make('description'),
                Forms\Components\TextInput::make('price')->numeric()->prefix('$'),
                Forms\Components\TagsInput::make('features'),
                Forms\Components\Toggle::make('is_active')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('price')->money(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->recordActions([
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