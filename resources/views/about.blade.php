@extends('layouts.app')

@section('title', 'Contact - Best Tour Packages')
@section('meta_description', 'Get in touch with us for any inquiries about our tour packages')

@section('content')
<section class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center"
        style="background-image:url('{{ asset('images/hero-bg.jpg') }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black/70"></div>
    <div class="relative z-10 text-center max-w-5xl mx-auto px-4">
        <div><span
                class="inline-block text-yellow-accent text-sm font-semibold tracking-widest uppercase mb-4">Our
                Story</span></div>
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-white mb-6 leading-tight">Crafting Memories,<br><span
                class="bg-gradient-to-r from-yellow-accent to-orange-primary bg-clip-text text-transparent">One
                Journey at a Time</span></h1>
        <p class="text-xl md:text-2xl text-white/90 font-light max-w-3xl mx-auto">
            We're not just a travel company – we're your partners in
            creating unforgettable adventures across the incredible landscapes of India.</p>
    </div>
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2" ">
        <div class="w-6 h-10 border-2 border-white/50 rounded-full flex items-start justify-center p-2"
            style="transform: translateY(5.62477px);">
            <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
        </div>
    </div>
</section>
<section class="py-24 px-4 md:px-8 bg-gradient-to-b from-transparent via-orange-primary/5 to-transparent">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="flex items-center gap-3 mb-6"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-target h-8 w-8 text-orange-primary">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="12" r="6"></circle>
                        <circle cx="12" cy="12" r="2"></circle>
                    </svg><span class="text-orange-primary font-semibold text-lg">Our Mission</span></div>
                <h2 class="text-4xl md:text-5xl font-bold text-title mb-6">Making Travel Dreams Accessible
                    to Everyone</h2>
                <p class="text-lg text-body-text leading-relaxed mb-6">We believe that travel transforms
                    lives. Our mission is to make incredible travel experiences accessible, affordable, and
                    unforgettable for every explorer, whether you're a solo adventurer, a couple seeking
                    romance, or a family creating memories.</p>
                <p class="text-lg text-body-text leading-relaxed">Through carefully curated packages, expert
                    local guides, and unwavering commitment to quality, we ensure every journey exceeds
                    expectations and creates stories worth sharing for a lifetime.</p>
            </div>
            <div class="relative">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-orange-primary/10 text-center">
                        <div class="text-4xl font-bold text-orange-primary mb-2">10,000+</div>
                        <div class="text-body-text font-medium">Happy Travelers</div>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-orange-primary/10 text-center">
                        <div class="text-4xl font-bold text-orange-primary mb-2">100+</div>
                        <div class="text-body-text font-medium">Destinations</div>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-orange-primary/10 text-center">
                        <div class="text-4xl font-bold text-orange-primary mb-2">4.8/5</div>
                        <div class="text-body-text font-medium">Average Rating</div>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-orange-primary/10 text-center">
                        <div class="text-4xl font-bold text-orange-primary mb-2">50+</div>
                        <div class="text-body-text font-medium">Expert Guides</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-24 px-4 md:px-8 bg-gradient-to-b from-transparent to-orange-primary/5">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-title mb-4">Our Journey</h2>
            <p class="text-lg text-body-text">Milestones that shaped who we are today</p>
        </div>
        <div class="relative">
            <div
                class="absolute left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-orange-primary via-orange-primary to-transparent hidden md:block">
            </div>
            <div class="relative mb-16 md:mb-24 md:pr-1/2">
                <div class="md:w-1/2 md:ml-0">
                    <div class="bg-white rounded-2xl p-8 shadow-xl border border-orange-primary/10 relative">
                        <div
                            class="absolute -top-6 left-8 bg-gradient-to-br from-orange-primary to-yellow-accent p-4 rounded-2xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-sparkles h-6 w-6 text-white">
                                <path
                                    d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z">
                                </path>
                                <path d="M20 3v4"></path>
                                <path d="M22 5h-4"></path>
                                <path d="M4 17v2"></path>
                                <path d="M5 18H3"></path>
                            </svg>
                        </div>
                        <div
                            class="inline-block bg-orange-primary/10 text-orange-primary px-4 py-1 rounded-full text-sm font-bold mb-4 mt-6">
                            2018</div>
                        <h3 class="text-2xl font-bold text-title mb-3">The Beginning</h3>
                        <p class="text-body-text leading-relaxed">Started with a vision to make travel
                            accessible and memorable for everyone across India.</p>
                        <div class="hidden md:block absolute top-1/2 -translate-y-1/2 w-4 h-4 bg-orange-primary rounded-full border-4 border-white shadow-lg"
                            style="right: -2.5rem;"></div>
                    </div>
                </div>
            </div>
            <div class="relative mb-16 md:mb-24 md:pl-1/2">
                <div class="md:w-1/2 md:ml-auto">
                    <div class="bg-white rounded-2xl p-8 shadow-xl border border-orange-primary/10 relative">
                        <div
                            class="absolute -top-6 left-8 bg-gradient-to-br from-orange-primary to-yellow-accent p-4 rounded-2xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-trending-up h-6 w-6 text-white">
                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                <polyline points="16 7 22 7 22 13"></polyline>
                            </svg>
                        </div>
                        <div
                            class="inline-block bg-orange-primary/10 text-orange-primary px-4 py-1 rounded-full text-sm font-bold mb-4 mt-6">
                            2019</div>
                        <h3 class="text-2xl font-bold text-title mb-3">Rapid Growth</h3>
                        <p class="text-body-text leading-relaxed">Expanded to 50+ destinations and built a
                            team of passionate travel experts.</p>
                        <div class="hidden md:block absolute top-1/2 -translate-y-1/2 w-4 h-4 bg-orange-primary rounded-full border-4 border-white shadow-lg"
                            style="left: -2.5rem;"></div>
                    </div>
                </div>
            </div>
            <div class="relative mb-16 md:mb-24 md:pr-1/2">
                <div class="md:w-1/2 md:ml-0">
                    <div class="bg-white rounded-2xl p-8 shadow-xl border border-orange-primary/10 relative">
                        <div
                            class="absolute -top-6 left-8 bg-gradient-to-br from-orange-primary to-yellow-accent p-4 rounded-2xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart h-6 w-6 text-white">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </div>
                        <div
                            class="inline-block bg-orange-primary/10 text-orange-primary px-4 py-1 rounded-full text-sm font-bold mb-4 mt-6">
                            2021</div>
                        <h3 class="text-2xl font-bold text-title mb-3">Customer Trust</h3>
                        <p class="text-body-text leading-relaxed">Achieved 1000+ happy travelers milestone
                            and 4.8-star average rating.</p>
                        <div class="hidden md:block absolute top-1/2 -translate-y-1/2 w-4 h-4 bg-orange-primary rounded-full border-4 border-white shadow-lg"
                            style="right: -2.5rem;"></div>
                    </div>
                </div>
            </div>
            <div class="relative mb-16 md:mb-24 md:pl-1/2">
                <div class="md:w-1/2 md:ml-auto">
                    <div class="bg-white rounded-2xl p-8 shadow-xl border border-orange-primary/10 relative">
                        <div
                            class="absolute -top-6 left-8 bg-gradient-to-br from-orange-primary to-yellow-accent p-4 rounded-2xl shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-award h-6 w-6 text-white">
                                <path
                                    d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526">
                                </path>
                                <circle cx="12" cy="8" r="6"></circle>
                            </svg>
                        </div>
                        <div
                            class="inline-block bg-orange-primary/10 text-orange-primary px-4 py-1 rounded-full text-sm font-bold mb-4 mt-6">
                            2024</div>
                        <h3 class="text-2xl font-bold text-title mb-3">Industry Leader</h3>
                        <p class="text-body-text leading-relaxed">Now serving 100+ destinations with
                            cutting-edge booking technology and personalized experiences.</p>
                        <div class="hidden md:block absolute top-1/2 -translate-y-1/2 w-4 h-4 bg-orange-primary rounded-full border-4 border-white shadow-lg"
                            style="left: -2.5rem;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-24 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-title mb-4">Our Core Values</h2>
            <p class="text-lg text-body-text max-w-2xl mx-auto">The principles that guide every decision we
                make and every experience we create</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-orange-primary/10 text-center group">
                <div
                    class="bg-gradient-to-br from-orange-primary to-yellow-accent w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-heart h-8 w-8 text-white">
                        <path
                            d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-title mb-3">Passion for Travel</h3>
                <p class="text-body-text leading-relaxed">We live and breathe travel, bringing enthusiasm to
                    every journey we curate.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-orange-primary/10 text-center group">
                <div
                    class="bg-gradient-to-br from-orange-primary to-yellow-accent w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-shield h-8 w-8 text-white">
                        <path
                            d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-title mb-3">Trust &amp; Safety</h3>
                <p class="text-body-text leading-relaxed">Your safety and satisfaction are our top
                    priorities in every adventure.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-orange-primary/10 text-center group">
                <div
                    class="bg-gradient-to-br from-orange-primary to-yellow-accent w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-users h-8 w-8 text-white">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-title mb-3">Customer First</h3>
                <p class="text-body-text leading-relaxed">Personalized experiences tailored to make your
                    dreams come true.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg border border-orange-primary/10 text-center group">
                <div
                    class="bg-gradient-to-br from-orange-primary to-yellow-accent w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-globe h-8 w-8 text-white">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                        <path d="M2 12h20"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-title mb-3">Sustainable Tourism</h3>
                <p class="text-body-text leading-relaxed">Promoting responsible travel that benefits local
                    communities and environment.</p>
            </div>
        </div>
    </div>
</section>
<section class="py-24 px-4 md:px-8 bg-gradient-to-b from-orange-primary/5 to-transparent">
    <div class="max-w-7xl mx-auto text-center">
        <div>
            <h2 class="text-4xl md:text-5xl font-bold text-title mb-6">Powered by Passionate People</h2>
            <p class="text-lg text-body-text max-w-3xl mx-auto mb-12">Our team of travel experts, local
                guides, and customer support specialists work tirelessly to ensure your journey is seamless
                from start to finish.</p><button
                class="bg-gradient-to-r from-orange-primary to-orange-primary/90 text-white px-8 py-4 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all"
                tabindex="0">Join Our Team</button>
        </div>
    </div>
</section>

@endsection