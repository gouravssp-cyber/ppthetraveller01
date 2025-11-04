<?php

namespace App\Filament\Resources\PackageSectionResource\Pages;

use App\Filament\Resources\PackageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPackageSections extends ListRecords
{
    protected static string $resource = PackageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
