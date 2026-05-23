<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use App\Filament\Resources\ProjectResource\RelationManagers\MediaRelationManager;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    public function getRelationManagers(): array
    {
        return [
            MediaRelationManager::make(),
        ];
    }
}