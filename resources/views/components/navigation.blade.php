<nav
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500 border-b"
    x-data="navbar()"
    :class="{
        'bg-white shadow-lg border-gray-200': isScrolled,
        'bg-transparent border-transparent backdrop-blur-sm': !isScrolled,
    }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center gap-2 hover:opacity-80 transition-opacity duration-300">
                    <img src="{{ asset('images/pp-traveller-logo.webp') }}" alt="PP The Traveller" class="h-16 md:h-20">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center gap-2 font-medium text-base transition-colors duration-500"
                :class="isScrolled ? 'text-gray-900' : 'text-white'">
                <a href="/"
                    class="px-4 py-2 rounded-lg transition-all duration-300"
                    :class="isScrolled 
                       ? 'hover:bg-orange-primary/10 hover:text-orange-primary text-gray-900' 
                       : 'hover:bg-white/20 hover:text-white text-white'">
                    Home
                </a>

                <!-- Domestic Dropdown (Click) -->
                <div class="relative" @click.away="domesticOpen = false">
                    <button
                        @click="domesticOpen = !domesticOpen"
                        type="button"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-300"
                        :class="isScrolled 
                            ? (domesticOpen ? 'bg-orange-primary/10 text-orange-primary' : 'hover:bg-orange-primary/10 hover:text-orange-primary text-gray-900')
                            : (domesticOpen ? 'bg-white/30 text-white' : 'hover:bg-white/20 text-white')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            :class="isScrolled ? 'text-orange-primary' : 'text-white'"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Domestic</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300" :class="{ 'rotate-180': domesticOpen }" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        x-show="domesticOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        class="absolute top-full left-0 mt-2 w-72 bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden z-50">
                        <a href="/domestic" class="block px-4 py-3 text-sm font-semibold text-orange-primary bg-gradient-to-r from-orange-primary/5 to-transparent hover:bg-orange-primary/10 transition-all duration-300 border-b border-gray-100">
                            <div class="flex items-center justify-between">
                                <span>View All Domestic Tours</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </div>
                        </a>
                        <div class="max-h-64 overflow-y-auto scrollbar-thin scrollbar-thumb-orange-primary/20 scrollbar-track-white">
                            @foreach($domesticDestinations->take(10) as $destination)
                            <a href="/section/{{ $destination->slug }}" @click="domesticOpen = false" class="block px-4 py-3 text-sm text-gray-700 hover:bg-orange-primary/10 hover:text-orange-primary transition-all duration-300 border-b border-gray-50 last:border-b-0 flex items-center gap-2">
                                <span class="text-orange-primary">📍</span>
                                {{ $destination->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- International Dropdown (Click) -->
                <div class="relative" @click.away="internationalOpen = false">
                    <button
                        @click="internationalOpen = !internationalOpen"
                        type="button"
                        class="flex items-center gap-2 px-4 py-2 rounded-lg transition-all duration-300"
                        :class="isScrolled 
                            ? (internationalOpen ? 'bg-white-50 text-white-600' : 'hover:bg-white-50 hover:text-white-600 text-gray-900')
                            : (internationalOpen ? 'bg-white/30 text-white' : 'hover:bg-white/20 text-white')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            :class="isScrolled ? 'text-white-600' : 'text-white'"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>International</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300" :class="{ 'rotate-180': internationalOpen }" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div
                        x-show="internationalOpen"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        class="absolute top-full left-0 mt-2 w-72 bg-white rounded-2xl shadow-2xl border border-gray-200 overflow-hidden z-50">
                        <a href="/international" class="block px-4 py-3 text-sm font-semibold text-white-600 bg-gradient-to-r from-white-50 to-transparent hover:bg-white-100 transition-all duration-300 border-b border-gray-100">
                            <div class="flex items-center justify-between">
                                <span>View All International Tours</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </div>
                        </a>
                        <div class="max-h-64 overflow-y-auto scrollbar-thin scrollbar-thumb-white-600/20 scrollbar-track-white">
                            @foreach($internationalDestinations->take(10) as $destination)
                            <a href="/section/{{ $destination->slug }}" @click="internationalOpen = false" class="block px-4 py-3 text-sm text-gray-700 hover:bg-white-50 hover:text-white-600 transition-all duration-300 border-b border-gray-50 last:border-b-0 flex items-center gap-2">
                                <span class="text-white-600">🌍</span>
                                {{ $destination->name }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <a href="/about"
                    class="px-4 py-2 rounded-lg transition-all duration-300"
                    :class="isScrolled 
                       ? 'hover:bg-orange-primary/10 hover:text-orange-primary text-gray-900' 
                       : 'hover:bg-white/20 hover:text-white text-white'">
                    About
                </a>
                <a href="/contact"
                    class="px-4 py-2 rounded-lg transition-all duration-300"
                    :class="isScrolled 
                       ? 'hover:bg-orange-primary/10 hover:text-orange-primary text-gray-900' 
                       : 'hover:bg-white/20 hover:text-white text-white'">
                    Contact
                </a>
            </div>

            <!-- CTA Button -->
            <div class="hidden lg:block">
                <div class="flex items-center gap-2">
                    <a href="/contact"
                        class="px-6 py-2 rounded-lg bg-orange-500 text-white flex justify-center items-center gap-2 font-semibold shadow-md transition-all duration-300 ease-in-out"
                        :class="isScrolled 
              ? 'hover:bg-orange-600 hover:text-orange-100 text-gray-900 shadow-lg' 
              : 'hover:bg-orange-700 hover:text-white'"
                        style="box-shadow: 0 4px 8px rgba(255, 107, 53, 0.3);">
                        <span class="text-2xl font-bold">₹</span> Pay us
                    </a>
                </div>
            </div>


            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button
                    type="button"
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="inline-flex items-center justify-center p-2 rounded-lg transition-all duration-300"
                    :class="isScrolled 
                        ? (mobileMenuOpen ? 'text-orange-primary bg-orange-primary/10' : 'text-gray-900 hover:text-orange-primary hover:bg-orange-primary/10')
                        : (mobileMenuOpen ? 'text-white bg-white/20' : 'text-white hover:bg-white/20')"
                    aria-label="Toggle menu">
                    <svg x-show="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu">
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>
                    <svg x-show="mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x">
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
        :class="isScrolled ? 'bg-white/95 border-gray-200' : 'bg-black/30 backdrop-blur-md border-white/10'"
        class="lg:hidden border-t shadow-xl"
        style="display: none;">
        <div class="px-4 pt-2 pb-6 space-y-2 max-h-[calc(100vh-5rem)] overflow-y-auto"
            :class="isScrolled ? 'text-gray-900' : 'text-white'">
            <a href="/" @click="mobileMenuOpen = false"
                class="block px-4 py-3 rounded-lg font-medium transition-all duration-300"
                :class="isScrolled 
                   ? 'hover:bg-orange-primary/10 hover:text-orange-primary' 
                   : 'hover:bg-white/20 hover:text-white'">
                Home
            </a>

            <!-- Mobile Domestic Dropdown -->
            <div x-data="{ open: false }" class="space-y-1">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-lg font-medium transition-all duration-300"
                    :class="isScrolled 
                            ? (open ? 'bg-orange-primary/10 text-orange-primary' : 'hover:bg-orange-primary/10 hover:text-orange-primary')
                            : (open ? 'bg-white/30 text-white' : 'hover:bg-white/20')">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span>Domestic</span>
                    </div>
                    <svg class="h-4 w-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition
                    class="pl-4 space-y-1 rounded-lg p-3"
                    :class="isScrolled ? 'bg-orange-primary/5' : 'bg-white/10'"
                    style="display: none;">
                    <a href="/domestic" @click="mobileMenuOpen = false"
                        class="block px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300"
                        :class="isScrolled ? 'text-orange-primary bg-white hover:shadow-md' : 'text-white bg-white/20 hover:bg-white/30'">
                        View All
                    </a>
                    <div class="border-t my-2"
                        :class="isScrolled ? 'border-orange-primary/10' : 'border-white/20'"></div>
                    @foreach($domesticDestinations->take(6) as $destination)
                    <a href="/section/{{ $destination->slug }}" @click="mobileMenuOpen = false"
                        class="block px-4 py-2 rounded-lg text-sm transition-all duration-300"
                        :class="isScrolled 
                               ? 'text-gray-700 hover:bg-white hover:text-orange-primary' 
                               : 'text-white hover:bg-white/20'">
                        {{ $destination->name }}
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Mobile International Dropdown -->
            <div x-data="{ open: false }" class="space-y-1">
                <button @click="open = !open"
                    class="w-full flex items-center justify-between px-4 py-3 rounded-lg font-medium transition-all duration-300"
                    :class="isScrolled 
                            ? (open ? 'bg-orange-primary/10 text-orange-primary' : 'hover:bg-orange-primary/10 hover:text-orange-primary')
                            : (open ? 'bg-white/30 text-white' : 'hover:bg-white/20')">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <span>International</span>
                    </div>
                    <svg class="h-4 w-4 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="m6 9 6 6 6-6"></path>
                    </svg>
                </button>
                <div x-show="open" x-transition
                    class="pl-4 space-y-1 rounded-lg p-3"
                    :class="isScrolled ? 'bg-white-50' : 'bg-white/10'"
                    style="display: none;">
                    <a href="/international" @click="mobileMenuOpen = false"
                        class="block px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-300"
                        :class="isScrolled ? 'text-white-600 bg-white hover:shadow-md' : 'text-white bg-white/20 hover:bg-white/30'">
                        View All
                    </a>
                    <div class="border-t my-2"
                        :class="isScrolled ? 'border-white-200' : 'border-white/20'"></div>
                    @foreach($internationalDestinations->take(6) as $destination)
                    <a href="/section/{{ $destination->slug }}" @click="mobileMenuOpen = false"
                        class="block px-4 py-2 rounded-lg text-sm transition-all duration-300"
                        :class="isScrolled 
                               ? 'text-gray-700 hover:bg-white hover:text-white-600' 
                               : 'text-white hover:bg-white/20'">
                        {{ $destination->name }}
                    </a>
                    @endforeach
                </div>
            </div>

            <a href="/about" @click="mobileMenuOpen = false"
                class="block px-4 py-3 rounded-lg font-medium transition-all duration-300"
                :class="isScrolled 
                   ? 'hover:bg-orange-primary/10 hover:text-orange-primary' 
                   : 'hover:bg-white/20 hover:text-white'">
                About
            </a>
            <a href="/contact" @click="mobileMenuOpen = false"
                class="block px-4 py-3 rounded-lg font-medium transition-all duration-300"
                :class="isScrolled 
                   ? 'hover:bg-orange-primary/10 hover:text-orange-primary' 
                   : 'hover:bg-white/20 hover:text-white'">
                Contact
            </a>

            <!-- Book Now Mobile -->
            <a href="/contact" @click="mobileMenuOpen = false"
                class="block px-4 py-3 mt-4 rounded-lg font-semibold text-center shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300"
                :class="isScrolled 
                   ? 'bg-gradient-to-r from-orange-primary to-yellow-accent text-white' 
                   : 'bg-white text-orange-primary hover:bg-orange-primary hover:text-white'">
                📞 Book Now
            </a>
        </div>
    </div>
</nav>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbar', () => ({
            isScrolled: false,
            mobileMenuOpen: false,
            domesticOpen: false,
            internationalOpen: false,

            init() {
                window.addEventListener('scroll', () => {
                    this.isScrolled = window.scrollY > 10;
                });
            }
        }));
    });
</script>
@endpush

<style>
    /* Smooth transitions */
    nav {
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    nav a,
    nav button {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Custom scrollbar */
    .scrollbar-thin::-webkit-scrollbar {
        width: 6px;
    }

    .scrollbar-thin::-webkit-scrollbar-track {
        background: white;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb {
        background: rgba(255, 107, 53, 0.2);
        border-radius: 3px;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 107, 53, 0.4);
    }
</style>