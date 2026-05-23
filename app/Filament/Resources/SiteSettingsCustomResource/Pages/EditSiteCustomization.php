<?php

namespace App\Filament\Resources\SiteSettingsCustomResource\Pages;

use App\Filament\Resources\SiteSettingsCustomResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSiteCustomization extends EditRecord
{
    protected static string $resource = SiteSettingsCustomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}