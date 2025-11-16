<!-- Bento Grid Section -->
<section class="mb-16">
    <h2 class="text-3xl font-bold mb-6 text-center" style="color: #5d4037;">{{ $section->section_name }}</h2>
    <p class="text-lg text-center mb-8" style="color: #5d4037;">{{ $section->description }}</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($section->loadedProducts()->take(6) as $index => $product)
            @if($index == 0)
                <!-- Large item -->
                <div class="md:col-span-2 bg-white rounded-2xl overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                    <div class="p-6 h-full flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">{{ $product->product_name }}</h3>
                            <p class="text-gray-600 mb-4">{{ $product->product_title }}</p>
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-2xl font-bold" style="color: #8d6e63;">₹{{ number_format($product->min_price) }}</span>
                                @if($product->max_price > $product->min_price)
                                    <span class="text-gray-500 line-through">₹{{ number_format($product->max_price) }}</span>
                                @endif
                            </div>
                            <a href="{{ route('product.show', $product->product_id) }}" class="bg-[#8d6e63] hover:bg-[#5d4037] text-white font-bold py-2 px-6 rounded-full transition duration-300 inline-block">
                                View Product
                            </a>
                        </div>
                    </div>
                </div>
            @elseif($index == 1)
                <!-- Medium item -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                    <div class="p-5 h-full flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold mb-2">{{ $product->product_name }}</h3>
                            <p class="text-gray-600 text-sm mb-3">{{ $product->product_title }}</p>
                        </div>
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <span class="text-xl font-bold" style="color: #8d6e63;">₹{{ number_format($product->min_price) }}</span>
                                @if($product->max_price > $product->min_price)
                                    <span class="text-gray-500 text-sm line-through">₹{{ number_format($product->max_price) }}</span>
                                @endif
                            </div>
                            <a href="{{ route('product.show', $product->product_id) }}" class="text-[#8d6e63] hover:text-[#5d4037] font-bold py-2 px-4 rounded-full transition duration-300 inline-block border-2 border-[#8d6e63] hover:bg-[#8d6e63] hover:text-white text-center">
                                View Product
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <!-- Small items -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                    <div class="p-4">
                        <h3 class="font-bold mb-1">{{ $product->product_name }}</h3>
                        <div class="flex justify-between items-center mt-2">
                            <span class="font-bold" style="color: #8d6e63;">₹{{ number_format($product->min_price) }}</span>
                            <a href="{{ route('product.show', $product->product_id) }}" class="text-[#8d6e63] hover:text-[#5d4037] text-sm font-bold py-1 px-3 rounded-full transition duration-300 inline-block border border-[#8d6e63] hover:bg-[#8d6e63] hover:text-white">
                                View
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>