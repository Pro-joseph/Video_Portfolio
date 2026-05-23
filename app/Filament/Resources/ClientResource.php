<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Models\Client;
use BackedEnum;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->unique(ignorable: fn (?Client $record): ?Client => $record)
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->directory('clients/logos'),
                Forms\Components\Toggle::make('is_active')
                    ->default(true),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('logo'),
                \Filament\Tables\Columns\TextColumn::make('name')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('slug'),
                \Filament\Tables\Columns\IconColumn::make('is_active')->boolean(),
                \Filament\Tables\Columns\TextColumn::make('order')->sortable(),
                \Filament\Tables\Columns\TextColumn::make('images_count')
                    ->counts('images')
                    ->label('Images'),
            ])
            ->defaultSort('order')
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('is_active')
                    ->options(['1' => 'Active', '0' => 'Inactive']),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}