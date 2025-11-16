<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\ProductSeo;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Extract SEO data
        $seoData = $data['seo'] ?? [];
        unset($data['seo']);

        // Extract sections data
        $sections = $data['sections'] ?? [];
        unset($data['sections']);

        // Store sections for after creation
        $this->sections = $sections;
        $this->seoData = $seoData;

        return $data;
    }

    protected function afterCreate(): void
    {
        $product = $this->record;

        // Save SEO data
        if (!empty($this->seoData)) {
            $this->seoData['product_id'] = $product->id;
            ProductSeo::create($this->seoData);
        }

        // Sync sections
        if (!empty($this->sections)) {
            $product->sections()->sync($this->sections);
        }
    }

    protected array $sections = [];
    protected array $seoData = [];
}
