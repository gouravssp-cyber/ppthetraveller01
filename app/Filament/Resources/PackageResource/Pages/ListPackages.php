<?php

namespace App\Filament\Resources\PackageResource\Pages;

use App\Filament\Resources\PackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPackages extends ListRecords
{
    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Packages')
                ->badge(fn () => $this->getModel()::count()),

            'published' => Tab::make('Published')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'published'))
                ->badge(fn () => $this->getModel()::where('status', 'published')->count()),

            'draft' => Tab::make('Drafts')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'draft'))
                ->badge(fn () => $this->getModel()::where('status', 'draft')->count()),

            'featured' => Tab::make('Featured')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('featured', true))
                ->badge(fn () => $this->getModel()::where('featured', true)->count()),

            'legacy' => Tab::make('Legacy')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('migrated_from_legacy', true))
                ->badge(fn () => $this->getModel()::where('migrated_from_legacy', true)->count()),
        ];
    }
}
