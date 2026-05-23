<?php

namespace App\Filament\Resources;

use App\Models\ContactMessage;
use App\Filament\Resources\ContactMessageResource\Pages;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use App\Models\Category;

class ContactMessageResource extends Resource
{
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
        ];
    }

    protected static bool $shouldSkipAuthorization = true;

    protected static ?string $model = ContactMessage::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationLabel = 'Contact Messages';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Select::make('category_id')->label('Project Type')->options(Category::where('is_active', true)->pluck('name', 'id')),
                Forms\Components\TextInput::make('subject'),
                Forms\Components\Textarea::make('body')->rows(5),
                Forms\Components\Toggle::make('is_read'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('category.name')->label('Project Type'),
                Tables\Columns\TextColumn::make('subject'),
                Tables\Columns\IconColumn::make('is_read')->boolean(),
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