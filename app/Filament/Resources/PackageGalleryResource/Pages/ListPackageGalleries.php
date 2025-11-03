<?php

namespace App\Filament\Resources\PackageGalleryResource\Pages;

use App\Filament\Resources\PackageGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPackageGalleries extends ListRecords
{
    protected static string $resource = PackageGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
