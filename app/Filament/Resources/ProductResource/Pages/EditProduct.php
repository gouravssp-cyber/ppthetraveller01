<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\ProductSeo;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load SEO data
        $seo = $this->record->seo;
        if ($seo) {
            $data['seo'] = [
                'meta_title' => $seo->meta_title,
                'meta_description' => $seo->meta_description,
                'meta_keywords' => $seo->meta_keywords,
                'canonical_url' => $seo->canonical_url,
                'og_title' => $seo->og_title,
                'og_description' => $seo->og_description,
                'og_image' => $seo->og_image,
                'twitter_title' => $seo->twitter_title,
                'twitter_description' => $seo->twitter_description,
                'twitter_image' => $seo->twitter_image,
                'schema_markup' => $seo->schema_markup,
            ];
        }

        // Load sections
        $data['sections'] = $this->record->sections->pluck('id')->toArray();

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Extract SEO data
        $seoData = $data['seo'] ?? [];
        unset($data['seo']);

        // Extract sections data
        $sections = $data['sections'] ?? [];
        unset($data['sections']);

        // Store for after save
        $this->seoData = $seoData;
        $this->sections = $sections;

        return $data;
    }

    protected function afterSave(): void
    {
        $product = $this->record;

        // Save or update SEO data
        if (!empty($this->seoData)) {
            $product->seo()->updateOrCreate(
                ['product_id' => $product->id],
                $this->seoData
            );
        }

        // Sync sections
        $product->sections()->sync($this->sections ?? []);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected array $sections = [];
    protected array $seoData = [];
}
