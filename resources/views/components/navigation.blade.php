@php
    use App\Models\Destination;
    use App\Models\Package;
    
    // Get all active destinations
    $allDestinations = Destination::active()->orderBy('name')->get();
    
    // Get destinations with domestic packages
    $domesticDestinationIds = Package::published()
        ->domestic()
        ->pluck('destination_id')
        ->unique()
        ->toArray();
    
    $domesticDestinations = $allDestinations->filter(function($dest) use ($domesticDestinationIds) {
        return in_array($dest->id, $domesticDestinationIds);
    });
    
    // Get destinations with international packages
    $internationalDestinationIds = Package::published()
        ->international()
        ->pluck('destination_id')
        ->unique()
        ->toArray();
    
    $internationalDestinations = $allDestinations->filter(function($dest) use ($internationalDestinationIds) {
        return in_array($dest->id, $internationalDestinationIds);
    });
@endphp

<nav 
    class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md transition-all duration-500 border-b border-transparent" 
    x-data="{ 
        mobileMenuOpen: false, 
        scrolled: false,
        init() {
            this.checkScroll();
            window.addEventListener('scroll', () => this.checkScroll());
        },
        checkScroll() {
            this.scrolled = window.scrollY > 50;
        }
    }" 
    :class="{ 
        'bg-white/95 shadow-xl border-gray-100': scrolled,
        'bg-transparent': !scrolled
    }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center gap-2 group">
                    <span class="text-2xl md:text-3xl font-bold">
                        <span class="bg-gradient-to-r from-orange-primary to-yellow-accent bg-clip-text text-transparent">PP</span>
                        <span :class="scrolled ? 'text-title' : 'text-white'">The Traveller</span>
                    </span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-8">
                <a href="/" class="font-medium transition-colors duration-300 relative group" :class="scrolled ? 'text-title hover:text-orange-primary' : 'text-white hover:text-yellow-accent'">
                    Home
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 transition-all duration-300" :class="scrolled ? 'bg-orange-primary group-hover:w-full' : 'bg-yellow-accent group-hover:w-full'"></span>
                </a>

                <!-- Domestic Dropdown -->
                <div class="relative" x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false" @click.away="open = false">
                    <button 
                        type="button"
                        @click="open = !open"
                        class="font-medium transition-colors duration-300 flex items-center gap-1.5 relative group"
                        :class="scrolled ? 'text-title hover:text-orange-primary' : 'text-white hover:text-yellow-accent'"
                        :class="{ 'text-orange-primary': open && scrolled, 'text-yellow-accent': open && !scrolled }">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Domestic</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down transform transition-transform duration-300" :class="{ 'rotate-180': open }">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                        <span class="absolute bottom-0 left-0 w-0 transition-all duration-300" :class="scrolled ? 'bg-orange-primary group-hover:w-full' : 'bg-yellow-accent group-hover:w-full'" :class="{ 'w-full': open }"></span>
                    </button>

                    <!-- Domestic Dropdown Menu -->
                    <div 
                        x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-2"
                        class="absolute top-full left-0 mt-3 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden"
                        @click.away="open = false"
                        style="display: none;">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-orange-primary to-yellow-accent p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-bold text-lg">Domestic Tours</h3>
                                    <p class="text-white/90 text-xs">Discover India's beauty</p>
                                </div>
                            </div>
                            <a href="/domestic" class="mt-3 inline-flex items-center gap-2 text-white text-sm font-medium hover:text-yellow-accent transition-colors">
                                View All Domestic Tours
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>

                        <!-- Destinations List -->
                        <div class="p-3 max-h-96 overflow-y-auto scrollbar-thin">
                            @if($domesticDestinations->count() > 0)
                                @foreach($domesticDestinations->take(12) as $destination)
                                    <a href="/section/{{ $destination->slug }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-orange-primary/5 transition-all duration-300 group">
                                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-orange-primary/10 to-yellow-accent/10 group-hover:from-orange-primary/20 group-hover:to-yellow-accent/20 flex items-center justify-center transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-orange-primary">
                                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <span class="text-sm font-semibold text-title group-hover:text-orange-primary transition-colors duration-300 block">{{ $destination->name }}</span>
                                            @php
                                                $packageCount = Package::published()->domestic()->where('destination_id', $destination->id)->count();
                                            @endphp
                                            <span class="text-xs text-body-text">{{ $packageCount }} {{ Str::plural('package', $packageCount) }}</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right text-gray-400 group-hover:text-orange-primary group-hover:translate-x-1 transition-all">
                                            <path d="M5 12h14"></path>
                                            <path d="m12 5 7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @endforeach
                            @else
                                <div class="px-3 py-4 text-sm text-body-text text-center">No domestic destinations available</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- International Dropdown -->
                <div class="relative" x-data="{ open: false }" x-on:mouseenter="open = true" x-on:mouseleave="open = false" @click.away="open = false">
                    <button 
                        type="button"
                        @click="open = !open"
                        class="font-medium transition-colors duration-300 flex items-center gap-1.5 relative group"
                        :class="scrolled ? 'text-title hover:text-orange-primary' : 'text-white hover:text-yellow-accent'"
                        :class="{ 'text-orange-primary': open && scrolled, 'text-yellow-accent': open && !scrolled }">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>International</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down transform transition-transform duration-300" :class="{ 'rotate-180': open }">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                        <span class="absolute bottom-0 left-0 w-0 transition-all duration-300" :class="scrolled ? 'bg-orange-primary group-hover:w-full' : 'bg-yellow-accent group-hover:w-full'" :class="{ 'w-full': open }"></span>
                    </button>

                    <!-- International Dropdown Menu -->
                    <div 
                        x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-2"
                        class="absolute top-full left-0 mt-3 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden"
                        @click.away="open = false"
                        style="display: none;">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-white font-bold text-lg">International Tours</h3>
                                    <p class="text-white/90 text-xs">Explore global destinations</p>
                                </div>
                            </div>
                            <a href="/international" class="mt-3 inline-flex items-center gap-2 text-white text-sm font-medium hover:text-blue-100 transition-colors">
                                View All International Tours
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>

                        <!-- Destinations List -->
                        <div class="p-3 max-h-96 overflow-y-auto scrollbar-thin">
                            @if($internationalDestinations->count() > 0)
                                @foreach($internationalDestinations->take(12) as $destination)
                                    <a href="/section/{{ $destination->slug }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-50 transition-all duration-300 group">
                                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500/10 to-blue-600/10 group-hover:from-blue-500/20 group-hover:to-blue-600/20 flex items-center justify-center transition-all duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe text-blue-500">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <span class="text-sm font-semibold text-title group-hover:text-blue-500 transition-colors duration-300 block">{{ $destination->name }}</span>
                                            @php
                                                $packageCount = Package::published()->international()->where('destination_id', $destination->id)->count();
                                            @endphp
                                            <span class="text-xs text-body-text">{{ $packageCount }} {{ Str::plural('package', $packageCount) }}</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right text-gray-400 group-hover:text-blue-500 group-hover:translate-x-1 transition-all">
                                            <path d="M5 12h14"></path>
                                            <path d="m12 5 7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @endforeach
                            @else
                                <div class="px-3 py-4 text-sm text-body-text text-center">No international destinations available</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Other Menu Items -->
                <a href="/about" class="font-medium transition-colors duration-300 relative group" :class="scrolled ? 'text-title hover:text-orange-primary' : 'text-white hover:text-yellow-accent'">
                    About
                    <span class="absolute bottom-0 left-0 w-0 transition-all duration-300" :class="scrolled ? 'bg-orange-primary group-hover:w-full' : 'bg-yellow-accent group-hover:w-full'"></span>
                </a>
                <a href="/contact" class="font-medium transition-colors duration-300 relative group" :class="scrolled ? 'text-title hover:text-orange-primary' : 'text-white hover:text-yellow-accent'">
                    Contact
                    <span class="absolute bottom-0 left-0 w-0 transition-all duration-300" :class="scrolled ? 'bg-orange-primary group-hover:w-full' : 'bg-yellow-accent group-hover:w-full'"></span>
                </a>

                <!-- CTA Button -->
                <a href="/contact" class="bg-gradient-to-r from-orange-primary to-yellow-accent hover:from-orange-primary/90 hover:to-yellow-accent/90 text-white px-6 py-2.5 rounded-lg font-semibold text-sm shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                    Book Now
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button 
                    type="button"
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="inline-flex items-center justify-center p-2 rounded-lg transition-colors duration-300"
                    :class="scrolled ? 'text-title hover:text-orange-primary hover:bg-orange-primary/5' : 'text-white hover:text-yellow-accent hover:bg-white/10'"
                    aria-label="Toggle menu">
                    <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>
                    <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div 
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="lg:hidden bg-white border-t border-gray-100 shadow-xl"
        style="display: none;">
        <div class="px-4 pt-2 pb-6 space-y-1">
            <a href="/" class="block px-4 py-3 rounded-lg text-title hover:bg-orange-primary/5 hover:text-orange-primary font-medium transition-all duration-300">
                Home
            </a>

            <!-- Mobile Domestic Dropdown -->
            <div x-data="{ open: false }">
                <button 
                    @click="open = !open"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-lg text-title hover:bg-orange-primary/5 hover:text-orange-primary font-medium transition-all duration-300">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Domestic</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down transform transition-transform duration-300" :class="{ 'rotate-180': open }">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                </button>

                <div x-show="open" class="pl-4 mt-1 space-y-1 bg-orange-primary/5 rounded-lg p-2" style="display: none;">
                    <a href="/domestic" class="block px-4 py-2 rounded-lg text-sm font-semibold text-orange-primary bg-white">
                        View All Domestic Tours
                    </a>
                    <div class="border-t border-orange-primary/20 my-2"></div>
                    @foreach($domesticDestinations->take(6) as $destination)
                        <a href="/section/{{ $destination->slug }}" class="block px-4 py-2 rounded-lg text-sm text-title hover:bg-white hover:text-orange-primary transition-all duration-300">
                            {{ $destination->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Mobile International Dropdown -->
            <div x-data="{ open: false }">
                <button 
                    @click="open = !open"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-lg text-title hover:bg-blue-50 hover:text-blue-600 font-medium transition-all duration-300">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>International</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down transform transition-transform duration-300" :class="{ 'rotate-180': open }">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                </button>

                <div x-show="open" class="pl-4 mt-1 space-y-1 bg-blue-50 rounded-lg p-2" style="display: none;">
                    <a href="/international" class="block px-4 py-2 rounded-lg text-sm font-semibold text-blue-600 bg-white">
                        View All International Tours
                    </a>
                    <div class="border-t border-blue-200 my-2"></div>
                    @foreach($internationalDestinations->take(6) as $destination)
                        <a href="/section/{{ $destination->slug }}" class="block px-4 py-2 rounded-lg text-sm text-title hover:bg-white hover:text-blue-600 transition-all duration-300">
                            {{ $destination->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <a href="/about" class="block px-4 py-3 rounded-lg text-title hover:bg-orange-primary/5 hover:text-orange-primary font-medium transition-all duration-300">
                About
            </a>
            <a href="/contact" class="block px-4 py-3 rounded-lg text-title hover:bg-orange-primary/5 hover:text-orange-primary font-medium transition-all duration-300">
                Contact
            </a>
            <a href="/contact" class="block px-4 py-3 mt-4 bg-gradient-to-r from-orange-primary to-yellow-accent text-white rounded-lg font-semibold text-center shadow-lg">
                Book Now
            </a>
        </div>
    </div>
</nav>

<!-- Spacer for fixed navigation -->
<div class="h-16 md:h-20"></div>

