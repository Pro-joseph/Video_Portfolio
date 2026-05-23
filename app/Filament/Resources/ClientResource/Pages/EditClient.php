<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use App\Models\GalleryImage;
use App\Models\Client;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('upload_images')
                ->label('Upload Images')
                ->icon('heroicon-o-photo')
                ->color('warning')
                ->form([
                    FileUpload::make('images')
                        ->multiple()
                        ->image()
                        ->disk('public')
                        ->directory('gallery')
                        ->required(),
                    TextInput::make('caption')->label('Caption (optional)'),
                    Toggle::make('is_active')->label('Active')->default(true),
                ])
                ->action(function (array $data, Client $record) {
                    $order = GalleryImage::where('client_id', $record->id)->max('order') + 1 ?? 0;
                    
                    foreach ($data['images'] as $imagePath) {
                        GalleryImage::create([
                            'client_id' => $record->id,
                            'image_path' => $imagePath,
                            'caption' => $data['caption'] ?? null,
                            'is_active' => $data['is_active'] ?? true,
                            'order' => $order++,
                        ]);
                    }

                    Notification::make()
                        ->title('Images uploaded successfully!')
                        ->success()
                        ->send();
                })
                ->modalHeading('Upload Images for ' . $this->record->name ?? 'Client')
                ->modalWidth('lg'),
            Actions\DeleteAction::make(),
        ];
    }
}