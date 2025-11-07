<nav 
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500" 
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
        'bg-white/98 backdrop-blur-xl shadow-2xl border-b border-gray-200': scrolled,
        'bg-gradient-to-b from-black/40 via-black/20 to-transparent': !scrolled
    }">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center gap-2 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-orange-primary to-yellow-accent rounded-lg blur opacity-0 group-hover:opacity-75 transition-opacity duration-300"></div>
                        <div class="relative bg-black rounded-lg p-2">
                            <span class="text-xl md:text-2xl font-bold bg-gradient-to-r from-orange-primary to-yellow-accent bg-clip-text text-transparent">PP</span>
                        </div>
                    </div>
                    <div class="hidden sm:flex flex-col">
                        <span class="text-sm font-bold transition-colors duration-300" :class="scrolled ? 'text-title' : 'text-white'">PP</span>
                        <span class="text-xs font-medium transition-colors duration-300" :class="scrolled ? 'text-orange-primary' : 'text-yellow-accent'">The Traveller</span>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-1">
                <!-- Home Link -->
                <a href="/" 
                   class="px-4 py-2 rounded-lg font-medium transition-all duration-300 relative group"
                   :class="scrolled ? 'text-title hover:text-orange-primary hover:bg-orange-primary/5' : 'text-white/90 hover:text-white hover:bg-white/10'">
                    Home
                    <span class="absolute bottom-1 left-4 w-0 h-0.5 transition-all duration-300 group-hover:w-[calc(100%-2rem)]"
                          :class="scrolled ? 'bg-orange-primary' : 'bg-yellow-accent'"></span>
                </a>

                <!-- Domestic Dropdown -->
                <div class="relative group">
                    <button 
                        type="button"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 relative"
                        :class="scrolled ? 'text-title hover:text-orange-primary hover:bg-orange-primary/5 group-hover:text-orange-primary group-hover:bg-orange-primary/5' : 'text-white/90 hover:text-white hover:bg-white/10 group-hover:text-white group-hover:bg-white/10'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Domestic</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down transform transition-transform duration-300 group-hover:rotate-180">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                        <span class="absolute bottom-1 left-4 w-0 h-0.5 transition-all duration-300 group-hover:w-[calc(100%-2rem)]"
                              :class="scrolled ? 'bg-orange-primary' : 'bg-yellow-accent'"></span>
                    </button>

                    <!-- Domestic Dropdown Menu -->
                    <div class="absolute top-full left-0 mt-2 w-80 bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top group-hover:scale-y-100 scale-y-95 pointer-events-none group-hover:pointer-events-auto">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-orange-primary to-yellow-accent p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
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
                            <a href="/domestic" class="mt-3 inline-flex items-center gap-2 text-white text-sm font-medium hover:text-yellow-accent transition-colors duration-300 group/link">
                                View All Domestic Tours
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right transform group-hover/link:translate-x-1 transition-transform duration-300">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>

                        <!-- Destinations List -->
                        <div class="p-3 max-h-96 overflow-y-auto scrollbar-thin scrollbar-track-gray-100 scrollbar-thumb-orange-primary/30 hover:scrollbar-thumb-orange-primary/50">
                            @if($domesticDestinations->count() > 0)
                                @foreach($domesticDestinations->take(12) as $destination)
                                    <a href="/section/{{ $destination->slug }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-orange-primary/5 transition-all duration-300 group/dest">
                                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-orange-primary/10 to-yellow-accent/10 group-hover/dest:from-orange-primary/20 group-hover/dest:to-yellow-accent/20 flex items-center justify-center transition-all duration-300 transform group-hover/dest:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin text-orange-primary">
                                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <span class="text-sm font-semibold text-title group-hover/dest:text-orange-primary transition-colors duration-300 block">{{ $destination->name }}</span>
                                            @php
                                                $packageCount = Package::published()->domestic()->where('destination_id', $destination->id)->count();
                                            @endphp
                                            <span class="text-xs text-body-text">{{ $packageCount }} {{ Str::plural('package', $packageCount) }}</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right text-gray-400 group-hover/dest:text-orange-primary group-hover/dest:translate-x-1 transition-all duration-300">
                                            <path d="M5 12h14"></path>
                                            <path d="m12 5 7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @endforeach
                            @else
                                <div class="px-3 py-8 text-sm text-body-text text-center">No domestic destinations available</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- International Dropdown -->
                <div class="relative group">
                    <button 
                        type="button"
                        class="px-4 py-2 rounded-lg font-medium transition-all duration-300 flex items-center gap-2 relative"
                        :class="scrolled ? 'text-title hover:text-blue-600 hover:bg-blue-50 group-hover:text-blue-600 group-hover:bg-blue-50' : 'text-white/90 hover:text-white hover:bg-white/10 group-hover:text-white group-hover:bg-white/10'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>International</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down transform transition-transform duration-300 group-hover:rotate-180">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                        <span class="absolute bottom-1 left-4 w-0 h-0.5 transition-all duration-300 group-hover:w-[calc(100%-2rem)]"
                              :class="scrolled ? 'bg-blue-600' : 'bg-blue-400'"></span>
                    </button>

                    <!-- International Dropdown Menu -->
                    <div class="absolute top-full left-0 mt-2 w-80 bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top group-hover:scale-y-100 scale-y-95 pointer-events-none group-hover:pointer-events-auto">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
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
                            <a href="/international" class="mt-3 inline-flex items-center gap-2 text-white text-sm font-medium hover:text-blue-100 transition-colors duration-300 group/link">
                                View All International Tours
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right transform group-hover/link:translate-x-1 transition-transform duration-300">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>

                        <!-- Destinations List -->
                        <div class="p-3 max-h-96 overflow-y-auto scrollbar-thin scrollbar-track-gray-100 scrollbar-thumb-blue-500/30 hover:scrollbar-thumb-blue-500/50">
                            @if($internationalDestinations->count() > 0)
                                @foreach($internationalDestinations->take(12) as $destination)
                                    <a href="/section/{{ $destination->slug }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-50 transition-all duration-300 group/dest">
                                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500/10 to-blue-600/10 group-hover/dest:from-blue-500/20 group-hover/dest:to-blue-600/20 flex items-center justify-center transition-all duration-300 transform group-hover/dest:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe text-blue-600">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <span class="text-sm font-semibold text-title group-hover/dest:text-blue-600 transition-colors duration-300 block">{{ $destination->name }}</span>
                                            @php
                                                $packageCount = Package::published()->international()->where('destination_id', $destination->id)->count();
                                            @endphp
                                            <span class="text-xs text-body-text">{{ $packageCount }} {{ Str::plural('package', $packageCount) }}</span>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right text-gray-400 group-hover/dest:text-blue-600 group-hover/dest:translate-x-1 transition-all duration-300">
                                            <path d="M5 12h14"></path>
                                            <path d="m12 5 7 7-7 7"></path>
                                        </svg>
                                    </a>
                                @endforeach
                            @else
                                <div class="px-3 py-8 text-sm text-body-text text-center">No international destinations available</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- About Link -->
                <a href="/about" 
                   class="px-4 py-2 rounded-lg font-medium transition-all duration-300 relative group"
                   :class="scrolled ? 'text-title hover:text-orange-primary hover:bg-orange-primary/5' : 'text-white/90 hover:text-white hover:bg-white/10'">
                    About
                    <span class="absolute bottom-1 left-4 w-0 h-0.5 transition-all duration-300 group-hover:w-[calc(100%-2rem)]"
                          :class="scrolled ? 'bg-orange-primary' : 'bg-yellow-accent'"></span>
                </a>

                <!-- Contact Link -->
                <a href="/contact" 
                   class="px-4 py-2 rounded-lg font-medium transition-all duration-300 relative group"
                   :class="scrolled ? 'text-title hover:text-orange-primary hover:bg-orange-primary/5' : 'text-white/90 hover:text-white hover:bg-white/10'">
                    Contact
                    <span class="absolute bottom-1 left-4 w-0 h-0.5 transition-all duration-300 group-hover:w-[calc(100%-2rem)]"
                          :class="scrolled ? 'bg-orange-primary' : 'bg-yellow-accent'"></span>
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:block">
                <a href="/contact" 
                   class="bg-gradient-to-r from-orange-primary to-yellow-accent hover:from-orange-primary/90 hover:to-yellow-accent/90 text-white px-6 py-2.5 rounded-lg font-semibold text-sm shadow-lg hover:shadow-2xl transform hover:scale-105 transition-all duration-300 inline-block">
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
        class="lg:hidden bg-white border-t border-gray-200 shadow-xl"
        style="display: none;">
        
        <div class="px-4 pt-2 pb-6 space-y-1 max-h-[calc(100vh-5rem)] overflow-y-auto">
            <!-- Home Link -->
            <a href="/" 
               @click="mobileMenuOpen = false"
               class="block px-4 py-3 rounded-lg text-title hover:bg-orange-primary/5 hover:text-orange-primary font-medium transition-all duration-300">
                Home
            </a>

            <!-- Mobile Domestic Dropdown -->
            <div x-data="{ open: false }" class="space-y-1">
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

                <div x-show="open" class="pl-4 space-y-1 bg-orange-primary/5 rounded-lg p-2" style="display: none;">
                    <a href="/domestic" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 rounded-lg text-sm font-semibold text-orange-primary bg-white hover:shadow-md transition-all duration-300">
                        View All Domestic Tours
                    </a>
                    <div class="border-t border-orange-primary/20 my-2"></div>
                    @foreach($domesticDestinations->take(6) as $destination)
                        <a href="/section/{{ $destination->slug }}" 
                           @click="mobileMenuOpen = false"
                           class="block px-4 py-2 rounded-lg text-sm text-title hover:bg-white hover:text-orange-primary transition-all duration-300">
                            {{ $destination->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Mobile International Dropdown -->
            <div x-data="{ open: false }" class="space-y-1">
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

                <div x-show="open" class="pl-4 space-y-1 bg-blue-50 rounded-lg p-2" style="display: none;">
                    <a href="/international" 
                       @click="mobileMenuOpen = false"
                       class="block px-4 py-2 rounded-lg text-sm font-semibold text-blue-600 bg-white hover:shadow-md transition-all duration-300">
                        View All International Tours
                    </a>
                    <div class="border-t border-blue-200 my-2"></div>
                    @foreach($internationalDestinations->take(6) as $destination)
                        <a href="/section/{{ $destination->slug }}" 
                           @click="mobileMenuOpen = false"
                           class="block px-4 py-2 rounded-lg text-sm text-title hover:bg-white hover:text-blue-600 transition-all duration-300">
                            {{ $destination->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- About Link -->
            <a href="/about" 
               @click="mobileMenuOpen = false"
               class="block px-4 py-3 rounded-lg text-title hover:bg-orange-primary/5 hover:text-orange-primary font-medium transition-all duration-300">
                About
            </a>

            <!-- Contact Link -->
            <a href="/contact" 
               @click="mobileMenuOpen = false"
               class="block px-4 py-3 rounded-lg text-title hover:bg-orange-primary/5 hover:text-orange-primary font-medium transition-all duration-300">
                Contact
            </a>

            <!-- Mobile CTA Button -->
            <a href="/contact" 
               @click="mobileMenuOpen = false"
               class="block px-4 py-3 mt-4 bg-gradient-to-r from-orange-primary to-yellow-accent text-white rounded-lg font-semibold text-center shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                Book Now
            </a>
        </div>
    </div>
</nav>

<!-- Spacer for fixed navigation -->
<div class="h-16 md:h-20"></div>