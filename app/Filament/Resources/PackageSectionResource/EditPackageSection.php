<?php

namespace App\Filament\Resources\PackageSectionResource\Pages;

use App\Filament\Resources\PackageSectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPackageSection extends EditRecord
{
    protected static string $resource = PackageSectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
