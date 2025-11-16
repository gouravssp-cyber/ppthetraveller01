<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class FilterProducts extends Component
{
    use WithPagination;

    public $selectedCategories = [];
    public $selectedBrands = [];
    public $selectedColors = [];
    public $selectedSizes = [];
    public $minPrice = 0;
    public $maxPrice = 10000;
    public $sortBy = 'latest';

    protected $queryString = [
        'selectedCategories' => ['except' => []],
        'selectedBrands' => ['except' => []],
        'selectedColors' => ['except' => []],
        'selectedSizes' => ['except' => []],
        'minPrice' => ['except' => 0],
        'maxPrice' => ['except' => 10000],
        'sortBy' => ['except' => 'latest'],
    ];

    public function mount()
    {
        // Initialize max price from database if needed
        $this->maxPrice = Product::where('is_active', true)->max('max_price') ?? 10000;
    }

    public function updated($propertyName)
    {
        // Reset pagination when filters change
        if (!in_array($propertyName, ['sortBy'])) {
            $this->resetPage();
        }
    }

    public function clearFilters()
    {
        $this->selectedCategories = [];
        $this->selectedBrands = [];
        $this->selectedColors = [];
        $this->selectedSizes = [];
        $this->minPrice = 0;
        $this->maxPrice = Product::where('is_active', true)->max('max_price') ?? 10000;
        $this->sortBy = 'latest';
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::where('is_active', true)
            ->with('category');

        // Apply category filter
        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }

        // Apply brand filter
        if (!empty($this->selectedBrands)) {
            $query->whereIn('brand', $this->selectedBrands);
        }

        // Apply color filter
        if (!empty($this->selectedColors)) {
            $query->whereIn('color', $this->selectedColors);
        }

        // Apply size filter
        if (!empty($this->selectedSizes)) {
            $query->where(function ($q) {
                foreach ($this->selectedSizes as $size) {
                    $q->orWhereJsonContains('sizes', $size);
                }
            });
        }

        // Apply price filter
        $query->where(function ($q) {
            $q->where(function ($subQ) {
                $subQ->whereBetween('min_price', [$this->minPrice, $this->maxPrice])
                    ->orWhereBetween('max_price', [$this->minPrice, $this->maxPrice])
                    ->orWhere(function ($priceQ) {
                        $priceQ->where('min_price', '<=', $this->minPrice)
                            ->where('max_price', '>=', $this->maxPrice);
                    });
            });
        });

        // Apply sorting
        switch ($this->sortBy) {
            case 'price_low':
                $query->orderBy('min_price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('max_price', 'desc');
                break;
            case 'name':
                $query->orderBy('product_name', 'asc');
                break;
            case 'latest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }

        $products = $query->paginate(12);

        // Get filter options
        $categories = Category::where('is_active', true)->orderBy('name')->get();
        $brands = Product::where('is_active', true)
            ->whereNotNull('brand')
            ->distinct()
            ->pluck('brand')
            ->sort()
            ->values();
        $colors = Product::where('is_active', true)
            ->whereNotNull('color')
            ->distinct()
            ->pluck('color')
            ->sort()
            ->values();
        $sizes = Product::where('is_active', true)
            ->whereNotNull('sizes')
            ->get()
            ->pluck('sizes')
            ->flatten()
            ->unique()
            ->sort()
            ->values();

        $priceRange = [
            'min' => Product::where('is_active', true)->min('min_price') ?? 0,
            'max' => Product::where('is_active', true)->max('max_price') ?? 10000,
        ];

        return view('livewire.filter-products', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'colors' => $colors,
            'sizes' => $sizes,
            'priceRange' => $priceRange,
        ]);
    }
}
