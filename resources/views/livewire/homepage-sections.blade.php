<div>
    @foreach($sections as $section)
        <section class="py-16 px-4 md:px-8 {{ $loop->index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="mb-12">
                    <div class="mb-4 flex items-center gap-2">
                        @if($section->section_icon)
                            <i class="{{ $section->section_icon }} text-orange-primary"></i>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles text-orange-primary">
                                <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                            </svg>
                        @endif
                        <span class="text-sm font-semibold text-orange-primary">{{ $section->section_label ?? 'Featured' }}</span>
                    </div>

                    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6">
                        <div class="flex-1">
                            <h2 class="text-3xl md:text-4xl font-bold text-title mb-2">
                                {!! $section->title !!}
                            </h2>
                            @if($section->description)
                                <p class="text-body-text text-base md:text-lg max-w-2xl">
                                    {!! $section->description !!}
                                </p>
                            @endif
                        </div>

                        <div class="hidden md:flex items-center gap-3">
                            <a href="/section/{{ $section->slug }}" class="text-orange-primary hover:text-orange-primary/80 font-semibold flex items-center gap-2 transition-colors">
                                View All
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Packages Carousel -->
                @if($section->packages->count() > 0)
                    <div class="relative">
                        <div class="swiper section-carousel-{{ $section->id }}" data-swiper-id="{{ $section->id }}">
                            <div class="swiper-wrapper">
                                @foreach($section->packages as $package)
                                    <div class="swiper-slide">
                                        <div class="group relative h-[500px] rounded-2xl overflow-hidden cursor-pointer shadow-md hover:shadow-2xl transition-all duration-300">
                                            
                                            <!-- Background Image with Zoom Effect -->
                                            <div class="absolute inset-0 bg-cover bg-center"
                                                 style="background-image: url('{{ asset('storage/' . ($package->banner_image ?? '')) }}');"
                                                 x-data="{ hovered: false }"
                                                 :style="{ 'transform': hovered ? 'scale(1.05)' : 'scale(1)', 'transition': 'transform 0.4s ease-in-out' }">
                                                @if(!$package->banner_image)
                                                    <div class="w-full h-full bg-gradient-to-br from-orange-primary/20 to-yellow-accent/20 flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-primary/50">
                                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0"></path>
                                                            <circle cx="12" cy="10" r="3"></circle>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Gradient Overlay - Always Present -->
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>

                                            <!-- Default State - Title & Duration -->
                                            <div class="absolute inset-0 flex items-end p-6 group-hover:opacity-0 transition-opacity duration-300">
                                                <div>
                                                    <h3 class="text-3xl font-bold text-white drop-shadow-lg mb-2 line-clamp-2">
                                                        {{ $package->title }}
                                                    </h3>
                                                    <p class="text-white/80 text-sm">{{ $package->duration_days }} Days</p>
                                                </div>
                                            </div>

                                            <!-- Hover State - Full Information -->
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/80 to-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none group-hover:pointer-events-auto">
                                                <div class="absolute inset-0 flex flex-col p-6 overflow-hidden"
                                                     x-data="{ hovered: false }"
                                                     @mouseenter="hovered = true"
                                                     @mouseleave="hovered = false">
                                                    
                                                    <!-- Scrollable Content Area -->
                                                    <div class="flex-1 overflow-y-auto overflow-x-hidden pr-2 space-y-3" style="scrollbar-width: thin;">
                                                        <!-- Title -->
                                                        <h3 class="text-2xl font-bold text-white" 
                                                            :style="{ 'opacity': hovered ? 1 : 0, 'transition': 'opacity 0.3s ease-out' }">
                                                            {{ $package->title }}
                                                        </h3>

                                                        <!-- Description -->
                                                        <p class="text-white/90 text-sm leading-relaxed"
                                                           :style="{ 'opacity': hovered ? 1 : 0, 'transition': 'opacity 0.3s ease-out 0.1s' }">
                                                            {!! Str::limit(strip_tags($package->full_description ?? ''), 150) !!}
                                                        </p>

                                                        <!-- Duration and Price -->
                                                        <div class="flex items-center gap-4 flex-wrap pt-1"
                                                             :style="{ 'opacity': hovered ? 1 : 0, 'transition': 'opacity 0.3s ease-out 0.15s' }">
                                                            <div class="flex items-center gap-2 text-white/90">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock">
                                                                    <circle cx="12" cy="12" r="10"></circle>
                                                                    <polyline points="12 6 12 12 16 14"></polyline>
                                                                </svg>
                                                                <span class="text-sm">{{ $package->duration_days }} Days</span>
                                                            </div>
                                                            <div class="flex items-center gap-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dollar-sign text-yellow-accent">
                                                                    <line x1="12" x2="12" y1="2" y2="22"></line>
                                                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                                                </svg>
                                                                <span class="text-xl font-bold text-yellow-accent">{{ number_format($package->price_start) }}</span>
                                                            </div>
                                                        </div>

                                                        <!-- Highlights -->
                                                        @if($package->highlights && count($package->highlights) > 0)
                                                            <ul class="space-y-1.5 pt-2">
                                                                @foreach(array_slice($package->highlights, 0, 3) as $index => $highlight)
                                                                    <li class="text-white/80 text-xs flex items-start gap-2"
                                                                        :style="{ 
                                                                            'opacity': hovered ? 1 : 0,
                                                                            'transform': hovered ? 'translateX(0)' : 'translateX(-10px)',
                                                                            'transition': 'all 0.3s ease-out {{ ($index * 50) . 'ms' }}'
                                                                        }">
                                                                        <span class="text-yellow-accent mt-0.5">✓</span>
                                                                        <span class="flex-1">{{ $highlight }}</span>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>

                                                    <!-- CTA Button - Fixed at Bottom -->
                                                    <div class="pt-4 mt-auto"
                                                         :style="{ 'opacity': hovered ? 1 : 0, 'transition': 'opacity 0.3s ease-out 0.4s' }">
                                                        <a href="/{{ $package->slug }}" class="inline-block w-full">
                                                            <button class="w-full bg-orange-primary hover:bg-orange-primary/90 text-white px-5 py-2.5 rounded-xl font-semibold text-sm shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 ease-out">
                                                                View Details
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Navigation Arrows -->
                            <div class="swiper-button-prev section-carousel-prev-{{ $section->id }} !text-orange-primary !left-0 !w-10 !h-10 !bg-white/90 hover:!bg-orange-primary hover:!text-white rounded-full transition-all duration-300 !after:text-2xl"></div>
                            <div class="swiper-button-next section-carousel-next-{{ $section->id }} !text-orange-primary !right-0 !w-10 !h-10 !bg-white/90 hover:!bg-orange-primary hover:!text-white rounded-full transition-all duration-300 !after:text-2xl"></div>

                            <!-- Pagination -->
                            <div class="swiper-pagination section-carousel-pagination-{{ $section->id }} !bottom-0 mt-4"></div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-12 bg-gray-50 rounded-xl">
                        <p class="text-body-text">No packages available in this section yet.</p>
                    </div>
                @endif

                <!-- Mobile View All Link -->
                <div class="md:hidden text-center mt-6">
                    <a href="/section/{{ $section->slug }}" class="text-orange-primary hover:text-orange-primary/80 font-semibold inline-flex items-center justify-center gap-2 transition-colors">
                        View All {{ $section->title }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    @endforeach
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach($sections as $section)
            @if($section->packages->count() > 0)
                new Swiper('.section-carousel-{{ $section->id }}', {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: {{ $section->packages->count() > 3 ? 'true' : 'false' }},
                    navigation: {
                        nextEl: '.section-carousel-next-{{ $section->id }}',
                        prevEl: '.section-carousel-prev-{{ $section->id }}',
                    },
                    pagination: {
                        el: '.section-carousel-pagination-{{ $section->id }}',
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
    });
</script>
@endpush