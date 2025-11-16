<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Filter Sidebar -->
        <aside class="w-full lg:w-80 flex-shrink-0">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Filters</h2>
                    <button 
                        wire:click="clearFilters" 
                        class="text-sm text-blue-600 hover:text-blue-800 font-medium"
                    >
                        Clear All
                    </button>
                </div>

                <!-- Category Filter -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Category</h3>
                    <div class="space-y-2 max-h-48 overflow-y-auto">
                        @foreach($categories as $category)
                            <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                <input 
                                    type="checkbox" 
                                    wire:model.live="selectedCategories" 
                                    value="{{ $category->id }}"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                >
                                <span class="text-gray-700">{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Brand Filter -->
                @if($brands->count() > 0)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Brand</h3>
                    <div class="space-y-2 max-h-48 overflow-y-auto">
                        @foreach($brands as $brand)
                            <label class="flex items-center space-x-2 cursor-pointer hover:bg-gray-50 p-2 rounded">
                                <input 
                                    type="checkbox" 
                                    wire:model.live="selectedBrands" 
                                    value="{{ $brand }}"
                                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                >
                                <span class="text-gray-700">{{ $brand }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Color Filter -->
                @if($colors->count() > 0)
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Color</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($colors as $color)
                            <label class="relative cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    wire:model.live="selectedColors" 
                                    value="{{ $color }}"
                                    class="sr-only peer"
                                >
                                <span class="inline-block px-4 py-2 rounded-full text-sm font-medium border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-50 text-gray-700 peer-checked:text-blue-700 hover:border-blue-400 transition-colors">
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
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Size</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($sizes as $size)
                            <label class="relative cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    wire:model.live="selectedSizes" 
                                    value="{{ $size }}"
                                    class="sr-only peer"
                                >
                                <span class="inline-block w-12 h-12 rounded border-2 border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600 peer-checked:text-white flex items-center justify-center font-semibold text-gray-700 hover:border-blue-400 transition-colors">
                                    {{ $size }}
                                </span>
                            </label>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Price Range Filter -->
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Price Range</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1">
                                <label class="block text-sm text-gray-600 mb-1">Min</label>
                                <input 
                                    type="number" 
                                    wire:model.live.debounce.300ms="minPrice" 
                                    min="0"
                                    max="{{ $priceRange['max'] }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                >
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm text-gray-600 mb-1">Max</label>
                                <input 
                                    type="number" 
                                    wire:model.live.debounce.300ms="maxPrice" 
                                    min="0"
                                    max="{{ $priceRange['max'] }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                >
                            </div>
                        </div>
                        <div class="text-sm text-gray-600">
                            Range: ₹{{ number_format($minPrice) }} - ₹{{ number_format($maxPrice) }}
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Products Grid -->
        <main class="flex-1">
            <!-- Sort and Results Count -->
            <div class="bg-white rounded-lg shadow-md p-4 mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="text-gray-700">
                    <span class="font-semibold">{{ $products->total() }}</span> products found
                </div>
                <div class="flex items-center space-x-4">
                    <label class="text-sm text-gray-600">Sort by:</label>
                    <select 
                        wire:model.live="sortBy" 
                        class="px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-sm"
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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden bg-gray-100 aspect-square">
                                @if($product->face_image)
                                    <img 
                                        src="{{ asset('storage/' . $product->face_image) }}" 
                                        alt="{{ $product->product_name }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                    >
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                                        <span class="text-xs text-blue-600 font-medium">{{ $product->category->name }}</span>
                                    @endif
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                                    {{ $product->product_name }}
                                </h3>
                                <p class="text-sm text-gray-600 mb-3 line-clamp-1">{{ $product->product_title }}</p>
                                
                                <!-- Brand and Color -->
                                <div class="flex items-center gap-2 mb-3 text-sm">
                                    @if($product->brand)
                                        <span class="text-gray-500">Brand: <span class="font-medium text-gray-700">{{ $product->brand }}</span></span>
                                    @endif
                                    @if($product->color)
                                        <span class="text-gray-500">•</span>
                                        <span class="text-gray-500">Color: <span class="font-medium text-gray-700">{{ $product->color }}</span></span>
                                    @endif
                                </div>

                                <!-- Price -->
                                <div class="flex items-center gap-2 mb-3">
                                    @if($product->min_price)
                                        <span class="text-xl font-bold text-gray-900">₹{{ number_format($product->min_price) }}</span>
                                        @if($product->max_price && $product->max_price > $product->min_price)
                                            <span class="text-sm text-gray-500 line-through">₹{{ number_format($product->max_price) }}</span>
                                        @endif
                                    @else
                                        <span class="text-xl font-bold text-gray-900">Price on request</span>
                                    @endif
                                </div>

                                <!-- Sizes -->
                                @if($product->sizes && count($product->sizes) > 0)
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        @foreach(array_slice($product->sizes, 0, 4) as $size)
                                            <span class="text-xs px-2 py-1 bg-gray-100 text-gray-700 rounded">{{ $size }}</span>
                                        @endforeach
                                        @if(count($product->sizes) > 4)
                                            <span class="text-xs px-2 py-1 bg-gray-100 text-gray-700 rounded">+{{ count($product->sizes) - 4 }}</span>
                                        @endif
                                    </div>
                                @endif

                                <!-- View Button -->
                                <a 
                                    href="#" 
                                    class="block w-full text-center bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-colors font-medium"
                                >
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $products->links() }}
                </div>
            @else
                <div class="bg-white rounded-lg shadow-md p-12 text-center">
                    <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">No products found</h3>
                    <p class="text-gray-600 mb-4">Try adjusting your filters to see more results.</p>
                    <button 
                        wire:click="clearFilters" 
                        class="inline-block px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors"
                    >
                        Clear All Filters
                    </button>
                </div>
            @endif
        </main>
    </div>
</div>
