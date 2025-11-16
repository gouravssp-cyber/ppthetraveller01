<!-- Carousel Section -->
<section class="mb-16">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold" style="color: #5d4037;">{{ $section->section_name }}</h2>
        <a href="{{ route('section.show', Str::slug($section->section_name)) }}" class="text-[#8d6e63] hover:text-[#5d4037] font-bold py-2 px-4 rounded-full transition duration-300 inline-block">
            View All
        </a>
    </div>
    <p class="text-lg mb-8" style="color: #5d4037;">{{ $section->description }}</p>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
        @foreach($section->loadedProducts() as $product)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-1">{{ $product->product_name }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ $product->product_title }}</p>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-lg font-bold" style="color: #8d6e63;">₹{{ number_format($product->min_price) }}</span>
                        @if($product->max_price > $product->min_price)
                            <span class="text-gray-500 text-sm line-through">₹{{ number_format($product->max_price) }}</span>
                        @endif
                    </div>
                    <a href="{{ route('product.show', $product->product_id) }}" class="bg-[#8d6e63] hover:bg-[#5d4037] text-white text-sm font-bold py-2 px-4 rounded-full transition duration-300 inline-block w-full text-center">
                        View Product
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>