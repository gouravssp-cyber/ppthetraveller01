<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Filter Sidebar -->
        <aside class="w-full lg:w-80 flex-shrink-0">
            <div class="rounded-lg shadow-md p-6 sticky top-4" style="background-color: var(--color-white);">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold" style="color: var(--color-text);">Filters</h2>
                    <button 
                        wire:click="clearFilters" 
                        class="text-sm font-medium transition-colors"
                        style="color: var(--color-primary);"
                        onmouseover="this.style.color='var(--color-primary-hover)'"
                        onmouseout="this.style.color='var(--color-primary)'"
                    >
                        Clear All
                    </button>
                </div>

                <!-- Category Filter -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-3" style="color: var(--color-text);">Category</h3>
                    <div class="space-y-2 max-h-48 overflow-y-auto">
                        @foreach($categories as $category)
                            <label class="flex items-center space-x-2 cursor-pointer p-2 rounded transition-colors" 
                                   style="color: var(--color-text);"
                                   onmouseover="this.style.backgroundColor='var(--color-accent)'"
                                   onmouseout="this.style.backgroundColor='transparent'">
                                <input 
                                    type="checkbox" 
                                    wire:model.live="selectedCategories" 
                                    value="{{ $category->id }}"
                                    class="w-4 h-4 rounded focus:ring-2"
                                    style="accent-color: var(--color-primary); border-color: var(--color-border);"
                                >
                                <span style="color: var(--color-text);">{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Brand Filter -->
                @if($brands->count() > 0)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-3" style="color: var(--color-text);">Brand</h3>
                    <div class="space-y-2 max-h-48 overflow-y-auto">
                        @foreach($brands as $brand)
                            <label class="flex items-center space-x-2 cursor-pointer p-2 rounded transition-colors"
                                   onmouseover="this.style.backgroundColor='var(--color-accent)'"
                                   onmouseout="this.style.backgroundColor='transparent'">
                                <input 
                                    type="checkbox" 
                                    wire:model.live="selectedBrands" 
                                    value="{{ $brand }}"
                                    class="w-4 h-4 rounded focus:ring-2"
                                    style="accent-color: var(--color-primary); border-color: var(--color-border);"
                                >
                                <span style="color: var(--color-text);">{{ $brand }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Color Filter -->
                @if($colors->count() > 0)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-3" style="color: var(--color-text);">Color</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($colors as $color)
                            <label class="relative cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    wire:model.live="selectedColors" 
                                    value="{{ $color }}"
                                    class="sr-only filter-color-checkbox"
                                >
                                <span class="filter-color-label inline-block px-4 py-2 rounded-full text-sm font-medium border-2 transition-colors"
                                      style="border-color: var(--color-border); color: var(--color-text);"
                                      onmouseover="this.style.borderColor='var(--color-primary)'"
                                      onmouseout="this.style.borderColor='var(--color-border)'">
                                    {{ $color }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Size Filter -->
                @if($sizes->count() > 0)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-3" style="color: var(--color-text);">Size</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($sizes as $size)
                            <label class="relative cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    wire:model.live="selectedSizes" 
                                    value="{{ $size }}"
                                    class="sr-only filter-size-checkbox"
                                >
                                <span class="filter-size-label inline-block w-12 h-12 rounded border-2 flex items-center justify-center font-semibold transition-colors"
                                      style="border-color: var(--color-border); color: var(--color-text);"
                                      onmouseover="this.style.borderColor='var(--color-primary)'"
                                      onmouseout="this.style.borderColor='var(--color-border)'">
                                    {{ $size }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Price Range Filter -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-3" style="color: var(--color-text);">Price Range</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="block text-sm mb-1" style="color: var(--color-text-light);">Min</label>
                                <input 
                                    type="number" 
                                    wire:model.live.debounce.300ms="minPrice" 
                                    min="0"
                                    max="{{ $priceRange['max'] }}"
                                    class="w-full px-3 py-2 border rounded-md focus:ring-2 transition-colors"
                                    style="border-color: var(--color-border); color: var(--color-text);"
                                    onfocus="this.style.borderColor='var(--color-primary)'"
                                    onblur="this.style.borderColor='var(--color-border)'"
                                >
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm mb-1" style="color: var(--color-text-light);">Max</label>
                                <input 
                                    type="number" 
                                    wire:model.live.debounce.300ms="maxPrice" 
                                    min="0"
                                    max="{{ $priceRange['max'] }}"
                                    class="w-full px-3 py-2 border rounded-md focus:ring-2 transition-colors"
                                    style="border-color: var(--color-border); color: var(--color-text);"
                                    onfocus="this.style.borderColor='var(--color-primary)'"
                                    onblur="this.style.borderColor='var(--color-border)'"
                                >
                            </div>
                        </div>
                        <div class="text-sm" style="color: var(--color-text-light);">
                            Range: ₹{{ number_format($minPrice) }} - ₹{{ number_format($maxPrice) }}
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Products Grid -->
        <main class="flex-1">
            <!-- Section Header -->
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-bold mb-4" style="color: var(--color-primary-dark);">{{ $section->section_name }}</h1>
                <p class="text-lg" style="color: var(--color-primary-dark);">{{ $section->description }}</p>
            </div>

            <!-- Sort and Results Count -->
            <div class="rounded-lg shadow-md p-4 mb-6 flex flex-col sm:flex-row justify-between items-center gap-4" style="background-color: var(--color-white);">
                <div style="color: var(--color-text);">
                    <span class="font-semibold">{{ $products->total() }}</span> products found
                </div>
                <div class="flex items-center space-x-4">
                    <label class="text-sm" style="color: var(--color-text-light);">Sort by:</label>
                    <select 
                        wire:model.live="sortBy" 
                        class="px-4 py-2 border rounded-md text-sm transition-colors"
                        style="border-color: var(--color-border); color: var(--color-text); background-color: var(--color-white);"
                        onfocus="this.style.borderColor='var(--color-primary)'"
                        onblur="this.style.borderColor='var(--color-border)'"
                    >
                        <option value="latest">Latest</option>
                        <option value="price_low">Price: Low to High</option>
                        <option value="price_high">Price: High to Low</option>
                        <option value="name">Name: A to Z</option>
                    </select>
                </div>
            </div>

            <!-- Products Grid -->
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <a href="{{ route('product.show', $product->product_id) }}" class="rounded-lg shadow-md overflow-hidden transition-shadow duration-300 group block" style="background-color: var(--color-white);" onmouseover="this.style.boxShadow='0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)'" onmouseout="this.style.boxShadow='0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)'">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden bg-[var(--color-gray-lighter)] aspect-square">
                                @if($product->face_image)
                                    <img 
                                        src="{{ asset('storage/' . $product->face_image) }}" 
                                        alt="{{ $product->product_name }}"
                                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                    >
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-24 h-24" style="color: var(--color-gray-light);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                                @if($product->min_price && $product->max_price && $product->min_price < $product->max_price)
                                    <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-xs font-semibold">
                                        {{ round((($product->max_price - $product->min_price) / $product->max_price) * 100) }}% OFF
                                    </div>
                                @endif
                            </div>

                            <!-- Product Info -->
                            <div class="p-4">
                                <div class="mb-2">
                                    @if($product->category)
                                        <span class="text-xs font-medium" style="color: var(--color-primary);">{{ $product->category->name }}</span>
                                    @endif
                                </div>
                                <h3 class="text-lg font-semibold mb-2 line-clamp-2 transition-colors" style="color: var(--color-text);" onmouseover="this.style.color='var(--color-primary)'" onmouseout="this.style.color='var(--color-text)'">
                                    {{ $product->product_name }}
                                </h3>
                                <p class="text-sm mb-3 line-clamp-1" style="color: var(--color-text-light);">{{ $product->product_title }}</p>
                                
                                <!-- Brand and Color -->
                                <div class="flex items-center gap-2 mb-3 text-sm">
                                    @if($product->brand)
                                        <span style="color: var(--color-text-light);">Brand: <span class="font-medium" style="color: var(--color-text);">{{ $product->brand }}</span></span>
                                    @endif
                                    @if($product->color)
                                        <span style="color: var(--color-text-light);">•</span>
                                        <span style="color: var(--color-text-light);">Color: <span class="font-medium" style="color: var(--color-text);">{{ $product->color }}</span></span>
                                    @endif
                                </div>

                                <!-- Price -->
                                <div class="flex items-center gap-2 mb-3">
                                    @if($product->min_price)
                                        <span class="text-xl font-bold" style="color: var(--color-primary);">₹{{ number_format($product->min_price) }}</span>
                                        @if($product->max_price && $product->max_price > $product->min_price)
                                            <span class="text-sm line-through" style="color: var(--color-text-light);">₹{{ number_format($product->max_price) }}</span>
                                        @endif
                                    @else
                                        <span class="text-xl font-bold" style="color: var(--color-text);">Price on request</span>
                                    @endif
                                </div>

                                <!-- Sizes -->
                                @if($product->sizes && count($product->sizes) > 0)
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        @foreach(array_slice($product->sizes, 0, 4) as $size)
                                            <span class="text-xs px-2 py-1 rounded" style="background-color: var(--color-gray-lighter); color: var(--color-text);">{{ $size }}</span>
                                        @endforeach
                                        @if(count($product->sizes) > 4)
                                            <span class="text-xs px-2 py-1 rounded" style="background-color: var(--color-gray-lighter); color: var(--color-text);">+{{ count($product->sizes) - 4 }}</span>
                                        @endif
                                    </div>
                                @endif

                                <!-- View Button -->
                                <div 
                                    class="block w-full text-center py-2 rounded-md font-medium transition-colors"
                                    style="background-color: var(--color-primary); color: var(--color-white);"
                                    onmouseover="this.style.backgroundColor='var(--color-primary-dark)'"
                                    onmouseout="this.style.backgroundColor='var(--color-primary)'"
                                >
                                    View Details
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @else
                <div class="rounded-lg shadow-md p-12 text-center" style="background-color: var(--color-white);">
                    <svg class="mx-auto h-24 w-24 mb-4" style="color: var(--color-gray-light);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2" style="color: var(--color-text);">No products found</h3>
                    <p class="mb-4" style="color: var(--color-text-light);">Try adjusting your filters to see more results.</p>
                    <button 
                        wire:click="clearFilters" 
                        class="inline-block px-6 py-2 rounded-md transition-colors font-medium"
                        style="background-color: var(--color-primary); color: var(--color-white);"
                        onmouseover="this.style.backgroundColor='var(--color-primary-dark)'"
                        onmouseout="this.style.backgroundColor='var(--color-primary)'"
                    >
                        Clear All Filters
                    </button>
                </div>
            @endif
        </main>
    </div>
</div>