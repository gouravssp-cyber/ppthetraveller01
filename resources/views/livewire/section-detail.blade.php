<div>
<style>
    /* Smooth transitions for all elements */
    * {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Prevent transition on certain properties for better performance */
    .no-transition {
        transition: none !important;
    }

    /* Book Now button specific styling */
    .book-now-btn {
        position: relative;
        overflow: hidden;
        background-color: hsl(27 98% 48%);
        color: white;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .book-now-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background-color: hsl(27 98% 38%);
        transition: left 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        z-index: -1;
    }

    .book-now-btn:hover::before {
        left: 0;
    }

    .book-now-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(255, 107, 53, 0.35);
        letter-spacing: 1px;
    }

    .book-now-btn:active {
        transform: translateY(0);
    }

    /* Icon animation */
    .icon-animate {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .group:hover .icon-animate {
        color: hsl(40 96% 61%) !important;
        transform: scale(1.1);
    }

    /* Smooth card transitions */
    .card-smooth {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Category icon container animation */
    .categories-container {
        animation: slideInUp 0.5s ease-out forwards;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Smooth overlay transitions */
    .overlay-smooth {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Button ripple effect */
    .ripple {
        position: relative;
        overflow: hidden;
    }

    .ripple::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .ripple:active::after {
        width: 300px;
        height: 300px;
    }

    /* Smooth text transitions */
    .text-smooth {
        transition: color 0.3s ease, text-shadow 0.3s ease;
    }

    /* Icon stagger animation */
    .icon-stagger {
        display: inline-block;
        transition: all 0.3s ease;
    }

    .icon-stagger:nth-child(1) { transition-delay: 0.1s; }
    .icon-stagger:nth-child(2) { transition-delay: 0.15s; }
    .icon-stagger:nth-child(3) { transition-delay: 0.2s; }
    .icon-stagger:nth-child(4) { transition-delay: 0.25s; }

    .group:hover .icon-stagger {
        animation: bounce 0.6s ease;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
</style>

    @if($section)
        <!-- Hero Section -->
        <section class="relative w-full min-h-[50vh] flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                style="background-image: url('{{ isset($section->banner_image) && $section->banner_image ? ($section->full_banner_image_url ?? asset('storage/' . $section->banner_image)) : asset('images/hero-bg.jpg') }}');">
                <div class="absolute inset-0" style="background: linear-gradient(135deg, hsla(27,98%,48%,0.40) 0%, hsla(0,0%,0%,0.60) 50%, hsla(0,0%,0%,0.80) 100%)"></div>
            </div>
            <div class="relative z-10 text-center w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 md:py-24">
                <div class="mb-4 flex justify-center">
                    @if(isset($section->section_icon) && $section->section_icon)
                        <span class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md border border-white/30 text-white px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="{{ $section->section_icon }}"></i>
                            {!! $section->title ?? $section->name !!}
                        </span>
                    @else
                        <span class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md border border-white/30 text-white px-4 py-2 rounded-full text-sm font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            {{ isset($section->section_label) ? $section->section_label : 'Destination' }}
                        </span>
                    @endif
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    <span class="text-white block mb-2">{{ $section->title ?? $section->name }}</span>
                </h1>
                @if($section->description)
                    <div class="text-lg md:text-xl text-white/90 mb-8 font-light max-w-3xl mx-auto leading-relaxed">
                        {!! str_replace(['<p>', '<h2>'], ['<p class="text-lg md:text-xl text-white/90 mb-8 font-light max-w-3xl mx-auto leading-relaxed">', '<h2 class="text-2xl font-bold mb-4 text-white/90">'], $section->description) !!}                        
                    </div>
                @endif
            </div>
        </section>

        <!-- Packages Grid -->
        @if($section->packages->count() > 0)
            <section class="py-16 px-4 md:px-8 bg-gray-50">
                <div class="max-w-7xl mx-auto">
                    <div class="text-center mb-10">
                        <h2 class="text-3xl md:text-4xl font-bold text-title mb-3">
                            All {{ $section->title }} Packages
                        </h2>
                        <p class="text-body-text text-lg">
                            {{ $section->packages->count() }} {{ Str::plural('package', $section->packages->count()) }} available
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($section->packages as $package)
                            <div class="group relative h-[500px] rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl card-smooth">
                                <!-- Background Image with Zoom Effect -->
                                <div class="absolute inset-0 bg-cover bg-center card-smooth group-hover:scale-110"
                                     style="background-image: url('{{ asset('storage/' . ($package->banner_image ?? '')) }}');">
                                    @if(!$package->banner_image)
                                        <div class="w-full h-full flex items-center justify-center" style="background: linear-gradient(135deg, hsl(27 98% 48% / 0.2), hsl(40 96% 61% / 0.2))">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: hsl(27 98% 48% / 0.5)">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                        </div>
                                    @endif
                                </div>

                                <!-- Base Gradient Overlay (Always visible) -->
                                <div class="absolute inset-0 overlay-smooth" style="background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.4) 40%, rgba(0,0,0,0.1) 100%)"></div>

                                <!-- Enhanced Hover Overlay (Appears on hover) -->
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 overlay-smooth" style="background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.85) 60%, rgba(0,0,0,0.6) 100%)"></div>

                                <!-- Default State - Title & Duration -->
                                <div class="absolute inset-0 flex items-end p-6 opacity-100 group-hover:opacity-0 card-smooth">
                                    <div class="w-full">
                                        <h3 class="text-3xl font-bold text-white drop-shadow-lg mb-2 line-clamp-2">
                                            {{ $package->title }}
                                        </h3>
                                        <div class="flex items-center justify-between gap-2 w-full mb-4">
                                            <p class="text-sm" style="color: rgba(255,255,255,0.8)">{{ $package->duration_days }} Days / {{ $package->duration_nights }} Nights</p>
                                            <span class="text-xl font-bold" style="color: hsl(40 96% 61%)">₹ {{ $package->price_start }}</span>
                                        </div>
                                        <div class="transform translate-y-4 group-hover:translate-y-0 card-smooth delay-300">
                                            <a href="/{{ $package->slug }}" class="inline-block w-full no-transition">
                                                <button class="w-full text-white px-5 py-3 rounded-xl font-semibold text-sm shadow-lg hover:shadow-2xl transform hover:scale-105 book-now-btn ripple">
                                                    Book Now
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Hover State - Full Information -->
                                <div class="absolute inset-0 opacity-0 group-hover:opacity-100 card-smooth pointer-events-none group-hover:pointer-events-auto">
                                    <div class="absolute inset-0 flex flex-col p-6 overflow-hidden">

                                        <!-- Scrollable Content Area -->
                                        <div class="flex-1 overflow-y-auto overflow-x-hidden pr-2 space-y-4" style="scrollbar-width: thin; scrollbar-color: hsl(27 98% 48%) transparent;">
                                            
                                            <!-- Title -->
                                            <h3 class="text-2xl font-bold text-white transform translate-y-2 group-hover:translate-y-0 card-smooth delay-75">
                                                {{ $package->title }}
                                            </h3>

                                            <!-- Description -->
                                            <p class="text-sm leading-relaxed transform translate-y-2 group-hover:translate-y-0 card-smooth delay-100" style="color: rgba(255,255,255,0.9)">
                                                {!! Str::limit(strip_tags($package->full_description ?? ''), 150) !!}
                                            </p>

                                            <!-- Duration and Price -->
                                            <div class="flex items-center gap-4 flex-wrap pt-1 transform translate-y-2 group-hover:translate-y-0 card-smooth delay-150">
                                                <div class="flex items-center gap-2" style="color: rgba(255,255,255,0.9)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polyline points="12 6 12 12 16 14"></polyline>
                                                    </svg>
                                                    <span class="text-sm">{{ $package->duration_days }} Days / {{ $package->duration_nights }} Nights</span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-xl font-bold" style="color: hsl(40 96% 61%)">₹{{ number_format($package->price_start) }}</span>
                                                </div>
                                            </div>

                                            <!-- Highlights -->
                                            @if($package->highlights && count($package->highlights) > 0)
                                                <ul class="space-y-2 pt-2">
                                                    @foreach(array_slice($package->highlights, 0, 3) as $index => $highlight)
                                                        <li class="text-xs flex items-start gap-2 transform translate-x-[-10px] group-hover:translate-x-0 card-smooth" style="color: rgba(255,255,255,0.8); transition-delay: {{ 200 + ($index * 50) }}ms">
                                                            <span class="mt-0.5 icon-animate" style="color: hsl(40 96% 61%)">✓</span>
                                                            <span class="flex-1">{{ $highlight }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif

                                            <!-- CATEGORY ICONS SECTION -->
                                            <div class="pt-3 border-t border-white/20 categories-container">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <!-- Meals -->
                                                    <div class="flex items-center gap-3 text-sm transform translate-y-2 group-hover:translate-y-0 transition-all duration-300" style="color: rgba(255,255,255,0.9);">
                                                        <i class="fas fa-utensils icon-animate text-[22px]" style="color: hsl(40 96% 61%); min-width: 26px; text-align: center; filter: drop-shadow(0 0 4px rgba(255, 193, 7, 0.3));"></i>
                                                        <span class="font-semibold tracking-wide">Meals</span>
                                                    </div>

                                                    <!-- Transport -->
                                                    <div class="flex items-center gap-3 text-sm transform translate-y-2 group-hover:translate-y-0 transition-all duration-300" style="color: rgba(255,255,255,0.9);">
                                                        <i class="fas fa-bus icon-animate text-[22px]" style="color: hsl(40 96% 61%); min-width: 26px; text-align: center; filter: drop-shadow(0 0 4px rgba(255, 193, 7, 0.3));"></i>
                                                        <span class="font-semibold tracking-wide">Transport</span>
                                                    </div>

                                                    <!-- Hotel -->
                                                    <div class="flex items-center gap-3 text-sm transform translate-y-2 group-hover:translate-y-0 transition-all duration-300" style="color: rgba(255,255,255,0.9);">
                                                        <i class="fas fa-hotel icon-animate text-[22px]" style="color: hsl(40 96% 61%); min-width: 26px; text-align: center; filter: drop-shadow(0 0 4px rgba(255, 193, 7, 0.3));"></i>
                                                        <span class="font-semibold tracking-wide">Hotel</span>
                                                    </div>

                                                    <!-- Sightseeing -->
                                                    <div class="flex items-center gap-3 text-sm transform translate-y-2 group-hover:translate-y-0 transition-all duration-300" style="color: rgba(255,255,255,0.9);">
                                                        <i class="fas fa-binoculars icon-animate text-[22px]" style="color: hsl(40 96% 61%); min-width: 26px; text-align: center; filter: drop-shadow(0 0 4px rgba(255, 193, 7, 0.3));"></i>
                                                        <span class="font-semibold tracking-wide">Sightseeing</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- CTA Button - Fixed at Bottom -->
                                        <div class="pt-4 mt-auto transform translate-y-4 group-hover:translate-y-0 card-smooth delay-300">
                                            <a href="/{{ $package->slug }}" class="inline-block w-full no-transition">
                                                <button class="w-full text-white px-6 py-3 rounded-xl font-semibold text-sm shadow-lg hover:shadow-2xl book-now-btn ripple">
                                                    Book Now
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <section class="py-16 px-4 md:px-8 bg-gray-50">
                <div class="max-w-7xl mx-auto text-center">
                    <div class="bg-white rounded-2xl p-12 shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4 text-orange-primary/50">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <h3 class="text-2xl font-bold text-title mb-2">No Packages Available</h3>
                        <p class="text-body-text">Packages will be added to this section soon!</p>
                    </div>
                </div>
            </section>
        @endif
    @endif
</div>

