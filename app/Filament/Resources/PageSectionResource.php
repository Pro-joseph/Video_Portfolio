<?php

namespace App\Filament\Resources;

use App\Models\PageSection;
use App\Filament\Resources\PageSectionResource\Pages;
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

class PageSectionResource extends Resource
{
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageSections::route('/'),
        ];
    }

    protected static bool $shouldSkipAuthorization = true;

    protected static ?string $model = PageSection::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Page Sections';

    protected static ?string $recordTitleAttribute = 'key';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('key')->required()->hint('e.g. hero, about, cta'),
                Forms\Components\TextInput::make('title'),
                Forms\Components\TextInput::make('subtitle'),
                Forms\Components\Textarea::make('body'),
                Forms\Components\FileUpload::make('image_path')->label('Images')->image()->disk('public')->directory('page-sections')->multiple()->imageEditor()->reorderable(),
                Forms\Components\Toggle::make('is_visible')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')->searchable(),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\IconColumn::make('is_visible')->boolean(),
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