<?php

namespace App\Filament\Resources;

use App\Models\Testimonial;
use App\Filament\Resources\TestimonialResource\Pages;
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

class TestimonialResource extends Resource
{
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
        ];
    }

    protected static bool $shouldSkipAuthorization = true;

    protected static ?string $model = Testimonial::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-chat-bubble-left';

    protected static ?string $navigationLabel = 'Testimonials';

    protected static ?string $recordTitleAttribute = 'client_name';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('client_name')->required(),
                Forms\Components\Textarea::make('body')->required(),
                Forms\Components\TextInput::make('service_type'),
                Forms\Components\Toggle::make('is_visible')->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_name')->searchable(),
                Tables\Columns\TextColumn::make('service_type'),
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