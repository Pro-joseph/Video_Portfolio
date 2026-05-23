<?php

namespace App\Filament\Resources\SiteSettingsCustomResource\Pages;

use App\Filament\Resources\SiteSettingsCustomResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSiteCustomizations extends ListRecords
{
    protected static string $resource = SiteSettingsCustomResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}