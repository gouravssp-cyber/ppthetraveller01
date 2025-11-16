<!-- Banner Section -->
<section class="mb-16">
    <div class="bg-[#d7ccc8] rounded-2xl p-8 text-center">
        <h2 class="text-3xl font-bold mb-4" style="color: #5d4037;">{{ $section->section_name }}</h2>
        <p class="text-lg mb-6" style="color: #5d4037;">{{ $section->description }}</p>
        @if($section->loadedProducts()->count() > 0)
            @php $product = $section->loadedProducts()->first(); @endphp
            <div class="bg-white rounded-xl p-6 shadow-lg max-w-2xl mx-auto">
                <h3 class="text-2xl font-bold mb-2">{{ $product->product_name }}</h3>
                <p class="text-gray-600 mb-4">{{ $product->product_title }}</p>
                <div class="flex justify-center items-center mb-4">
                    <span class="text-2xl font-bold" style="color: #8d6e63;">₹{{ number_format($product->min_price) }}</span>
                    @if($product->max_price > $product->min_price)
                        <span class="ml-2 text-lg text-gray-500 line-through">₹{{ number_format($product->max_price) }}</span>
                    @endif
                </div>
                <a href="{{ route('product.show', $product->product_id) }}" class="bg-[#8d6e63] hover:bg-[#5d4037] text-white font-bold py-2 px-6 rounded-full transition duration-300 inline-block">
                    View Product
                </a>
            </div>
        @endif
    </div>
</section>