<section
    class="relative w-full min-h-screen flex items-center justify-center overflow-hidden">
    <div
        class="absolute inset-0 bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/hero-bg.jpg') }}');">
        <div
            class="absolute inset-0"
            style="background: linear-gradient(135deg, hsla(27,98%,48%,0.20) 0%, hsla(0,0%,0%,0.40) 50%, hsla(0,0%,0%,0.60) 100%);"></div>
    </div>
    <div
        class="hidden sm:block absolute top-10 sm:top-20 right-10 sm:right-20 w-40 sm:w-72 h-40 sm:h-72 rounded-full blur-3xl"
        style="background-color: hsla(40,96%,61%,0.20);"></div>
    <div
        class="hidden md:block absolute bottom-10 md:bottom-20 left-10 md:left-20 w-56 md:w-96 h-56 md:h-96 rounded-full blur-3xl"
        style="background-color: hsla(27,98%,48%,0.20);"></div>
    <div
        class="relative z-10 text-center w-full max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 mt-10">
        <div class="mb-4 sm:mb-6 flex justify-center">
            <span
                class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-full text-xs sm:text-sm font-semibold whitespace-nowrap sm:whitespace-normal">
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
                    class="lucide lucide-sparkles h-3 w-3 sm:h-4 sm:w-4 flex-shrink-0"
                    style="color: hsl(40,96%,61%)"
                >
                    <path
                        d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z">
                    </path>
                    <path d="M20 3v4"></path>
                    <path d="M22 5h-4"></path>
                    <path d="M4 17v2"></path>
                    <path d="M5 18H3"></path>
                </svg>
                <span class="hidden sm:inline">Explore 100+ Destinations Across India</span>
                <span class="sm:hidden">100+ Destinations</span>
            </span>
        </div>
        <h1
            class="text-3xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-bold mb-4 sm:mb-6 leading-tight">
            <span class="text-white block mb-2">Discover Your</span>
            <span class="sm:text-6xl md:text-7xl lg:text-8xl xl:text-8xl font-bold bg-[hsl(27,98%,48%)] bg-clip-text text-transparent">Dream Adventure</span>
        </h1>

        
        <p
            class="text-sm sm:text-lg md:text-xl lg:text-2xl mb-8 sm:mb-12 font-light max-w-3xl mx-auto px-2 sm:px-0 leading-relaxed"
            style="color: rgba(255,255,255,0.90)">
            Explore curated tour packages across India's most breathtaking
            destinations with expert guides and unforgettable experiences
        </p>
        <div class="w-full max-w-4xl mx-auto mb-8 sm:mb-12 px-2 sm:px-0">
            <div
                class="bg-white/95 backdrop-blur-md rounded-2xl sm:rounded-3xl p-2 sm:p-3 shadow-2xl border border-white/20 overflow-x-auto">
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 min-w-min sm:min-w-full">
                    <div
                        class="flex items-center gap-2 sm:gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-xl sm:rounded-2xl transition-colors"
                        onmouseover="this.style.backgroundColor='hsla(27,98%,48%,0.05)'" onmouseout="this.style.backgroundColor='transparent'">
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
                            class="lucide lucide-map-pin h-4 w-4 sm:h-5 sm:w-5 flex-shrink-0"
                            style="color: hsl(27,98%,48%)">
                            <path
                                d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <input
                            class="flex h-10 w-full rounded-md border-0 bg-transparent focus-visible:outline-none focus-visible:ring-0 p-0 text-sm sm:text-base"
                            style="color: hsl(24,33%,5%);"
                            placeholder="Destination" />
                    </div>
                    <div
                        class="flex items-center gap-2 sm:gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-xl sm:rounded-2xl transition-colors"
                        onmouseover="this.style.backgroundColor='hsla(27,98%,48%,0.05)'" onmouseout="this.style.backgroundColor='transparent'">
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
                            class="lucide lucide-calendar h-4 w-4 sm:h-5 sm:w-5 flex-shrink-0"
                            style="color: hsl(27,98%,48%)">
                            <path d="M8 2v4"></path>
                            <path d="M16 2v4"></path>
                            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                            <path d="M3 10h18"></path>
                        </svg>
                        <input
                            class="flex h-10 w-full rounded-md border-0 bg-transparent focus-visible:outline-none focus-visible:ring-0 p-0 text-sm sm:text-base"
                            style="color: hsl(24,33%,5%);"
                            placeholder="When?" />
                    </div>
                    <div
                        class="flex items-center gap-2 sm:gap-3 px-3 sm:px-4 py-2 sm:py-3 rounded-xl sm:rounded-2xl transition-colors"
                        onmouseover="this.style.backgroundColor='hsla(27,98%,48%,0.05)'" onmouseout="this.style.backgroundColor='transparent'">
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
                            class="lucide lucide-users h-4 w-4 sm:h-5 sm:w-5 flex-shrink-0"
                            style="color: hsl(27,98%,48%)">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <input
                            class="flex h-10 w-full rounded-md border-0 bg-transparent focus-visible:outline-none focus-visible:ring-0 p-0 text-sm sm:text-base"
                            style="color: hsl(24,33%,5%);"
                            placeholder="Travelers" />
                    </div>
                    <button
                        class="whitespace-nowrap font-medium h-10 bg-gradient-to-r from-[hsl(27,98%,48%)] to-[hsl(27,98%,38%)] hover:from-[hsl(27,98%,38%)] hover:to-[hsl(27,98%,44%)] text-white px-4 sm:px-8 py-2 sm:py-6 rounded-xl sm:rounded-2xl transition-all duration-300 hover:scale-105 shadow-lg col-span-1 sm:col-span-2 lg:col-span-1 flex items-center justify-center gap-2 text-sm sm:text-base"
                        style="background: linear-gradient(to right, hsl(27,98%,48%), hsl(27,98%,44%));"
                        onmouseover="this.style.background='linear-gradient(to right, hsl(27,98%,38%), hsl(27,98%,44%))'"
                        onmouseout="this.style.background='linear-gradient(to right, hsl(27,98%,48%), hsl(27,98%,44%))'"
                    >
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
                            class="lucide lucide-search h-4 w-4 sm:h-5 sm:w-5">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </svg>
                        <span>Search</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div
        class="absolute bottom-4 sm:bottom-8 left-1/2 -translate-x-1/2"
        style="opacity: 1">
        <div
            class="w-5 h-8 sm:w-6 sm:h-10 border-2 border-white/50 rounded-full flex items-start justify-center p-1 sm:p-2">
            <div class="w-1 h-1 sm:w-1.5 sm:h-1.5 bg-white rounded-full"></div>
        </div>
    </div>
</section>
