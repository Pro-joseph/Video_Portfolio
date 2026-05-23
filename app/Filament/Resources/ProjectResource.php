<?php

namespace App\Filament\Resources;

use App\Models\Project;
use App\Filament\Resources\ProjectResource\Pages;
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
use App\Filament\Resources\ProjectResource\RelationManagers\MediaRelationManager;

class ProjectResource extends Resource
{
    public static function getRelationManagers(array $parameters = []): array
    {
        return [
            new MediaRelationManager($parameters),
        ];
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }

    protected static bool $shouldSkipAuthorization = true;

    protected static ?string $model = Project::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $navigationLabel = 'Projects';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('title')->required(),
                Select::make('category_id')->label('Category')->options(Category::where('is_active', true)->pluck('name', 'id')),
                Forms\Components\Textarea::make('description'),
                Forms\Components\FileUpload::make('cover_image')->label('Cover Image')->image()->disk('public')->directory('projects')->imageEditor(),
                Forms\Components\Toggle::make('is_reels')->label('Reels Format'),
                Forms\Components\Toggle::make('is_featured'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('category.name')->label('Category'),
                Tables\Columns\IconColumn::make('is_reels')->boolean()->label('Reels'),
                Tables\Columns\IconColumn::make('is_featured')->boolean()->label('Featured'),
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