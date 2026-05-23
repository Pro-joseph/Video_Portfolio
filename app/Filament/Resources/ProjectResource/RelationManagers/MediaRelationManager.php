<?php

namespace App\Filament\Resources\ProjectResource\RelationManagers;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Schemas\Schema;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;

class MediaRelationManager extends RelationManager
{
    protected static string $relationship = 'media';

    public function form(Schema $schema): Schema
    {
        return $schema->columns(1)->components([
            TextInput::make('video_url')
                ->label('Video URL')
                ->placeholder('YouTube, Vimeo, or Google Drive link')
                ->required()
                ->url(),
            Select::make('type')
                ->label('Video Type')
                ->options([
                    'youtube' => 'YouTube',
                    'vimeo' => 'Vimeo',
                    'google_drive' => 'Google Drive',
                    'direct' => 'Direct Link',
                ])
                ->default('youtube'),
            TextInput::make('order')
                ->numeric()
                ->default(0),
        ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('video_url')->limit(50)->label('URL'),
                TextColumn::make('type')->label('Type'),
                TextColumn::make('order')->label('Order'),
            ])
            ->headerActions([
                CreateAction::make(),
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