@extends('layouts.app')

@section('title', 'International Tour Packages')
@section('meta_description', 'Explore amazing international tour packages to destinations around the world')

@section('content')

<!-- Hero Section -->
<section class="relative w-full min-h-[60vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-br from-orange-primary/30 via-black/50 to-black/70"></div>
    </div>
    <div class="relative z-10 text-center w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="mb-4 flex justify-center">
            <span class="inline-flex items-center gap-2 bg-orange-primary/20 backdrop-blur-md border border-orange-primary/30 text-white px-4 py-2 rounded-full text-sm font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
                International Tours
            </span>
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
            <span class="text-white block mb-2">Explore the</span>
            <span class="bg-gradient-to-r from-yellow-accent via-orange-primary to-yellow-accent bg-clip-text text-transparent">World</span>
        </h1>
        <p class="text-lg md:text-xl text-white/90 mb-8 font-light max-w-3xl mx-auto leading-relaxed">
            Discover curated international tour packages to amazing destinations around the globe
        </p>
    </div>
</section>

<!-- Destinations Sections -->
@if($destinations->count() > 0)
    @foreach($destinations as $index => $destinationGroup)
        <section class="py-16 px-4 md:px-8 {{ $index % 2 === 0 ? 'bg-gray-50' : 'bg-white' }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-10">
                    <div class="inline-flex items-center gap-2 bg-orange-primary/10 text-orange-primary px-4 py-2 rounded-full text-sm font-semibold mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        {{ $destinationGroup['destination']->name }}
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-title mb-3">
                        {{ $destinationGroup['destination']->name }} Tour Packages
                    </h2>
                    <p class="text-body-text text-lg">
                        {{ $destinationGroup['packages']->count() }} {{ Str::plural('tour', $destinationGroup['packages']->count()) }} available
                    </p>
                </div>

                <!-- Packages Carousel -->
                @if($destinationGroup['packages']->count() > 0)
                    <div class="relative">
                        <div class="swiper packages-carousel-{{ $index }}" data-swiper-id="{{ $index }}">
                            <div class="swiper-wrapper">
                                @foreach($destinationGroup['packages'] as $package)
                                    <div class="swiper-slide">
                                        <a href="/{{ $package->slug }}" class="block group">
                                            <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-orange-primary/30">
                                                <!-- Package Image -->
                                                <div class="relative h-64 overflow-hidden">
                                                    @if($package->banner_image)
                                                        <img src="{{ asset('storage/' . $package->banner_image) }}" 
                                                             alt="{{ $package->banner_image_alt ?? $package->title }}"
                                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                                    @else
                                                        <div class="w-full h-full bg-gradient-to-br from-orange-primary/20 to-yellow-accent/20 flex items-center justify-center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-primary/50">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                    <div class="absolute top-4 left-4">
                                                        <span class="bg-orange-primary text-white px-3 py-1 rounded-full text-xs font-semibold">
                                                            {{ $package->tourType->name ?? 'Tour' }}
                                                        </span>
                                                    </div>
                                                    @if($package->price_compare_at && $package->price_start < $package->price_compare_at)
                                                        <div class="absolute top-4 right-4">
                                                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                                                {{ round((($package->price_compare_at - $package->price_start) / $package->price_compare_at) * 100) }}% OFF
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <!-- Package Content -->
                                                <div class="p-6">
                                                    <h3 class="text-xl font-bold text-title mb-2 group-hover:text-orange-primary transition-colors line-clamp-2">
                                                        {{ $package->title }}
                                                    </h3>
                                                    @if($package->summary)
                                                        <p class="text-body-text text-sm mb-4 line-clamp-2">
                                                            {{ Str::limit($package->summary, 100) }}
                                                        </p>
                                                    @endif
                                                    <div class="flex items-center gap-4 text-sm text-body-text mb-4">
                                                        <div class="flex items-center gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar">
                                                                <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                                            </svg>
                                                            <span>{{ $package->duration_days }} Days</span>
                                                        </div>
                                                        <div class="flex items-center gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                                                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                                                <circle cx="12" cy="10" r="3"></circle>
                                                            </svg>
                                                            <span>{{ $package->destination->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                                        <div>
                                                            @if($package->price_compare_at && $package->price_start < $package->price_compare_at)
                                                                <p class="text-sm text-body-text line-through">₹{{ number_format($package->price_compare_at) }}</p>
                                                            @endif
                                                            <p class="text-2xl font-bold text-orange-primary">₹{{ number_format($package->price_start) }}</p>
                                                            <p class="text-xs text-body-text">per person</p>
                                                        </div>
                                                        <button class="bg-orange-primary hover:bg-orange-primary/90 text-white px-6 py-2 rounded-lg font-semibold transition-all">
                                                            View Details
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Navigation -->
                            <div class="swiper-button-prev packages-carousel-prev-{{ $index }} !text-orange-primary !left-0"></div>
                            <div class="swiper-button-next packages-carousel-next-{{ $index }} !text-orange-primary !right-0"></div>
                            
                            <!-- Pagination -->
                            <div class="swiper-pagination packages-carousel-pagination-{{ $index }} !bottom-0"></div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-12 bg-gray-50 rounded-xl">
                        <p class="text-body-text">No packages available for this destination.</p>
                    </div>
                @endif
            </div>
        </section>
    @endforeach
@else
    <section class="py-16 px-4 md:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto text-center">
            <div class="bg-white rounded-2xl p-12 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4 text-orange-primary/50">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                </svg>
                <h3 class="text-2xl font-bold text-title mb-2">No International Packages Available</h3>
                <p class="text-body-text">Check back soon for exciting international tour packages!</p>
            </div>
        </div>
    </section>
@endif

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if($destinations->count() > 0)
            @foreach($destinations as $index => $destinationGroup)
                @if($destinationGroup['packages']->count() > 0)
                    new Swiper('.packages-carousel-{{ $index }}', {
                        slidesPerView: 1,
                        spaceBetween: 20,
                        loop: {{ $destinationGroup['packages']->count() > 3 ? 'true' : 'false' }},
                        navigation: {
                            nextEl: '.packages-carousel-next-{{ $index }}',
                            prevEl: '.packages-carousel-prev-{{ $index }}',
                        },
                        pagination: {
                            el: '.packages-carousel-pagination-{{ $index }}',
                            clickable: true,
                        },
                        breakpoints: {
                            640: {
                                slidesPerView: 2,
                                spaceBetween: 20,
                            },
                            768: {
                                slidesPerView: 2,
                                spaceBetween: 24,
                            },
                            1024: {
                                slidesPerView: 3,
                                spaceBetween: 24,
                            },
                        },
                    });
                @endif
            @endforeach
        @endif
    });
</script>
@endpush

@endsection

