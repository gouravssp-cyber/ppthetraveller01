<div>
    @foreach($sections as $section)
        <section class="py-16 px-4 md:px-8 {{ $loop->index % 2 === 0 ? 'bg-white' : 'bg-gray-50' }}" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <div class="max-w-7xl mx-auto">
                <!-- Section Header -->
                <div class="flex items-center justify-between mb-10">
                    <div class="flex-1">
                        @if($section->section_icon)
                            <div class="inline-flex items-center gap-2 bg-orange-primary/10 text-orange-primary px-4 py-2 rounded-full text-sm font-semibold mb-4">
                                <i class="{{ $section->section_icon }}"></i>
                                {!! $section->title !!}
                            </div>
                        @else
                            <div class="inline-flex items-center gap-2 bg-orange-primary/10 text-orange-primary px-4 py-2 rounded-full text-sm font-semibold mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles">
                                    <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                                    <path d="M20 3v4"></path>
                                    <path d="M22 5h-4"></path>
                                    <path d="M4 17v2"></path>
                                    <path d="M5 18H3"></path>
                                </svg>
                                Featured
                            </div>
                        @endif
                        <h2 class="text-3xl md:text-4xl font-bold text-title mb-3">
                            {!! $section->title !!}
                        </h2>
                        @if($section->description)
                            <p class="text-body-text text-lg max-w-3xl">
                                {!! $section->description !!}
                            </p>
                        @endif
                    </div>
                    <div class="hidden md:flex items-center gap-2">
                        <a href="/section/{{ $section->slug }}" class="text-orange-primary hover:text-orange-primary/80 font-semibold flex items-center gap-2 transition-colors">
                            View All
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Packages Carousel -->
                @if($section->packages->count() > 0)
                    <div class="relative">
                        <div class="swiper section-carousel-{{ $section->id }}" data-swiper-id="{{ $section->id }}">
                            <div class="swiper-wrapper">
                                @foreach($section->packages as $package)
                                    <div class="swiper-slide">
                                        <div class="group relative h-full">
                                            <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 ease-out border border-gray-100 hover:border-orange-primary/40 h-full transform hover:-translate-y-2">
                                                <!-- Package Image with Enhanced Hover Effect -->
                                                <div class="relative h-64 overflow-hidden bg-gradient-to-br from-gray-100 to-gray-50">
                                                    @if($package->banner_image)
                                                        <img src="{{ asset('storage/' . $package->banner_image) }}" 
                                                             alt="{{ $package->banner_image_alt ?? $package->title }}"
                                                             class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700 ease-out">
                                                    @else
                                                        <div class="w-full h-full bg-gradient-to-br from-orange-primary/20 to-yellow-accent/20 flex items-center justify-center group-hover:from-orange-primary/30 group-hover:to-yellow-accent/30 transition-all duration-500">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-primary/50 group-hover:text-orange-primary/70 transition-colors duration-500">
                                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0"></path>
                                                                <circle cx="12" cy="10" r="3"></circle>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                    
                                                    <!-- Gradient Overlay (Always Visible) -->
                                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-500"></div>
                                                    
                                                    <!-- Enhanced Hover Overlay with Summary Preview -->
                                                    <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/80 to-black/40 opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out flex flex-col justify-end p-6">
                                                        <!-- Summary Preview -->
                                                        <div class="transform translate-y-4 group-hover:translate-y-0 transition-all duration-500 delay-75">
                                                            <div class="mb-4">
                                                                <p class="text-white text-sm leading-relaxed mb-3 line-clamp-3 font-medium">
                                                                    {!! Str::limit(strip_tags($package->summary ?? $package->full_description ?? 'Explore this amazing destination with unforgettable experiences and breathtaking views.', 150), 150) !!}
                                                                </p>
                                                                <div class="flex items-center gap-4 text-xs text-white/90 mb-4">
                                                                    <span class="flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-2 py-1 rounded-md">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar">
                                                                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                                                        </svg>
                                                                        {{ $package->duration_days }} Days
                                                                    </span>
                                                                    <span class="flex items-center gap-1.5 bg-white/10 backdrop-blur-sm px-2 py-1 rounded-md">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                                                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                                                            <circle cx="12" cy="10" r="3"></circle>
                                                                        </svg>
                                                                        {{ $package->destination->name }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Show More Button -->
                                                            <a href="/{{ $package->slug }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-primary to-yellow-accent hover:from-orange-primary/90 hover:to-yellow-accent/90 text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 ease-out group/btn">
                                                                <span>Show More</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right transform group-hover/btn:translate-x-1 transition-transform duration-300">
                                                                    <path d="M5 12h14"></path>
                                                                    <path d="m12 5 7 7-7 7"></path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <!-- Badges with Enhanced Styling -->
                                                    <div class="absolute top-4 left-4 transform group-hover:scale-110 transition-transform duration-300">
                                                        <span class="bg-gradient-to-r from-orange-primary to-orange-primary/90 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg backdrop-blur-sm border border-white/20">
                                                            {{ $package->tourType->name ?? 'Tour' }}
                                                        </span>
                                                    </div>
                                                    @if($package->price_compare_at && $package->price_start < $package->price_compare_at)
                                                        <div class="absolute top-4 right-4 transform group-hover:scale-110 transition-transform duration-300">
                                                            <span class="bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1.5 rounded-full text-xs font-semibold shadow-lg backdrop-blur-sm border border-white/20 animate-pulse">
                                                                {{ round((($package->price_compare_at - $package->price_start) / $package->price_compare_at) * 100) }}% OFF
                                                            </span>
                                                        </div>
                                                    @endif
                                                    
                                                    <!-- Shine Effect on Hover -->
                                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-in-out"></div>
                                                </div>

                                                <!-- Package Content with Enhanced Styling -->
                                                <div class="p-6 bg-white relative overflow-hidden">
                                                    <!-- Content Background Gradient on Hover -->
                                                    <div class="absolute inset-0 bg-gradient-to-br from-orange-primary/5 via-transparent to-yellow-accent/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                                    
                                                    <div class="relative z-10">
                                                        <h3 class="text-xl font-bold text-title mb-3 group-hover:text-orange-primary transition-all duration-300 line-clamp-2 leading-tight">
                                                            {{ $package->title }}
                                                        </h3>
                                                        
                                                        <div class="flex items-center gap-4 text-sm text-body-text mb-5">
                                                            <div class="flex items-center gap-1.5 group-hover:text-orange-primary transition-colors duration-300">
                                                                <div class="w-8 h-8 rounded-lg bg-orange-primary/10 group-hover:bg-orange-primary/20 flex items-center justify-center transition-colors duration-300">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar text-orange-primary">
                                                                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                                                    </svg>
                                                                </div>
                                                                <span class="font-medium">{{ $package->duration_days }} Days</span>
                                                            </div>
                                                            <div class="flex items-center gap-1.5 group-hover:text-orange-primary transition-colors duration-300">
                                                                <div class="w-8 h-8 rounded-lg bg-orange-primary/10 group-hover:bg-orange-primary/20 flex items-center justify-center transition-colors duration-300">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-orange-primary">
                                                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                                                        <circle cx="12" cy="10" r="3"></circle>
                                                                    </svg>
                                                                </div>
                                                                <span class="font-medium">{{ $package->destination->name }}</span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="flex items-center justify-between pt-5 border-t border-gray-100 group-hover:border-orange-primary/20 transition-colors duration-300">
                                                            <div class="flex-1">
                                                                @if($package->price_compare_at && $package->price_start < $package->price_compare_at)
                                                                    <p class="text-sm text-gray-400 line-through mb-1">₹{{ number_format($package->price_compare_at) }}</p>
                                                                @endif
                                                                <div class="flex items-baseline gap-2">
                                                                    <p class="text-2xl font-bold bg-gradient-to-r from-orange-primary to-yellow-accent bg-clip-text text-transparent">
                                                                        ₹{{ number_format($package->price_start) }}
                                                                    </p>
                                                                </div>
                                                                <p class="text-xs text-body-text mt-1">per person</p>
                                                            </div>
                                                            <a href="/{{ $package->slug }}" class="bg-gradient-to-r from-orange-primary to-orange-primary/90 hover:from-orange-primary/90 hover:to-orange-primary text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-300 ease-out flex items-center gap-1.5 whitespace-nowrap ml-4">
                                                                <span>View</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                                                                    <path d="M5 12h14"></path>
                                                                    <path d="m12 5 7 7-7 7"></path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Navigation Arrows -->
                            <div class="swiper-button-prev section-carousel-prev-{{ $section->id }} !text-orange-primary !left-0"></div>
                            <div class="swiper-button-next section-carousel-next-{{ $section->id }} !text-orange-primary !right-0"></div>
                            
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
                    <a href="/section/{{ $section->slug }}" class="text-orange-primary hover:text-orange-primary/80 font-semibold flex items-center justify-center gap-2 transition-colors">
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

