<!-- Banner Carousel Section -->
<section class="mb-16">
    <h2 class="text-3xl font-bold mb-6 text-center" style="color: #5d4037;">{{ $section->section_name }}</h2>
    <p class="text-lg text-center mb-8" style="color: #5d4037;">{{ $section->description }}</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($section->loadedProducts() as $product)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">{{ $product->product_name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $product->product_title }}</p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-xl font-bold" style="color: #8d6e63;">₹{{ number_format($product->min_price) }}</span>
                        @if($product->max_price > $product->min_price)
                            <span class="text-gray-500 line-through">₹{{ number_format($product->max_price) }}</span>
                        @endif
                    </div>
                    <a href="{{ route('product.show', $product->product_id) }}" class="text-[#8d6e63] hover:text-[#5d4037] font-bold py-2 px-4 rounded-full transition duration-300 inline-block border-2 border-[#8d6e63] hover:bg-[#8d6e63] hover:text-white">
                        View Product
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>