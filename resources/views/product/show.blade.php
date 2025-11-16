@extends('layouts.app')

@section('title', $product->product_name . ' - E-Commerce Store')

@section('content')
<div class="bg-[var(--color-cream-light)] min-h-screen">
    <!-- Breadcrumb -->
    <div class="bg-[var(--color-white)] border-b border-[var(--color-border)]">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-[var(--color-text-light)] hover:text-[var(--color-primary)] transition-colors">Home</a>
                <span class="text-[var(--color-text-light)]">/</span>
                <a href="{{ route('filter') }}" class="text-[var(--color-text-light)] hover:text-[var(--color-primary)] transition-colors">Products</a>
                @if($product->category)
                    <span class="text-[var(--color-text-light)]">/</span>
                    <span class="text-[var(--color-text-light)]">{{ $product->category->name }}</span>
                @endif
                <span class="text-[var(--color-text-light)]">/</span>
                <span class="text-[var(--color-text)] font-medium">{{ $product->product_name }}</span>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-[var(--color-white)] rounded-lg shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 lg:p-12">
                <!-- Product Image Gallery -->
                <div class="product-gallery">
                    <!-- Main Swiper -->
                    <div class="swiper product-main-swiper mb-4 rounded-lg overflow-hidden">
                        <div class="swiper-wrapper">
                            @if($product->variants && count($product->variants) > 0)
                                @foreach($product->variants as $variant)
                                    @if(isset($variant['images']) && count($variant['images']) > 0)
                                        @foreach($variant['images'] as $image)
                                            <div class="swiper-slide">
                                                <div class="aspect-square bg-[var(--color-gray-lighter)] flex items-center justify-center overflow-hidden rounded-lg">
                                                    <img 
                                                        src="{{ asset('storage/' . $image) }}" 
                                                        alt="{{ $product->product_name }} - {{ $variant['variant_name'] ?? '' }}"
                                                        class="w-full h-full object-cover"
                                                        onerror="this.src='https://via.placeholder.com/600x600?text=Product+Image'"
                                                    >
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                            
                            <!-- Fallback if no variant images -->
                            @if(!$product->variants || (isset($product->variants[0]['images']) && count($product->variants[0]['images']) == 0))
                                <div class="swiper-slide">
                                    <div class="aspect-square bg-[var(--color-gray-lighter)] flex items-center justify-center rounded-lg">
                                        @if($product->face_image)
                                            <img 
                                                src="{{ asset('storage/' . $product->face_image) }}" 
                                                alt="{{ $product->product_name }}"
                                                class="w-full h-full object-cover"
                                                onerror="this.src='https://via.placeholder.com/600x600?text=Product+Image'"
                                            >
                                        @else
                                            <svg class="w-32 h-32 text-[var(--color-gray-light)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- Navigation -->
                        <div class="swiper-button-next" style="color: var(--color-pistachio);"></div>
                        <div class="swiper-button-prev" style="color: var(--color-pistachio);"></div>
                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>

                    <!-- Thumbnail Swiper -->
                    <div class="swiper product-thumbs-swiper">
                        <div class="swiper-wrapper">
                            @if($product->variants && count($product->variants) > 0)
                                @foreach($product->variants as $variant)
                                    @if(isset($variant['images']) && count($variant['images']) > 0)
                                        @foreach($variant['images'] as $image)
                                            <div class="swiper-slide cursor-pointer">
                                                <div class="aspect-square bg-[var(--color-gray-lighter)] rounded-lg overflow-hidden border-2 border-transparent hover:border-[var(--color-pistachio)] transition-colors">
                                                    <img 
                                                        src="{{ asset('storage/' . $image) }}" 
                                                        alt="Thumbnail"
                                                        class="w-full h-full object-cover"
                                                        onerror="this.src='https://via.placeholder.com/150x150?text=Thumb'"
                                                    >
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                            
                            @if(!$product->variants || (isset($product->variants[0]['images']) && count($product->variants[0]['images']) == 0))
                                <div class="swiper-slide cursor-pointer">
                                    <div class="aspect-square bg-[var(--color-gray-lighter)] rounded-lg overflow-hidden border-2 border-transparent hover:border-[var(--color-pistachio)] transition-colors">
                                        @if($product->face_image)
                                            <img 
                                                src="{{ asset('storage/' . $product->face_image) }}" 
                                                alt="Thumbnail"
                                                class="w-full h-full object-cover"
                                                onerror="this.src='https://via.placeholder.com/150x150?text=Thumb'"
                                            >
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-8 h-8 text-[var(--color-gray-light)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="product-details">
                    @if($product->category)
                        <div class="mb-4">
                            <span class="inline-block px-3 py-1 bg-[var(--color-cream)] text-[var(--color-primary)] rounded-full text-sm font-medium">
                                {{ $product->category->name }}
                            </span>
                        </div>
                    @endif

                    <h1 class="text-4xl font-bold text-[var(--color-text)] mb-4">{{ $product->product_name }}</h1>
                    <p class="text-xl text-[var(--color-text-light)] mb-6">{{ $product->product_title }}</p>

                    <!-- Brand and Color -->
                    <div class="flex flex-wrap items-center gap-4 mb-6 text-sm">
                        @if($product->brand)
                            <div>
                                <span class="text-[var(--color-text-light)]">Brand:</span>
                                <span class="font-semibold text-[var(--color-text)] ml-1">{{ $product->brand }}</span>
                            </div>
                        @endif
                        @if($product->color)
                            <div>
                                <span class="text-[var(--color-text-light)]">Color:</span>
                                <span class="font-semibold text-[var(--color-text)] ml-1">{{ $product->color }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Price -->
                    <div class="mb-6">
                        @if($product->min_price)
                            <div class="flex items-baseline gap-3">
                                <span class="text-4xl font-bold text-[var(--color-primary)]">₹{{ number_format($product->min_price) }}</span>
                                @if($product->max_price && $product->max_price > $product->min_price)
                                    <span class="text-2xl text-[var(--color-text-light)] line-through">₹{{ number_format($product->max_price) }}</span>
                                    <span class="px-2 py-1 bg-red-100 text-red-600 rounded text-sm font-semibold">
                                        {{ round((($product->max_price - $product->min_price) / $product->max_price) * 100) }}% OFF
                                    </span>
                                @endif
                            </div>
                        @else
                            <span class="text-2xl font-bold text-[var(--color-text)]">Price on request</span>
                        @endif
                    </div>

                    <!-- Sizes -->
                    @if($product->sizes && count($product->sizes) > 0)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-[var(--color-text)] mb-3">Select Size</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($product->sizes as $size)
                                    <button class="px-4 py-2 border-2 border-[var(--color-border)] rounded-lg font-medium text-[var(--color-text)] hover:border-[var(--color-primary)] hover:bg-[var(--color-cream-light)] transition-colors focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)] focus:ring-offset-2">
                                        {{ $size }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Variants -->
                    @if($product->variants && count($product->variants) > 0)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-[var(--color-text)] mb-3">Available Variants</h3>
                            <div class="space-y-2">
                                @foreach($product->variants as $variant)
                                    <div class="p-4 border border-[var(--color-border)] rounded-lg hover:border-[var(--color-primary)] transition-colors">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <span class="font-medium text-[var(--color-text)]">{{ $variant['variant_name'] ?? 'Variant' }}</span>
                                                @if(isset($variant['sizes']) && count($variant['sizes']) > 0)
                                                    <span class="text-sm text-[var(--color-text-light)] ml-2">
                                                        Sizes: {{ implode(', ', $variant['sizes']) }}
                                                    </span>
                                                @endif
                                            </div>
                                            @if(isset($variant['discount_price']))
                                                <span class="font-bold text-[var(--color-primary)]">₹{{ number_format($variant['discount_price']) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 mb-8">
                        <button class="flex-1 bg-[var(--color-primary)] text-[var(--color-white)] px-8 py-4 rounded-lg font-semibold hover:bg-[var(--color-primary-hover)] transition-colors focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)] focus:ring-offset-2">
                            Add to Cart
                        </button>
                        <button class="flex-1 border-2 border-[var(--color-primary)] text-[var(--color-primary)] px-8 py-4 rounded-lg font-semibold hover:bg-[var(--color-cream-light)] transition-colors focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)] focus:ring-offset-2">
                            Buy Now
                        </button>
                    </div>

                    <!-- Product Details Accordion -->
                    @if($product->variants && count($product->variants) > 0 && isset($product->variants[0]['product_details']))
                        <div class="space-y-4">
                            <!-- Material & Care -->
                            @if(isset($product->variants[0]['product_details']['material_care']))
                                <div class="border border-[var(--color-border)] rounded-lg overflow-hidden">
                                    <button class="w-full px-6 py-4 text-left font-semibold text-[var(--color-text)] bg-[var(--color-cream-light)] hover:bg-[var(--color-cream)] transition-colors flex items-center justify-between" onclick="toggleAccordion(this)">
                                        <span>Material & Care</span>
                                        <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div class="hidden px-6 py-4">
                                        <div class="space-y-2 text-[var(--color-text-light)]">
                                            <p><strong class="text-[var(--color-text)]">Type:</strong> {{ $product->variants[0]['product_details']['material_care']['type'] ?? 'N/A' }}</p>
                                            <p><strong class="text-[var(--color-text)]">Wash:</strong> {{ $product->variants[0]['product_details']['material_care']['wash'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Specifications -->
                            @if(isset($product->variants[0]['product_details']['specifications']))
                                <div class="border border-[var(--color-border)] rounded-lg overflow-hidden">
                                    <button class="w-full px-6 py-4 text-left font-semibold text-[var(--color-text)] bg-[var(--color-cream-light)] hover:bg-[var(--color-cream)] transition-colors flex items-center justify-between" onclick="toggleAccordion(this)">
                                        <span>Specifications</span>
                                        <svg class="w-5 h-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                    <div class="hidden px-6 py-4">
                                        <div class="space-y-2 text-[var(--color-text-light)]">
                                            @if(is_array($product->variants[0]['product_details']['specifications']))
                                                @foreach($product->variants[0]['product_details']['specifications'] as $key => $value)
                                                    <p><strong class="text-[var(--color-text)]">{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</p>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        @if($relatedProducts->count() > 0)
            <div class="mt-16">
                <h2 class="text-3xl font-bold text-[var(--color-text)] mb-8 text-center">Related Products</h2>
                <div class="swiper related-products-swiper">
                    <div class="swiper-wrapper">
                        @foreach($relatedProducts as $relatedProduct)
                            <div class="swiper-slide">
                                <a href="{{ route('product.show', $relatedProduct->product_id) }}" class="block rounded-lg shadow-md overflow-hidden transition-shadow duration-300 group" style="background-color: var(--color-white);" onmouseover="this.style.boxShadow='0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)'" onmouseout="this.style.boxShadow='0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)'">
                                    <div class="relative overflow-hidden bg-[var(--color-gray-lighter)] aspect-square">
                                        @if($relatedProduct->face_image)
                                            <img 
                                                src="{{ asset('storage/' . $relatedProduct->face_image) }}" 
                                                alt="{{ $relatedProduct->product_name }}"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                                onerror="this.src='https://via.placeholder.com/400x400?text=Product'"
                                            >
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-24 h-24 text-[var(--color-gray-light)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                        @if($relatedProduct->min_price && $relatedProduct->max_price && $relatedProduct->min_price < $relatedProduct->max_price)
                                            <div class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-xs font-semibold">
                                                {{ round((($relatedProduct->max_price - $relatedProduct->min_price) / $relatedProduct->max_price) * 100) }}% OFF
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-4">
                                        @if($relatedProduct->category)
                                            <span class="text-xs text-[var(--color-primary)] font-medium">{{ $relatedProduct->category->name }}</span>
                                        @endif
                                        <h3 class="text-lg font-semibold text-[var(--color-text)] mt-2 mb-2 line-clamp-2 group-hover:text-[var(--color-primary)] transition-colors">
                                            {{ $relatedProduct->product_name }}
                                        </h3>
                                        <div class="flex items-center gap-2">
                                            @if($relatedProduct->min_price)
                                                <span class="text-xl font-bold text-[var(--color-primary)]">₹{{ number_format($relatedProduct->min_price) }}</span>
                                                @if($relatedProduct->max_price && $relatedProduct->max_price > $relatedProduct->min_price)
                                                    <span class="text-sm text-[var(--color-text-light)] line-through">₹{{ number_format($relatedProduct->max_price) }}</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- Navigation -->
                    <div class="swiper-button-next" style="color: var(--color-pistachio);"></div>
                    <div class="swiper-button-prev" style="color: var(--color-pistachio);"></div>
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize main product gallery
        const productThumbs = new Swiper('.product-thumbs-swiper', {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
            breakpoints: {
                640: {
                    slidesPerView: 5,
                },
                1024: {
                    slidesPerView: 4,
                }
            }
        });

        const productMain = new Swiper('.product-main-swiper', {
            spaceBetween: 10,
            navigation: {
                nextEl: '.product-main-swiper .swiper-button-next',
                prevEl: '.product-main-swiper .swiper-button-prev',
            },
            pagination: {
                el: '.product-main-swiper .swiper-pagination',
                clickable: true,
            },
            thumbs: {
                swiper: productThumbs
            },
            loop: true,
            grabCursor: true,
        });

        // Initialize related products slider
        const relatedProducts = new Swiper('.related-products-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.related-products-swiper .swiper-button-next',
                prevEl: '.related-products-swiper .swiper-button-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                }
            },
            grabCursor: true,
        });
    });

    // Accordion toggle function
    function toggleAccordion(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('svg');
        
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
</script>
@endpush
@endsection

