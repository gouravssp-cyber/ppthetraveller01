<div>
    @if($section)
        <!-- Hero Section -->
        <section class="relative w-full min-h-[50vh] flex items-center justify-center overflow-hidden">
            @if($section->banner_image)
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                    style="background-image: url('{{ $section->full_banner_image_url }}');">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-primary/40 via-black/60 to-black/80"></div>
                </div>
            @else
                <div class="absolute inset-0 bg-gradient-to-br from-orange-primary via-orange-primary/80 to-yellow-accent"></div>
            @endif
            <div class="relative z-10 text-center w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="mb-4 flex justify-center">
                    @if($section->section_icon)
                        <span class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md border border-white/30 text-white px-4 py-2 rounded-full text-sm font-semibold">
                            <i class="{{ $section->section_icon }}"></i>
                            {!! $section->title !!}
                        </span>
                    @else
                        <span class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md border border-white/30 text-white px-4 py-2 rounded-full text-sm font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles">
                                <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                            </svg>
                            Featured Section
                        </span>
                    @endif
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    <span class="text-white block mb-2">{{ $section->title }}</span>
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
                            <a href="/{{ $package->slug }}" class="block group">
                                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-orange-primary/30 h-full">
                                    <!-- Package Image with Hover Effect -->
                                    <div class="relative h-64 overflow-hidden">
                                        @if($package->banner_image)
                                            <img src="{{ asset('storage/' . $package->banner_image) }}" 
                                                 alt="{{ $package->banner_image_alt ?? $package->title }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-orange-primary/20 to-yellow-accent/20 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-primary/50">
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0"></path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg>
                                            </div>
                                        @endif
                                        
                                        <!-- Hover Overlay with Summary -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                            <div class="text-white">
                                                <p class="text-sm font-medium mb-2 line-clamp-3">
                                                    {{ Str::limit($package->summary ?? $package->full_description ?? 'Explore this amazing destination', 150) }}
                                                </p>
                                                <div class="flex items-center gap-3 text-xs opacity-90">
                                                    <span class="flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar">
                                                            <rect width="18" height="18" x="3" y="4" rx="2" ry="2"></rect>
                                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                                        </svg>
                                                        {{ $package->duration_days }} Days
                                                    </span>
                                                    <span class="flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                                                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                                            <circle cx="12" cy="10" r="3"></circle>
                                                        </svg>
                                                        {{ $package->destination->name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Badges -->
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

