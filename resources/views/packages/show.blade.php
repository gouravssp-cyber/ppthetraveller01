@extends('layouts.app')

@section('title', $package->meta_title ?? $package->title)
@section('meta_description', $package->meta_description ?? $package->summary)

@section('content')
    <!-- Hero Section with Image -->
    <div class="relative w-full h-[500px] overflow-hidden bg-muted">
        @if($package->banner_image)
            <img src="{{ asset('storage/' . $package->banner_image) }}"
                 alt="{{ $package->banner_image_alt }}"
                 class="w-full h-full object-cover">
        @endif
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/30"></div>

        <!-- Header Content -->
        <div class="absolute inset-0 flex flex-col justify-between p-6 md:p-12">
            <!-- Top Navigation Breadcrumb -->
            <div class="flex items-center gap-2 text-white text-sm">
                <a href="/" class="hover:text-accent transition">Home</a>
                <span class="opacity-60">/</span>
                <a href="#" class="hover:text-accent transition">{{ $package->destination->name }}</a>
                <span class="opacity-60">/</span>
                <span>{{ $package->title }}</span>
            </div>

            <!-- Bottom: Title & Quick Info -->
            <div>
                <div class="mb-4 flex gap-2 flex-wrap">
                    <span class="px-3 py-1 bg-primary text-primary-foreground text-xs font-bold rounded-full">
                        {{ $package->tourType->name }}
                    </span>
                    @if($package->featured)
                        <span class="px-3 py-1 bg-secondary text-secondary-foreground text-xs font-bold rounded-full">
                            ⭐ Featured
                        </span>
                    @endif
                </div>

                <h1 class="text-4xl md:text-5xl font-bold text-white mb-3">
                    {{ $package->title }}
                </h1>

                <p class="text-lg text-gray-100 flex items-center gap-2">
                    <span>📍</span>
                    {{ $package->destination->name }}
                </p>
            </div>
        </div>
    </div>

    <!-- Quick Stats Section (Below Hero) -->
    <div class="bg-card border-b border-border">
        <div class="container mx-auto px-4 md:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 py-8">
                <!-- Duration -->
                <div class="text-center">
                    <p class="text-muted-foreground text-xs font-semibold uppercase">Duration</p>
                    <p class="text-3xl font-bold text-title mt-2">{{ $package->duration_days }}</p>
                    <p class="text-xs text-muted-foreground mt-1">Days</p>
                </div>

                <!-- Nights -->
                <div class="text-center">
                    <p class="text-muted-foreground text-xs font-semibold uppercase">Nights</p>
                    <p class="text-3xl font-bold text-title mt-2">{{ $package->duration_nights }}</p>
                    <p class="text-xs text-muted-foreground mt-1">Nights</p>
                </div>

                <!-- Price -->
                <div class="text-center">
                    <p class="text-muted-foreground text-xs font-semibold uppercase">Price</p>
                    <p class="text-3xl font-bold text-primary mt-2">₹{{ number_format($package->price_start) }}</p>
                    @if($package->price_compare_at)
                        <p class="text-xs text-muted-foreground line-through mt-1">
                            ₹{{ number_format($package->price_compare_at) }}
                        </p>
                    @endif
                </div>

                <!-- Gallery Count -->
                @if($package->gallery->count() > 0)
                    <div class="text-center">
                        <p class="text-muted-foreground text-xs font-semibold uppercase">Gallery</p>
                        <p class="text-3xl font-bold text-title mt-2">{{ $package->gallery->count() }}</p>
                        <p class="text-xs text-muted-foreground mt-1">Photos</p>
                    </div>
                @endif

                <!-- Itinerary -->
                @if($package->itineraryDays->count() > 0)
                    <div class="text-center">
                        <p class="text-muted-foreground text-xs font-semibold uppercase">Days</p>
                        <p class="text-3xl font-bold text-title mt-2">{{ $package->itineraryDays->count() }}</p>
                        <p class="text-xs text-muted-foreground mt-1">Itinerary</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-background">
        <div class="container mx-auto px-4 md:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                
                <!-- Left Content (2 cols) -->
                <div class="lg:col-span-2 space-y-16">

                    <!-- Overview Section -->
                    @if($package->full_description)
                        <section>
                            <h2 class="text-3xl font-bold text-title mb-6">Overview</h2>
                            <div class="prose prose-lg max-w-none text-body leading-relaxed">
                                {!! $package->full_description !!}
                            </div>
                        </section>
                    @endif

                    <!-- Highlights -->
                    @if($package->highlights && count($package->highlights) > 0)
                        <section>
                            <h2 class="text-3xl font-bold text-title mb-8">Highlights</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach($package->highlights as $highlight)
                                    <div class="flex gap-4" data-aos="fade-up">
                                        <div class="text-2xl text-primary flex-shrink-0">✓</div>
                                        <div>
                                            <p class="text-body">{{ $highlight }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    <!-- Photo Gallery -->
                    @if($package->gallery->count() > 0)
                        <section>
                            <h2 class="text-3xl font-bold text-title mb-8">Photo Gallery</h2>
                            
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($package->gallery->take(5) as $index => $image)
                                    <button class="group relative overflow-hidden rounded-lg h-48 hover:shadow-lg transition cursor-pointer"
                                            @click="galleryOpen = true; currentImageIndex = {{ $index }}"
                                            data-aos="fade-up"
                                            data-aos-delay="{{ $index * 100 }}">
                                        <img src="{{ asset('storage/' . $image->image_url) }}"
                                             alt="{{ $image->alt_text }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition"></div>
                                    </button>
                                @endforeach

                                <!-- +More Button -->
                                @if($package->gallery->count() > 5)
                                    <button class="relative overflow-hidden rounded-lg h-48 bg-muted hover:bg-primary/20 transition flex items-center justify-center cursor-pointer"
                                            @click="galleryOpen = true; currentImageIndex = 5"
                                            data-aos="fade-up"
                                            data-aos-delay="500">
                                        <div class="text-center">
                                            <p class="text-4xl font-bold text-primary mb-2">
                                                +{{ $package->gallery->count() - 5 }}
                                            </p>
                                            <p class="text-body font-semibold text-sm">More</p>
                                        </div>
                                    </button>
                                @endif
                            </div>
                        </section>
                    @endif

                    <!-- Detailed Itinerary -->
                    @if($package->itineraryDays->count() > 0)
                        <section>
                            <h2 class="text-3xl font-bold text-title mb-8">Detailed Itinerary</h2>
                            
                            <div class="space-y-6">
                                @foreach($package->itineraryDays as $index => $day)
                                    <div class="bg-card rounded-lg overflow-hidden border border-border hover:border-primary/30 transition"
                                         data-aos="fade-up"
                                         data-aos-delay="{{ $index * 100 }}">
                                        
                                        <!-- Day Header -->
                                        <div class="bg-muted px-6 py-4 border-b border-border flex justify-between items-center">
                                            <div>
                                                <h3 class="text-2xl font-bold text-primary">Day {{ $day->day_number }}</h3>
                                                <p class="text-body font-semibold mt-1">{{ $day->day_title }}</p>
                                            </div>
                                            @if($day->feature_image)
                                                <img src="{{ asset('storage/' . $day->feature_image) }}"
                                                     alt="{{ $day->feature_image_alt }}"
                                                     class="w-20 h-20 rounded object-cover">
                                            @endif
                                        </div>

                                        <!-- Day Content -->
                                        <div class="p-6 space-y-4">
                                            <div class="prose prose-sm max-w-none text-body">
                                                {!! $day->day_description !!}
                                            </div>

                                            <!-- Places Visited -->
                                            @if($day->places->count() > 0)
                                                <div class="pt-4 border-t border-border mt-4">
                                                    <p class="text-xs font-bold text-muted-foreground uppercase mb-3">Places Visited</p>
                                                    <div class="space-y-2">
                                                        @foreach($day->places as $place)
                                                            <div class="flex gap-3 text-sm">
                                                                <span class="text-primary flex-shrink-0">📍</span>
                                                                <div>
                                                                    <p class="font-semibold text-title">{{ $place->place_name }}</p>
                                                                    @if($place->place_description)
                                                                        <p class="text-body text-xs">{{ $place->place_description }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                    @endif

                    <!-- FAQ Accordion -->
                    @if($package->faqs->count() > 0)
                        <section>
                            <h2 class="text-3xl font-bold text-title mb-8">What's Included</h2>
                            
                            <div class="space-y-4">
                                @foreach($package->faqs as $index => $faq)
                                    <details class="group bg-card rounded-lg border border-border hover:border-primary/30 transition cursor-pointer"
                                             wire:key="faq-{{ $index }}">
                                        
                                        <summary class="flex items-center justify-between p-6 font-semibold text-title select-none hover:text-primary transition">
                                            <span class="text-lg">{{ $faq->question }}</span>
                                            <span class="text-xl transition transform group-open:rotate-180">▼</span>
                                        </summary>

                                        <div class="px-6 pb-6 text-body border-t border-border pt-6">
                                            {!! $faq->answer !!}
                                        </div>
                                    </details>
                                @endforeach
                            </div>
                        </section>
                    @endif

                </div>

                <!-- Right Sidebar (1 col) -->
                <aside class="lg:col-span-1">
                    <!-- Sticky Booking Card -->
                    <div class="bg-card rounded-lg border border-border p-8 sticky top-20 space-y-6" data-aos="fade-left">
                        
                        <!-- Price Display -->
                        <div class="text-center border-b border-border pb-6">
                            <p class="text-xs font-bold text-muted-foreground uppercase mb-3">Starting Price</p>
                            <div class="text-4xl font-bold text-primary">
                                ₹{{ number_format($package->price_start) }}
                            </div>
                            @if($package->price_compare_at)
                                <p class="text-muted-foreground line-through mt-2 text-sm">
                                    ₹{{ number_format($package->price_compare_at) }}
                                </p>
                                <p class="text-primary text-sm font-bold mt-2">
                                    Save {{ $package->discount_percentage }}%
                                </p>
                            @endif
                        </div>

                        <!-- CTA Buttons -->
                        <div class="space-y-3">
                            <button class="w-full bg-primary text-primary-foreground font-bold py-4 rounded-lg hover:opacity-90 transition shadow-lg hover:shadow-xl">
                                Book Now
                            </button>
                            <button class="w-full border-2 border-primary text-primary font-bold py-4 rounded-lg hover:bg-primary/5 transition">
                                Contact Us
                            </button>
                        </div>

                        <!-- Trust Badges -->
                        <div class="space-y-3 pt-6 border-t border-border">
                            <div class="flex items-center gap-3 text-body text-sm">
                                <span class="text-xl text-primary">✓</span>
                                <span>Best Price Guarantee</span>
                            </div>
                            <div class="flex items-center gap-3 text-body text-sm">
                                <span class="text-xl text-primary">✓</span>
                                <span>24/7 Customer Support</span>
                            </div>
                            <div class="flex items-center gap-3 text-body text-sm">
                                <span class="text-xl text-primary">✓</span>
                                <span>Free Cancellation</span>
                            </div>
                            <div class="flex items-center gap-3 text-body text-sm">
                                <span class="text-xl text-primary">✓</span>
                                <span>Secure Payment</span>
                            </div>
                        </div>

                        <!-- Share Section -->
                        <div class="pt-6 border-t border-border">
                            <p class="text-sm font-bold text-title mb-4">Share Package</p>
                            <div class="flex gap-2">
                                <button class="flex-1 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-sm font-semibold">
                                    FB
                                </button>
                                <button class="flex-1 py-2 bg-sky-500 text-white rounded hover:bg-sky-600 transition text-sm font-semibold">
                                    X
                                </button>
                                <button class="flex-1 py-2 bg-pink-600 text-white rounded hover:bg-pink-700 transition text-sm font-semibold">
                                    IG
                                </button>
                            </div>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </div>

@endsection
