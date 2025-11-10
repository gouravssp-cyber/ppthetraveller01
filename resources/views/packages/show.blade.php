@extends('layouts.app')

@section('title', $package->meta_title ?? $package->title)
@section('meta_description', $package->meta_description ?? $package->summary)

@section('content')

<!-- Hero Section -->
<div class="min-h-screen">
    <div class="relative min-h-screen flex items-center justify-center overflow-hidden" style="background: linear-gradient(to bottom, rgb(17, 24, 39), rgb(0, 0, 0))">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $package->banner_image ? asset('storage/' . $package->banner_image) : asset('default-image.jpg') }}'); background-position: center;"></div>

        <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.5), rgba(0,0,0,0.7))"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 py-8 w-full">
            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 text-white text-sm mb-8 px-4 py-2 rounded-full w-fit" style="background: rgba(0,0,0,0.3); backdrop-filter: blur(4px)">
                <!-- <a class="font-medium hover:opacity-80 transition-colors" href="/" style="color: white">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
                <a class="hover:opacity-80 transition-colors" href="/#destinations" style="color: white">{{ $package->destination->name }}</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
                <span class="font-semibold" style="color: hsl(40 96% 61%)">{{ $package->title }}</span> -->
            </div>

            <div class="grid lg:grid-cols-5 gap-8 items-center">
                <!-- Left Content -->
                <div class="lg:col-span-3 space-y-6">

                    <div class="flex items-center gap-2 text-white text-sm mb-8 px-4 py-2 rounded-full w-fit" style="background: rgba(0,0,0,0.3); backdrop-filter: blur(4px)">
                        <a class="font-medium hover:opacity-80 transition-colors" href="/" style="color: white">Home</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                        <a class="hover:opacity-80 transition-colors" href="/#destinations" style="color: white">{{ $package->destination->name }}</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                        <span class="font-semibold" style="color: hsl(40 96% 61%)">{{ $package->title }}</span>
                    </div>
                    <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold border" style="background: hsl(40 96% 61% / 0.2); color: hsl(40 96% 61%); border-color: hsl(40 96% 61% / 0.3)">
                        {{ $package->tourType->name }}
                    </span>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight" style="color: white">
                        {{ $package->title }}
                    </h1>

                    @if($package->summary)
                    <p class="text-base md:text-lg leading-relaxed max-w-2xl" style="color: rgba(255,255,255,0.9)">
                        {{ $package->summary }}
                    </p>
                    @endif

                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 pt-2">
                        <div class="rounded-xl p-4 border" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(12px); border-color: rgba(255,255,255,0.2)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar h-5 w-5 text-yellow-accent mb-2">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <p class="text-xs mb-1" style="color: rgba(255,255,255,0.7)">Duration</p>
                            <p class="font-semibold" style="color: white">{{ $package->duration_days }} Days{{ $package->duration_nights ? ' / ' . $package->duration_nights . ' Nights' : '' }}</p>
                        </div>

                        <div class="rounded-xl p-4 border" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(12px); border-color: rgba(255,255,255,0.2)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-5 w-5 text-yellow-accent mb-2">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <p class="text-xs mb-1" style="color: rgba(255,255,255,0.7)">Location</p>
                            <p class="font-semibold" style="color: white">{{ $package->destination->name }}</p>
                        </div>

                        <div class="rounded-xl p-4 border" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(12px); border-color: rgba(255,255,255,0.2)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-5 w-5 text-yellow-accent mb-2">
                                <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                            </svg>
                            <p class="text-xs mb-1" style="color: rgba(255,255,255,0.7)">Rating</p>
                            <p class="font-semibold" style="color: white">4.2</p>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#booknow" class="px-8 py-4 rounded-xl text-base font-semibold transition-all duration-300 hover:scale-105 text-white" style="background: hsl(27 98% 48%); box-shadow: 0 20px 25px -5px hsl(27 98% 48% / 0.3)" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                            Book Now - ₹{{ number_format($package->price_start) }}
                        </a>
                        <a href="#itinerary" class="px-8 py-4 rounded-xl text-base font-semibold transition-all duration-300 text-white border-2" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(12px); border-color: rgba(255,255,255,0.3)" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.2)'; this.style.borderColor='rgba(255,255,255,0.5)'" onmouseout="this.style.backgroundColor='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.3)'">
                            View Itinerary
                        </a>
                    </div>
                </div>

                <!-- Right Highlights Box -->
                <div class="lg:col-span-2 rounded-2xl p-6 shadow-2xl border" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(18px); border-color: rgba(255,255,255,0.2)">
                    <h3 class="text-xl font-bold mb-4 flex items-center gap-2" style="color: white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5" style="color: hsl(40 96% 61%)">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        Tour Highlights
                    </h3>
                    <ul class="space-y-3">
                        @foreach($package->highlights as $highlight)
                        <li class="flex items-start gap-3 text-sm" style="color: rgba(255,255,255,0.9)">
                            <span class="mt-0.5" style="color: hsl(40 96% 61%)">✓</span>
                            <span class="flex-1">{{ $highlight }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-6 pt-5" style="border-top: 1px solid rgba(255,255,255,0.2)">
                        <p class="text-xs mb-1" style="color: rgba(255,255,255,0.7)">Starting from</p>
                        <p class="text-3xl font-bold" style="color: hsl(40 96% 61%)">₹{{ number_format($package->price_start) }}</p>
                        <p class="text-xs mt-1" style="color: rgba(255,255,255,0.6)">per person</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
            <div class="w-6 h-10 rounded-full border-2 flex items-start justify-center p-2" style="border-color: rgba(255,255,255,0.5)">
                <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
            </div>
        </div>
    </div>
</div>
<!-- Hero section end -->

<!-- About Package Section -->
<section class="py-8 px-4 md:px-8 max-w-7xl mx-auto">
    <div class="rounded-2xl shadow-md p-8" style="background: white">
        <h1 class="text-xl md:text-2xl lg:text-4xl font-bold mb-4" style="color: rgba(0,0,0,0.85)">{{ $package->h1_title }}</h1>

        <div class="flex flex-wrap items-center gap-8 mb-2">
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5" style="color: hsl(27 98% 48%)">
                    ircle cx="12" cy="12"2" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <span class="font-medium" style="color: hsl(24 33% 5%)">{{ $package->duration_days }} Days{{ $package->duration_nights ? ' / ' . $package->duration_nights . ' Nights' : '' }}</span>
            </div>

            <div class="flex items-center gap-2">
                <span class="text-2xl font-bold" style="color: hsl(27 98% 48%)">₹{{ number_format($package->price_start, 0) }}</span>
                <span style="color: hsl(0 0% 47%)">per person</span>
            </div>

            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5" style="color: hsl(27 98% 48%)">
                    <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                    ircle cx="12" cy="1010" r="3"></circle>
                </svg>
                <span class="font-medium" style="color: hsl(24 33% 5%)">{{ $package->destination->name }}</span>
            </div>
        </div>

        @if($package->full_description)
        <div class="mb-6 leading-relaxed" style="color: hsl(0 0% 47%)">
            {!! $package->full_description !!}
        </div>
        @endif

        <div>
            <h3 class="text-xl font-bold mb-4" style="color: hsl(24 33% 5%)">Tour Highlights</h3>
            <ul class="grid md:grid-cols-2 gap-3">
                @foreach($package->highlights as $highlight)
                <li class="flex items-start gap-2" style="color: hsl(0 0% 47%)">
                    <span style="color: hsl(27 98% 48%)">•</span>{{ $highlight }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<!-- About package section end -->

<!-- Photo Gallery Section (Placeholder - keep existing) -->
<div x-data="{ galleryModalOpen: false, gallerySwiper: null, openGallery(index = 0) { this.galleryModalOpen = true; document.body.style.overflow = 'hidden'; this.$nextTick(() => { if (!this.gallerySwiper) { this.initSwiper(); } this.gallerySwiper.slideTo(index, 0); }); }, closeGallery() { this.galleryModalOpen = false; document.body.style.overflow = ''; }, initSwiper() { this.gallerySwiper = new Swiper('#gallerySwiper', { loop: false, navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }, pagination: { el: '.swiper-pagination', type: 'fraction' }, keyboard: { enabled: true }, thumbs: { swiper: new Swiper('#galleryThumbs', { spaceBetween: 10, slidesPerView: 'auto', freeMode: true, watchSlidesProgress: true }) } }); } }">
    <section class="py-24 px-4 md:px-8" style="background: hsl(28 18% 94%)" data-aos="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-3" style="color: hsl(24 33% 5%)">Photo Gallery</h2>
                <p style="color: hsl(0 0% 47%)">Explore the beauty through our lens</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
                @php
                $galleryImages = $package->gallery;
                $totalImages = $galleryImages->count();
                $displayImages = $galleryImages->take(5);
                $remainingCount = max(0, $totalImages - 5);
                @endphp

                @foreach($displayImages as $index => $image)
                @if($index === 0)
                <div class="relative overflow-hidden rounded-xl shadow-lg cursor-pointer group col-span-2 row-span-2" @click="openGallery({{ $index }})">
                    <div class="relative overflow-hidden h-[400px] md:h-[500px]">
                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $image->alt_text ?? 'Gallery Image ' . ($index + 1) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <polyline points="9 21 3 21 3 15"></polyline>
                                <line x1="21" x2="14" y1="3" y2="10"></line>
                                <line x1="3" x2="10" y1="21" y2="14"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                @elseif($index === 4 && $remainingCount > 0)
                <div class="relative overflow-hidden rounded-xl shadow-lg cursor-pointer group" @click="openGallery({{ $index }})">
                    <div class="relative overflow-hidden h-[180px] md:h-[240px]">
                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $image->alt_text ?? 'Gallery Image ' . ($index + 1) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-black/60 flex items-center justify-center">
                            <div class="text-center">
                                <p class="text-white text-4xl font-bold">+{{ $remainingCount }}</p>
                                <p class="text-white text-sm mt-1">more</p>
                            </div>
                        </div>
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <polyline points="9 21 3 21 3 15"></polyline>
                                <line x1="21" x2="14" y1="3" y2="10"></line>
                                <line x1="3" x2="10" y1="21" y2="14"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                @else
                <div class="relative overflow-hidden rounded-xl shadow-lg cursor-pointer group" @click="openGallery({{ $index }})">
                    <div class="relative overflow-hidden h-[180px] md:h-[240px]">
                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $image->alt_text ?? 'Gallery Image ' . ($index + 1) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <polyline points="9 21 3 21 3 15"></polyline>
                                <line x1="21" x2="14" y1="3" y2="10"></line>
                                <line x1="3" x2="10" y1="21" y2="14"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Modal -->
    <div x-show="galleryModalOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="fixed inset-0 z-50 flex flex-col" style="background: rgba(0,0,0,0.9); backdrop-filter: blur(4px); display: none;" @keydown.escape.window="closeGallery()">

        <button @click="closeGallery()" class="absolute top-6 right-6 transition-colors duration-200 z-50" style="color: rgba(255,255,255,0.8)" onmouseover="this.style.color='hsl(40 96% 61%)'" onmouseout="this.style.color='rgba(255,255,255,0.8)'">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>

        <div class="flex-1 flex items-center justify-center px-4 md:px-16 py-8 relative">
            <div id="gallerySwiper" class="swiper w-full h-full flex justify-center items-center relative">
                <div class="swiper-wrapper">
                    @foreach($galleryImages as $image)
                    <div class="swiper-slide flex items-center justify-center">
                        <div class="relative w-[90vw] md:w-[80vw] h-[75vh] md:h-[80vh] rounded-2xl overflow-hidden shadow-2xl flex items-center justify-center mx-auto" style="background: rgba(0,0,0,0.3); backdrop-filter: blur(4px)">
                            <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $image->alt_text ?? 'Gallery Image' }}" class="w-full h-full object-cover object-center transition-transform duration-500 ease-in-out" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="swiper-button-prev transition-all duration-200" style="color: rgba(255,255,255,0.7); left: 24px" onmouseover="this.style.color='hsl(40 96% 61%)'" onmouseout="this.style.color='rgba(255,255,255,0.7)'"></div>
                <div class="swiper-button-next transition-all duration-200" style="color: rgba(255,255,255,0.7); right: 24px" onmouseover="this.style.color='hsl(40 96% 61%)'" onmouseout="this.style.color='rgba(255,255,255,0.7)'"></div>

                <div class="swiper-pagination" style="bottom: 16px; color: white"></div>
            </div>
        </div>

        @if($totalImages > 1)
        <div class="px-4 md:px-16 pb-12 -mt-4">
            <div id="galleryThumbs" class="swiper">
                <div class="swiper-wrapper flex items-center justify-center space-x-2">
                    @foreach($galleryImages as $image)
                    <div class="swiper-slide !w-20 !h-20 md:!w-24 md:!h-24 cursor-pointer rounded-xl overflow-hidden border-2 border-transparent hover:border-yellow-400 transition-all duration-300 shadow-md hover:shadow-lg flex justify-center items-center" style="opacity: 0.8" onmouseover="this.style.opacity='1'; this.style.borderColor='hsl(40 96% 61%)'" onmouseout="this.style.opacity='0.8'; this.style.borderColor='transparent'">
                        <img src="{{ asset('storage/' . $image->image_url) }}" alt="{{ $image->alt_text ?? 'Thumbnail' }}" class="w-full h-full object-cover object-center">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<!-- Photo gallery section end -->

<!-- Itinerary Section -->
<section id="itinerary" class="py-16 px-4 md:px-8 max-w-7xl mx-auto" data-aos="fade-up">
    <h2 class="text-4xl font-bold mb-12" style="color: hsl(24 33% 5%)">Detailed Itinerary</h2>

    @if($package->itineraryDays->count() > 0)
    <div class="relative">
        <div class="absolute left-6 top-0 bottom-0 w-0.5 hidden md:block" style="background: hsl(27 98% 48% / 0.2)"></div>

        <div class="space-y-4" x-data="itineraryAccordion()">
            @foreach($package->itineraryDays as $day)
            <div class="group" x-data="{ open: false }">
                <div class="border-b rounded-2xl shadow-md border-none overflow-hidden" style="background: white">
                    <button @click="open = !open" class="flex flex-1 items-center justify-between font-medium transition-all w-full px-6 py-4 focus:outline-none group-hover:shadow-md" style="background: white" onmouseover="this.style.backgroundColor='hsl(28 18% 94%)'" onmouseout="this.style.backgroundColor='white'">
                        <div class="flex items-center gap-4 text-left w-full">
                            <div class="w-12 h-12 rounded-full text-white flex items-center justify-center font-bold flex-shrink-0" style="background: hsl(27 98% 48%)">
                                {{ $day->day_number }}
                            </div>

                            <div class="flex-1">
                                <h3 class="text-xl font-bold" style="color: hsl(24 33% 5%)">{{ $day->day_title }}</h3>
                            </div>

                            @if($day->feature_image)
                            <div class="hidden md:block w-24 h-20 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="{{ asset('storage/' . $day->feature_image) }}" alt="{{ $day->feature_image_alt }}" class="w-full h-full object-cover" />
                            </div>
                            @endif
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" style="color: hsl(24 33% 5%)">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition class="px-6 py-6 border-t space-y-6" style="background: hsl(28 18% 94%); border-color: hsl(0 0% 90%)">
                        @if($day->day_description)
                        <div class="prose prose-sm max-w-none leading-relaxed" style="color: hsl(0 0% 47%)">
                            {!! $day->day_description !!}
                        </div>
                        @endif

                        @if($day->places->count() > 0)
                        <div class="pt-4 border-t" style="border-color: hsl(0 0% 90%)">
                            <h4 class="text-sm font-bold uppercase mb-4" style="color: hsl(27 98% 48%)">Places Visited</h4>
                            <div class="space-y-3">
                                @foreach($day->places as $place)
                                <div class="flex gap-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background: hsl(27 98% 48% / 0.2)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: hsl(27 98% 48%)">
                                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                                ircle cx="12" cy="10"0" r="3" fill="white"></circle>
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="flex-1">
                                        <h5 class="font-semibold" style="color: hsl(24 33% 5%)">{{ $place->place_name }}</h5>
                                        @if($place->place_description)
                                        <p class="text-sm mt-1" style="color: hsl(0 0% 47%)">{{ $place->place_description }}</p>
                                        @endif
                                        @if($place->latitude && $place->longitude)
                                        <p class="text-xs mt-1" style="color: hsl(0 0% 47%)">📍 {{ number_format($place->latitude, 4) }}, {{ number_format($place->longitude, 4) }}</p>
                                        @endif
                                    </div>

                                    @if($place->image_url)
                                    <div class="hidden md:block w-20 h-20 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('storage/' . $place->image_url) }}" alt="{{ $place->image_alt }}" class="w-full h-full object-cover" />
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="text-center py-12 rounded-xl" style="background: hsl(28 18% 94%)">
        <p style="color: hsl(0 0% 47%)">No itinerary available for this package.</p>
    </div>
    @endif
</section>

<!-- What's Included Section -->
<section class="py-16 px-4 md:px-8 max-w-7xl mx-auto" data-aos="fade-up">
    <div class="grid md:grid-cols-2 gap-8">

        <!-- Included -->
        <div class="rounded-2xl shadow-lg p-8 border-2 transition-shadow duration-300" style="background: white; border-color: hsl(27 98% 48% / 0.3)" onmouseover="this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'" onmouseout="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1)'">
            <h3 class="text-2xl font-bold mb-6 pb-3" style="color: hsl(24 33% 5%); border-bottom: 1px solid hsl(27 98% 48% / 0.2)">What's Included</h3>
            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 flex-shrink-0 mt-0.5" style="color: hsl(27 98% 48%)">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    <span style="color: hsl(0 0% 47%)">Convenient residence in hotels or other special lodging facilities.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 flex-shrink-0 mt-0.5" style="color: hsl(27 98% 48%)">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    <span style="color: hsl(0 0% 47%)">Transport between holidays in buses, cars, and trains.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 flex-shrink-0 mt-0.5" style="color: hsl(27 98% 48%)">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    <span style="color: hsl(0 0% 47%)">Tours to popular tourist sites and attractions.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 flex-shrink-0 mt-0.5" style="color: hsl(27 98% 48%)">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    <span style="color: hsl(0 0% 47%)">Planned trips to experience the local culture and learn about landmarks in a region.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 flex-shrink-0 mt-0.5" style="color: hsl(27 98% 48%)">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    <span style="color: hsl(0 0% 47%)">Dinner and breakfast (as per the itinerary to be served at hotel or other services).</span>
                </li>
            </ul>
        </div>

        <!-- Not Included -->
        <div class="rounded-2xl shadow-lg p-8 border-2 transition-all duration-300" style="background: white; border-color: hsl(0 0% 90%)" onmouseover="this.style.borderColor='hsl(27 98% 48% / 0.3)'; this.style.boxShadow='0 25px 50px -12px rgba(0, 0, 0, 0.25)'" onmouseout="this.style.borderColor='hsl(0 0% 90%)'; this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1)'">
            <h3 class="text-2xl font-bold mb-6 pb-3" style="color: hsl(24 33% 5%); border-bottom: 1px solid hsl(0 0% 90%)">What's Not Included</h3>
            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 flex-shrink-0 mt-0.5" style="color: hsl(0 0% 47%)">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                    <span style="color: hsl(0 0% 47%)">Other tours or experiences besides those facilitated by the package.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 flex-shrink-0 mt-0.5" style="color: hsl(0 0% 47%)">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                    <span style="color: hsl(0 0% 47%)">Personal expenses (anything which is not mentioned).</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 flex-shrink-0 mt-0.5" style="color: hsl(0 0% 47%)">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                    <span style="color: hsl(0 0% 47%)">Only offers coverage for emergencies, health, and trip cancellations.</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 px-4 md:px-8 max-w-4xl mx-auto" data-aos="fade-up">
    <h2 class="text-4xl font-bold mb-12 text-center" style="color: hsl(24 33% 5%)">Frequently Asked Questions</h2>

    @if($package->faqs->count() > 0)
    <div class="space-y-4" x-data="faqAccordion()">
        @foreach($package->faqs as $index => $faq)
        <div x-data="{ open: false }">
            <div class="border-b rounded-xl shadow-md border-none px-6" style="background: white">
                <h3 class="flex">
                    <button type="button" @click="open = !open" class="flex flex-1 items-center justify-between transition-all text-left font-bold py-5 focus:outline-none w-full" style="color: hsl(24 33% 5%)" onmouseover="this.style.color='hsl(27 98% 48%)'" onmouseout="this.style.color='hsl(24 33% 5%)'">
                        {{ $faq->question }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                </h3>
                <div x-show="open" x-transition class="overflow-hidden text-sm transition-all pb-5">
                    <div class="prose prose-sm max-w-none leading-relaxed" style="color: hsl(0 0% 47%)">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-12 rounded-xl" style="background: hsl(28 18% 94%)">
        <p style="color: hsl(0 0% 47%)">No FAQs available for this package.</p>
    </div>
    @endif
</section>

<!-- Booking Form Section -->
<section id="booknow" class="py-16 px-4 md:px-8 max-w-7xl mx-auto" data-aos="fade-up">
    <div class="max-w-5xl mx-auto rounded-2xl shadow-xl p-6 md:p-8 border" style="background: linear-gradient(to bottom right, white, hsl(27 98% 48% / 0.05)); border-color: hsl(27 98% 48% / 0.1)">
        <h2 class="text-2xl md:text-3xl font-bold mb-6" style="color: hsl(24 33% 5%)">Book Your Tour</h2>

        <form @submit.prevent="submitBooking()" class="grid md:grid-cols-2 gap-x-8 gap-y-4" x-data="bookingForm({ packageId: {{ $package->id }}, packageTitle: @js($package->title), basePrice: {{ $package->price_start }}, submitUrl: '{{ route('booking.mail') }}' })" x-init="updateTotal()">

            <div class="space-y-4">
                <!-- Full Name -->
                <div class="space-y-1.5">
                    <label class="text-sm font-medium" for="name" style="color: hsl(24 33% 5%)">Full Name</label>
                    <input x-model="form.name" type="text" id="name" placeholder="Enter your name" class="flex w-full rounded-md border px-3 py-2 text-base placeholder:text-gray-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 md:text-sm h-10" style="background: hsl(28 22% 97%); border-color: hsl(0 0% 90%); color: hsl(24 33% 5%); focus-visible-ring-color: hsl(27 98% 48%)" />
                    <template x-if="errors.name">
                        <p class="text-xs" style="color: rgb(239, 68, 68)" x-text="errors.name"></p>
                    </template>
                </div>

                <!-- Email -->
                <div class="space-y-1.5">
                    <label class="text-sm font-medium" for="email" style="color: hsl(24 33% 5%)">Email Address</label>
                    <input x-model="form.email" type="email" id="email" placeholder="Enter your email" class="flex w-full rounded-md border px-3 py-2 text-base placeholder:text-gray-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 md:text-sm h-10" style="background: hsl(28 22% 97%); border-color: hsl(0 0% 90%); color: hsl(24 33% 5%); focus-visible-ring-color: hsl(27 98% 48%)" />
                    <template x-if="errors.email">
                        <p class="text-xs" style="color: rgb(239, 68, 68)" x-text="errors.email"></p>
                    </template>
                </div>

                <!-- Phone -->
                <div class="space-y-1.5">
                    <label class="text-sm font-medium" for="phone" style="color: hsl(24 33% 5%)">Phone Number</label>
                    <input x-model="form.phone" type="tel" id="phone" placeholder="Enter your phone" class="flex w-full rounded-md border px-3 py-2 text-base placeholder:text-gray-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 md:text-sm h-10" style="background: hsl(28 22% 97%); border-color: hsl(0 0% 90%); color: hsl(24 33% 5%); focus-visible-ring-color: hsl(27 98% 48%)" />
                    <template x-if="errors.phone">
                        <p class="text-xs" style="color: rgb(239, 68, 68)" x-text="errors.phone"></p>
                    </template>
                </div>

                <!-- Date & Travelers -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-sm font-medium" style="color: hsl(24 33% 5%)">Start Date</label>
                        <input x-model="form.start_date" type="date" class="flex w-full rounded-md border px-3 py-2 text-base focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 md:text-sm h-10" style="background: hsl(28 22% 97%); border-color: hsl(0 0% 90%); color: hsl(24 33% 5%); focus-visible-ring-color: hsl(27 98% 48%)" />
                        <template x-if="errors.start_date">
                            <p class="text-xs" style="color: rgb(239, 68, 68)" x-text="errors.start_date"></p>
                        </template>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-sm font-medium" for="travelers" style="color: hsl(24 33% 5%)">Travelers</label>
                        <input x-model.number="form.travelers" @input="updateTotal()" type="number" id="travelers" min="1" value="1" class="flex w-full rounded-md border px-3 py-2 text-base focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 md:text-sm h-10" style="background: hsl(28 22% 97%); border-color: hsl(0 0% 90%); color: hsl(24 33% 5%); focus-visible-ring-color: hsl(27 98% 48%)" />
                        <template x-if="errors.travelers">
                            <p class="text-xs" style="color: rgb(239, 68, 68)" x-text="errors.travelers"></p>
                        </template>
                    </div>
                </div>

                <!-- Special Requirements -->
                <div class="space-y-1.5">
                    <label class="text-sm font-medium" for="requirements" style="color: hsl(24 33% 5%)">Special Requirements</label>
                    <textarea x-model="form.requirements" id="requirements" placeholder="Any special requests..." rows="3" class="flex min-h-[80px] w-full rounded-md border px-3 py-2 text-sm placeholder:text-gray-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 resize-none h-20" style="background: hsl(28 22% 97%); border-color: hsl(0 0% 90%); color: hsl(24 33% 5%); focus-visible-ring-color: hsl(27 98% 48%)"></textarea>
                </div>
            </div>

            <!-- Price Summary -->
            <div class="flex flex-col">
                <div class="rounded-xl p-6 border-2 h-full flex flex-col" style="background: linear-gradient(to bottom right, hsl(27 98% 48% / 0.1), hsl(27 98% 48% / 0.05)); border-color: hsl(27 98% 48% / 0.2)">
                    <h3 class="text-lg font-bold mb-4 flex items-center gap-2" style="color: hsl(24 33% 5%)">
                        <span>💰</span>
                        Price Summary
                    </h3>

                    <div class="space-y-3 flex-1">
                        <div class="flex justify-between items-center pb-3" style="border-bottom: 1px solid hsl(27 98% 48% / 0.1)">
                            <span class="text-sm" style="color: hsl(0 0% 47%)">Base Price</span>
                            <span class="text-base font-semibold" style="color: hsl(24 33% 5%)">₹{{ number_format($package->price_start) }}</span>
                        </div>

                        <div class="flex justify-between items-center pb-3" style="border-bottom: 1px solid hsl(27 98% 48% / 0.1)">
                            <span class="text-sm" style="color: hsl(0 0% 47%)">Travelers</span>
                            <span class="text-base font-semibold" style="color: hsl(24 33% 5%)">× <span x-text="form.travelers"></span></span>
                        </div>

                        <div class="rounded-lg p-4 mt-4" style="background: hsl(27 98% 48% / 0.1)">
                            <div class="flex justify-between items-center">
                                <span class="text-base font-bold" style="color: hsl(24 33% 5%)">Total Price</span>
                                <span class="text-2xl font-bold" style="color: hsl(27 98% 48%)">₹<span x-text="totalPrice.toLocaleString('en-IN')"></span></span>
                            </div>
                            <p class="text-xs mt-1" style="color: hsl(0 0% 47%)">per person rate applied</p>
                        </div>

                        <div class="rounded-lg p-3 mt-4" style="background: hsl(40 96% 61% / 0.1)">
                            <p class="text-xs font-medium" style="color: hsl(24 33% 5%)">✨ Free cancellation up to 7 days before departure</p>
                        </div>
                    </div>

                    <button type="submit" :disabled="isSubmitting" class="inline-flex items-center justify-center gap-2 whitespace-nowrap w-full h-10 px-4 rounded-xl py-5 text-base font-semibold mt-6 shadow-lg transition-all text-white" style="background: hsl(27 98% 48%)" @mouseover="this.style.opacity='0.9'" @mouseout="this.style.opacity='1'">
                        <span x-show="!isSubmitting">Confirm Booking</span>
                        <span x-show="isSubmitting" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                ircle class="opacity-25" cx="12" cy="12" r="10" stroke="currentntColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Booking...
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('bookingForm', (packageData) => {
            return {
                isSubmitting: false,
                totalPrice: parseFloat(packageData.basePrice) || 0,
                form: {
                    name: '',
                    email: '',
                    phone: '',
                    start_date: '',
                    travelers: 1,
                    requirements: '',
                    package_id: parseInt(packageData.packageId) || 0,
                    package_title: packageData.packageTitle || '',
                    total_price: parseFloat(packageData.basePrice) || 0,
                },
                errors: {},
                basePrice: parseFloat(packageData.basePrice) || 0,

                init() {
                    this.updateTotal();
                },

                updateTotal() {
                    this.totalPrice = this.basePrice * this.form.travelers;
                    this.form.total_price = this.totalPrice;
                },

                async submitBooking() {
                    this.isSubmitting = true;
                    this.errors = {};

                    try {
                        const response = await fetch(packageData.submitUrl, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                            body: JSON.stringify(this.form),
                        });

                        const data = await response.json();

                        if (response.ok) {
                            alert('Booking request submitted successfully! We will contact you soon.');
                            this.resetForm();
                        } else {
                            this.errors = data.errors || {};
                            if (data.message) {
                                alert(data.message);
                            }
                        }
                    } catch (error) {
                        console.error('Booking error:', error);
                        alert('Error submitting booking. Please try again.');
                    } finally {
                        this.isSubmitting = false;
                    }
                },

                resetForm() {
                    this.form = {
                        name: '',
                        email: '',
                        phone: '',
                        start_date: '',
                        travelers: 1,
                        requirements: '',
                        package_id: parseInt(packageData.packageId) || 0,
                        package_title: packageData.packageTitle || '',
                        total_price: parseFloat(packageData.basePrice) || 0,
                    };
                    this.totalPrice = this.basePrice;
                },
            };
        });
    });
</script>
@endpush

@endsection