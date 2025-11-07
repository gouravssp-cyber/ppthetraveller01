@extends('layouts.app')

@section('title', $package->meta_title ?? $package->title)
@section('meta_description', $package->meta_description ?? $package->summary)

@section('content')


<div class="min-h-screen">
    <div
        class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-b from-gray-900 to-black">
        <div
            class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ $package->banner_image ? asset('storage/' . $package->banner_image) : asset('default-image.jpg') }}');"></div>
        <div
            class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/50 to-black/70"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 py-8 w-full">
            <div
                class="flex items-center gap-2 text-white text-sm mb-8 bg-black/30 backdrop-blur-sm px-4 py-2 rounded-full w-fit">
                <a
                    class="hover:text-yellow-accent transition-colors font-medium"
                    href="/">Home</a><svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="14"
                    height="14"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
                <a
                    class="hover:text-yellow-accent transition-colors"
                    href="/#destinations">{{ $package->destination->name }}</a><svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="14"
                    height="14"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-chevron-right">
                    <path d="m9 18 6-6-6-6"></path>
                </svg><span class="text-yellow-accent font-semibold">{{ $package->title }}</span>
            </div>

            <div class="grid lg:grid-cols-5 gap-8 items-center">
                <div class="lg:col-span-3 space-y-6">
                    <div>
                        <span
                            class="inline-block bg-yellow-accent/20 backdrop-blur-sm text-yellow-accent px-4 py-2 rounded-full text-sm font-semibold border border-yellow-accent/30">{{ $package->tourType->name }}</span>
                    </div>
                    <span
                        class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight">
                        {{ $package->title }}
                    </span>
                    @if($package->summary)
                    <p
                        class="text-base md:text-lg text-white/90 leading-relaxed max-w-2xl">
                        {{ $package->summary }}
                    </p>
                    @endif
                    <div
                        class="grid grid-cols-2 md:grid-cols-3 gap-3 pt-2">
                        <div
                            class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-calendar h-5 w-5 text-yellow-accent mb-2">
                                <path d="M8 2v4"></path>
                                <path d="M16 2v4"></path>
                                <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                <path d="M3 10h18"></path>
                            </svg>
                            <p class="text-white/70 text-xs">Duration</p>
                            <p class="text-white font-semibold text-sm">
                                {{ $package->duration_days }} Days{{ $package->duration_nights ?
                ' / ' . $package->duration_nights . ' Nights' : '' }}
                            </p>
                        </div>
                        <div
                            class="bg-white/10 backdrop-blur-md rounded-xl p-4 border border-white/20">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-map-pin h-5 w-5 text-yellow-accent mb-2">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <p class="text-white/70 text-xs">Location</p>
                            <p class="text-white font-semibold text-sm">
                                {{ $package->destination->name }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="flex flex-col sm:flex-row gap-4 pt-4">
                        <button
                            class="bg-orange-primary hover:bg-orange-primary/90 text-white px-8 py-4 rounded-xl text-base font-semibold transition-all duration-300 hover:scale-105 hover:shadow-2xl shadow-orange-primary/30">
                            Book Now - ₹{{ number_format($package->price_start) }}</button><button
                            class="bg-white/10 backdrop-blur-md hover:bg-white/20 text-white px-8 py-4 rounded-xl text-base font-semibold transition-all duration-300 border-2 border-white/30 hover:border-white/50">
                            View Itinerary
                        </button>
                    </div>
                </div>
                <div
                    class="lg:col-span-2 bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 shadow-2xl">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-star h-5 w-5 text-yellow-accent">
                            <path
                                d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                        </svg>Tour Highlights
                    </h3>
                    <ul class="space-y-3">
                        @foreach($package->highlights as $highlight)
                        <li class="flex items-start gap-3 text-white/90 text-sm">
                            <span class="text-yellow-accent text-lg mt-0.5">✓</span>
                            <span class="flex-1">{{ $highlight }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="mt-6 pt-5 border-t border-white/20">
                        <p class="text-white/70 text-xs mb-1">Starting from</p>
                        <p class="text-3xl font-bold text-yellow-accent">
                            ₹{{ number_format($package->price_start) }}
                        </p>
                        <p class="text-white/60 text-xs mt-1">per person</p>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
            <div
                class="w-6 h-10 rounded-full border-2 border-white/50 flex items-start justify-center p-2">
                <div
                    class="w-1.5 h-1.5 bg-white rounded-full"></div>
            </div>
        </div>
    </div>
</div>
<!-- hero section end -->


<!-- about package section start -->
<section
    class="py-8 px-4 md:px-8 max-w-7xl mx-auto">
    <div class=" rounded-2xl shadow-md p-8">
        <h1 class="text-xl md:text-2xl lg:text-4xl font-bold mb-4 text-black/85 ">{{$package->h1_title}}</h1>
        <div class="flex flex-wrap items-center gap-8 mb-2">
            <div class="flex items-center gap-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-clock h-5 w-5 text-orange-primary">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg><span class="text-title font-medium">
                    {{ $package->duration_days }} Days{{ $package->duration_nights ? "
          {$package->duration_nights} Nights" : '' }}
                </span>
            </div>
            <div class="flex items-center gap-2"> <span class="text-orange-primary font-bold text-2xl">₹{{ number_format($package->price_start, 0) }}</span><span class="text-body-text">per person</span>
            </div>
            <div class="flex items-center gap-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="lucide lucide-map-pin h-5 w-5 text-orange-primary">
                    <path
                        d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                </svg><span class="text-title font-medium">{{ $package->destination->name }}</span>
            </div>
        </div>
        @if($package->full_description)
        <div class="text-body-text mb-6 leading-relaxed">
            {!! $package->full_description !!}
        </div>
        @endif
        <div>
            <h3 class="text-xl font-bold text-title mb-4">Tour Highlights</h3>
            <ul class="grid md:grid-cols-2 gap-3">
                @foreach($package->highlights as $highlight)
                <li
                    class="flex items-start gap-2 text-body-text">
                    <span class="text-orange-primary mt-1">•</span>{{ $highlight }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<!-- about package section end -->


<!-- photo gallery section start -->
<div x-data="{
        galleryModalOpen: false,
        gallerySwiper: null,
        openGallery(index = 0) {
            this.galleryModalOpen = true;
            document.body.style.overflow = 'hidden';
            this.$nextTick(() => {
                if (!this.gallerySwiper) {
                    this.initSwiper();
                }
                this.gallerySwiper.slideTo(index, 0);
            });
        },
        closeGallery() {
            this.galleryModalOpen = false;
            document.body.style.overflow = '';
        },
        initSwiper() {
            this.gallerySwiper = new Swiper('#gallerySwiper', {
                loop: false,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    type: 'fraction',
                },
                keyboard: {
                    enabled: true,
                },
                thumbs: {
                    swiper: new Swiper('#galleryThumbs', {
                        spaceBetween: 10,
                        slidesPerView: 'auto',
                        freeMode: true,
                        watchSlidesProgress: true,
                    })
                },
            });
        }
    }">
    <section class="py-16 px-4 md:px-8 bg-gray-50" data-aos="fade-up">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-title mb-3">
                    Photo Gallery
                </h2>
                <p class="text-body-text">
                    Explore the beauty through our lens
                </p>
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
                {{-- First image: 2x2 grid space --}}
                <div class="relative overflow-hidden rounded-xl shadow-lg cursor-pointer group col-span-2 row-span-2"
                    @click="openGallery({{ $index }})">
                    <div class="relative overflow-hidden h-[400px] md:h-[500px]">
                        <img src="{{ asset('storage/' . $image->image_url) }}"
                            alt="{{ $image->alt_text ?? 'Gallery Image ' . ($index + 1) }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-maximize2 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <polyline points="9 21 3 21 3 15"></polyline>
                                <line x1="21" x2="14" y1="3" y2="10"></line>
                                <line x1="3" x2="10" y1="21" y2="14"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                @elseif($index === 4 && $remainingCount > 0)
                {{-- 5th image with "+X more" overlay --}}
                <div class="relative overflow-hidden rounded-xl shadow-lg cursor-pointer group"
                    @click="openGallery({{ $index }})">
                    <div class="relative overflow-hidden h-[180px] md:h-[240px]">
                        <img src="{{ asset('storage/' . $image->image_url) }}"
                            alt="{{ $image->alt_text ?? 'Gallery Image ' . ($index + 1) }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />

                        {{-- Dark overlay with "+X more" text --}}
                        <div class="absolute inset-0 bg-black/60 flex items-center justify-center">
                            <div class="text-center">
                                <p class="text-white text-4xl font-bold">+{{ $remainingCount }}</p>
                                <p class="text-white text-sm mt-1">more</p>
                            </div>
                        </div>

                        {{-- Hover effect --}}
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-maximize2 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <polyline points="9 21 3 21 3 15"></polyline>
                                <line x1="21" x2="14" y1="3" y2="10"></line>
                                <line x1="3" x2="10" y1="21" y2="14"></line>
                            </svg>
                        </div>
                    </div>
                </div>
                @else
                {{-- Regular small images (2-4) --}}
                <div class="relative overflow-hidden rounded-xl shadow-lg cursor-pointer group"
                    @click="openGallery({{ $index }})">
                    <div class="relative overflow-hidden h-[180px] md:h-[240px]">
                        <img src="{{ asset('storage/' . $image->image_url) }}"
                            alt="{{ $image->alt_text ?? 'Gallery Image ' . ($index + 1) }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-maximize2 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
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

    {{-- Gallery Modal (Modern Centered Full-screen Swiper Carousel) --}}
    <div
        x-show="galleryModalOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 bg-black/90 backdrop-blur-sm z-50 flex flex-col"
        @keydown.escape.window="closeGallery()"
        style="display: none;">
        {{-- Close Button --}}
        <button
            @click="closeGallery()"
            class="absolute top-6 right-6 text-white/80 hover:text-yellow-400 transition-colors duration-200 z-50"
            aria-label="Close gallery">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>

        {{-- Main Carousel --}}
        <div class="flex-1 flex items-center justify-center px-4 md:px-16 py-8 relative">
            <div id="gallerySwiper" class="swiper w-full h-full flex justify-center items-center relative">
                <div class="swiper-wrapper">
                    @foreach($galleryImages as $image)
                    <div class="swiper-slide flex items-center justify-center">
                        <div class="relative w-[90vw] md:w-[80vw] h-[75vh] md:h-[80vh] rounded-2xl overflow-hidden shadow-2xl bg-black/30 backdrop-blur-sm flex items-center justify-center mx-auto">
                            <img
                                src="{{ asset('storage/' . $image->image_url) }}"
                                alt="{{ $image->alt_text ?? 'Gallery Image' }}"
                                class="w-full h-full object-cover object-center transition-transform duration-500 ease-in-out hover:scale-[1.03]">
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Navigation Arrows --}}
                <div class="swiper-button-prev !text-white/70 hover:!text-yellow-400 transition-all duration-200 !left-6 md:!left-12"></div>
                <div class="swiper-button-next !text-white/70 hover:!text-yellow-400 transition-all duration-200 !right-6 md:!right-12"></div>

                {{-- Pagination Dots --}}
                <div class="swiper-pagination !bottom-4 !text-white"></div>
            </div>
        </div>

        {{-- Thumbnail Navigation --}}
        @if($totalImages > 1)
        <div class="px-4 md:px-16 pb-12 -mt-4"> {{-- moved up slightly --}}
            <div id="galleryThumbs" class="swiper">
                <div class="swiper-wrapper flex items-center justify-center space-x-2">
                    @foreach($galleryImages as $image)
                    <div class="swiper-slide !w-20 !h-20 md:!w-24 md:!h-24 cursor-pointer rounded-xl overflow-hidden border-2 border-transparent hover:border-yellow-400 transition-all duration-300 opacity-80 hover:opacity-100 shadow-md hover:shadow-lg flex justify-center items-center">
                        <img
                            src="{{ asset('storage/' . $image->image_url) }}"
                            alt="{{ $image->alt_text ?? 'Thumbnail' }}"
                            class="w-full h-full object-cover object-center">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
    {{-- End Gallery Modal --}}



    @push('scripts')
    @endpush
</div>
<!-- photo gallery section end -->




<!-- itinerary section start -->
<section class="py-16 px-4 md:px-8 max-w-7xl mx-auto" data-aos="fade-up">
    <h2 class="text-4xl font-bold text-title mb-12">
        Detailed Itinerary
    </h2>

    @if($package->itineraryDays->count() > 0)
    <div class="relative">
        <!-- Vertical Timeline Line -->
        <div class="absolute left-6 top-0 bottom-0 w-0.5 bg-orange-primary/20 hidden md:block"></div>

        <!-- Days List -->
        <div class="space-y-4" x-data="itineraryAccordion()">
            @foreach($package->itineraryDays as $day)
            <div class="group" x-data="{ open: false }">
                <div class="border-b bg-white rounded-2xl shadow-md border-none overflow-hidden">
                    <!-- Day Header (Summary) -->
                    <button @click="open = !open" class="flex flex-1 items-center justify-between font-medium transition-all w-full px-6 py-4 hover:bg-gray-50 focus:outline-none group-hover:shadow-md">
                        <div class="flex items-center gap-4 text-left w-full">
                            <!-- Day Number Circle -->
                            <div class="w-12 h-12 rounded-full bg-orange-primary text-white flex items-center justify-center font-bold flex-shrink-0">
                                {{ $day->day_number }}
                            </div>

                            <!-- Day Title & Subtitle -->
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-title">
                                    {{ $day->day_title }}
                                </h3>
                            </div>

                            <!-- Day Image (Hidden on Mobile) -->
                            @if($day->feature_image)
                            <div class="hidden md:block w-24 h-20 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="{{ asset('storage/' . $day->feature_image) }}"
                                    alt="{{ $day->feature_image_alt }}"
                                    class="w-full h-full object-cover" />
                            </div>
                            @endif
                        </div>

                        <!-- Chevron Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>

                    <!-- Day Content (Hidden by default) -->
                    <div x-show="open" x-transition class="px-6 py-6 bg-gray-50 border-t border-gray-100 space-y-6">
                        <!-- Full Description -->
                        @if($day->day_description)
                        <div class="prose prose-sm max-w-none text-body-text leading-relaxed">
                            {!! $day->day_description !!}
                        </div>
                        @endif

                        <!-- Places Visited -->
                        @if($day->places->count() > 0)
                        <div class="pt-4 border-t border-gray-200">
                            <h4 class="text-sm font-bold text-orange-primary uppercase mb-4">
                                Places Visited
                            </h4>
                            <div class="space-y-3">
                                @foreach($day->places as $place)
                                <div class="flex gap-4">
                                    <!-- Place Icon/Marker -->
                                    <div class="flex-shrink-0">
                                        <div class="w-8 h-8 rounded-full bg-orange-primary/20 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" class="text-orange-primary">
                                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                                <circle cx="12" cy="10" r="3" class="fill-white"></circle>
                                            </svg>
                                        </div>
                                    </div>

                                    <!-- Place Details -->
                                    <div class="flex-1">
                                        <h5 class="font-semibold text-title">
                                            {{ $place->place_name }}
                                        </h5>
                                        @if($place->place_description)
                                        <p class="text-sm text-body-text mt-1">
                                            {{ $place->place_description }}
                                        </p>
                                        @endif
                                        @if($place->latitude && $place->longitude)
                                        <p class="text-xs text-muted-foreground mt-1">
                                            📍 {{ number_format($place->latitude, 4) }}, {{ number_format($place->longitude, 4) }}
                                        </p>
                                        @endif
                                    </div>

                                    <!-- Place Image (if exists) -->
                                    @if($place->image_url)
                                    <div class="hidden md:block w-20 h-20 rounded-lg overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('storage/' . $place->image_url) }}"
                                            alt="{{ $place->image_alt }}"
                                            class="w-full h-full object-cover" />
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
    <div class="text-center py-12 bg-gray-50 rounded-xl">
        <p class="text-body-text">No itinerary available for this package.</p>
    </div>
    @endif
</section>

<style>
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<!-- itinerary section end  -->


<!-- what include section   -->

<section class="py-16 px-4 md:px-8 max-w-7xl mx-auto" data-aos="fade-up">
    <div class="grid md:grid-cols-2 gap-8">

        <!-- Included -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-orange-primary/30 hover:shadow-2xl transition-shadow duration-300">
            <h3 class="text-2xl font-bold text-title mb-6 border-b border-orange-primary/20 pb-3">
                What's Included
            </h3>
            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-check h-5 w-5 text-orange-primary flex-shrink-0 mt-0.5">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    <span class="text-body-text">Convenient residence in hotels or other special lodging facilities.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-check h-5 w-5 text-orange-primary flex-shrink-0 mt-0.5">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    <span class="text-body-text">Transport between holidays in buses, cars, and trains.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-check h-5 w-5 text-orange-primary flex-shrink-0 mt-0.5">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    <span class="text-body-text">Tours to popular tourist sites and attractions.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-check h-5 w-5 text-orange-primary flex-shrink-0 mt-0.5">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    <span class="text-body-text">Planned trips to experience the local culture and learn about landmarks in a region.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-check h-5 w-5 text-orange-primary flex-shrink-0 mt-0.5">
                        <path d="M20 6 9 17l-5-5"></path>
                    </svg>
                    <span class="text-body-text">Dinner and breakfast (as per the itinerary to be served at hotel or other services).</span>
                </li>
            </ul>
        </div>

        <!-- Not Included -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-gray-300 hover:border-orange-primary/30 hover:shadow-2xl transition duration-300">
            <h3 class="text-2xl font-bold text-title mb-6 border-b border-gray-200 pb-3">
                What's Not Included
            </h3>
            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-x h-5 w-5 text-body-text flex-shrink-0 mt-0.5">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                    <span class="text-body-text">Other tours or experiences besides those facilitated by the package.</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-x h-5 w-5 text-body-text flex-shrink-0 mt-0.5">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                    <span class="text-body-text">Personal expenses (anything which is not mentioned).</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-x h-5 w-5 text-body-text flex-shrink-0 mt-0.5">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                    <span class="text-body-text">Only offers coverage for emergencies, health, and trip cancellations.</span>
                </li>
            </ul>
        </div>

    </div>
</section>

<!-- what include section end  -->


<!-- faq section start  -->
<section class="py-16 px-4 md:px-8 max-w-4xl mx-auto" data-aos="fade-up">
    <h2 class="text-4xl font-bold text-title mb-12 text-center">
        Frequently Asked Questions
    </h2>

    @if($package->faqs->count() > 0)
    <div class="space-y-4" x-data="faqAccordion()">
        @foreach($package->faqs as $index => $faq)
        <div x-data="{ open: false }">
            <div class="border-b bg-white rounded-xl shadow-md border-none px-6">
                <h3 class="flex">
                    <button
                        type="button"
                        @click="open = !open"
                        class="flex flex-1 items-center justify-between transition-all text-left font-bold text-title hover:text-orange-primary py-5 focus:outline-none w-full">
                        {{ $faq->question }}
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-chevron-down h-4 w-4 shrink-0 transition-transform duration-200"
                            :class="{ 'rotate-180': open }">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                </h3>
                <div
                    x-show="open"
                    x-transition
                    class="overflow-hidden text-sm transition-all pb-5">
                    <div class="prose prose-sm max-w-none text-body-text leading-relaxed">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="text-center py-12 bg-gray-50 rounded-xl">
        <p class="text-body-text">No FAQs available for this package.</p>
    </div>
    @endif
</section>


<!-- faq section end  -->


<!-- form section end  -->
<section class="py-16 px-4 md:px-8 max-w-7xl mx-auto" data-aos="fade-up">
    <div class="max-w-5xl mx-auto bg-gradient-to-br from-white to-orange-primary/5 rounded-2xl shadow-xl p-6 md:p-8 border border-orange-primary/10">
        <h2 class="text-2xl md:text-3xl font-bold text-title mb-6">
            Book Your Tour
        </h2>

        <form @submit.prevent="submitBooking()" class="grid md:grid-cols-2 gap-x-8 gap-y-4"
            x-data="bookingForm({
                packageId: {{ $package->id }},
                packageTitle: @js($package->title),
                basePrice: {{ $package->price_start }},
                submitUrl: '{{ route('booking.mail') }}'
            })"
            x-init="updateTotal()">
            <div class="space-y-4">
                <!-- Full Name -->
                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-title" for="name">Full Name</label>
                    <input
                        x-model="form.name"
                        type="text"
                        id="name"
                        placeholder="Enter your name"
                        class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-primary focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm h-10" />
                    <template x-if="errors.name">
                        <p class="text-xs text-red-500" x-text="errors.name"></p>
                    </template>
                </div>

                <!-- Email -->
                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-title" for="email">Email Address</label>
                    <input
                        x-model="form.email"
                        type="email"
                        id="email"
                        placeholder="Enter your email"
                        class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-primary focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm h-10" />
                    <template x-if="errors.email">
                        <p class="text-xs text-red-500" x-text="errors.email"></p>
                    </template>
                </div>

                <!-- Phone -->
                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-title" for="phone">Phone Number</label>
                    <input
                        x-model="form.phone"
                        type="tel"
                        id="phone"
                        placeholder="Enter your phone"
                        class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-primary focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm h-10" />
                    <template x-if="errors.phone">
                        <p class="text-xs text-red-500" x-text="errors.phone"></p>
                    </template>
                </div>

                <!-- Date & Travelers -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Start Date -->
                    <div class="space-y-1.5">
                        <label class="text-sm font-medium text-title">Start Date</label>
                        <input
                            x-model="form.start_date"
                            type="date"
                            class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-primary focus-visible:ring-offset-2 md:text-sm h-10" />
                        <template x-if="errors.start_date">
                            <p class="text-xs text-red-500" x-text="errors.start_date"></p>
                        </template>
                    </div>

                    <!-- Travelers -->
                    <div class="space-y-1.5">
                        <label class="text-sm font-medium text-title" for="travelers">Travelers</label>
                        <input
                            x-model.number="form.travelers"
                            @input="updateTotal()"
                            type="number"
                            id="travelers"
                            min="1"
                            value="1"
                            class="flex w-full rounded-md border border-input bg-background px-3 py-2 text-base ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-primary focus-visible:ring-offset-2 md:text-sm h-10" />
                        <template x-if="errors.travelers">
                            <p class="text-xs text-red-500" x-text="errors.travelers"></p>
                        </template>
                    </div>
                </div>

                <!-- Special Requirements -->
                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-title" for="requirements">Special Requirements</label>
                    <textarea
                        x-model="form.requirements"
                        id="requirements"
                        placeholder="Any special requests..."
                        rows="3"
                        class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-primary focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 resize-none h-20"></textarea>
                </div>
            </div>

            <!-- Price Summary & Submit -->
            <div class="flex flex-col">
                <div class="bg-gradient-to-br from-orange-primary/10 to-orange-primary/5 rounded-xl p-6 border-2 border-orange-primary/20 h-full flex flex-col">
                    <h3 class="text-lg font-bold text-title mb-4 flex items-center gap-2">
                        <span>💰</span>
                        Price Summary
                    </h3>

                    <div class="space-y-3 flex-1">
                        <!-- Base Price -->
                        <div class="flex justify-between items-center pb-3 border-b border-orange-primary/10">
                            <span class="text-sm text-body-text">Base Price</span>
                            <span class="text-base font-semibold text-title">₹{{ number_format($package->price_start) }}</span>
                        </div>

                        <!-- Travelers -->
                        <div class="flex justify-between items-center pb-3 border-b border-orange-primary/10">
                            <span class="text-sm text-body-text">Travelers</span>
                            <span class="text-base font-semibold text-title">× <span x-text="form.travelers"></span></span>
                        </div>

                        <!-- Total Price -->
                        <div class="bg-orange-primary/10 rounded-lg p-4 mt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-base font-bold text-title">Total Price</span>
                                <span class="text-2xl font-bold text-orange-primary">₹<span x-text="totalPrice.toLocaleString('en-IN')"></span></span>
                            </div>
                            <p class="text-xs text-body-text mt-1">
                                per person rate applied
                            </p>
                        </div>

                        <!-- Cancellation Notice -->
                        <div class="bg-yellow-accent/10 rounded-lg p-3 mt-4">
                            <p class="text-xs text-title font-medium">
                                ✨ Free cancellation up to 7 days before departure
                            </p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        :disabled="isSubmitting"
                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 w-full bg-orange-primary hover:bg-orange-primary/90 text-white rounded-xl py-5 text-base font-semibold mt-6 shadow-lg hover:shadow-xl transition-all">
                        <span x-show="!isSubmitting">Confirm Booking</span>
                        <span x-show="isSubmitting" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
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
    console.log('Booking form script loading...');
    
    // Ensure Alpine is available
    if (typeof Alpine === 'undefined') {
        console.error('Alpine.js is not loaded!');
    } else {
        console.log('Alpine.js is available, registering bookingForm component');
    }
    
    // Booking form Alpine.js component
    document.addEventListener('alpine:init', () => {
        console.log('Alpine initialized, registering bookingForm');
        
        Alpine.data('bookingForm', (packageData) => {
            console.log('bookingForm component created with data:', packageData);
            
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
                    console.log('bookingForm init() called');
                    this.updateTotal();
                },

                updateTotal() {
                    console.log('Updating total...', {
                        basePrice: this.basePrice,
                        travelers: this.form.travelers,
                        calculation: this.basePrice * this.form.travelers
                    });
                    this.totalPrice = this.basePrice * this.form.travelers;
                    this.form.total_price = this.totalPrice;
                    console.log('New total:', this.totalPrice);
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
    
    console.log('Booking form script loaded successfully');
</script>
@endpush

<!-- formsection end  -->

@endsection