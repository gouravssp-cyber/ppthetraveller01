<footer class="bg-gradient-to-b from-slate-900 to-black text-white mt-20">
    <!-- Newsletter Section -->
    <div class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 md:px-8 py-16">
            <div class="max-w-2xl mx-auto text-center" data-aos="fade-up">
                <h3 class="text-3xl md:text-4xl font-bold mb-4 bg-gradient-to-r from-[hsl(40,96%,61%)] via-[hsl(27,98%,48%)] to-[hsl(40,96%,61%)] bg-clip-text text-transparent">
                    Stay Updated
                </h3>
                <p class="text-white/70 mb-6">
                    Subscribe to our newsletter for exclusive deals, travel tips, and destination guides
                </p>
                <form @submit.prevent="subscribeNewsletter()" class="flex gap-2 max-w-md mx-auto" x-data="newsletterForm()">
                    <input
                        x-model="email"
                        type="email"
                        placeholder="Enter your email"
                        class="flex w-full border px-3 py-2 text-base bg-white/10 border-white/20 text-white placeholder:text-white/50 h-12 rounded-xl focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange-primary"
                        required
                    />
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium bg-gradient-to-r from-orange-primary to-orange-primary/90 hover:from-orange-primary/90 hover:to-orange-primary px-6 h-12 rounded-xl text-white transition-all"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send h-4 w-4">
                            <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                            <path d="m21.854 2.147-10.94 10.939"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-4 md:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Brand Section -->
            <div data-aos="fade-up">
                <h3 class="text-2xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-orange-primary to-yellow-accent bg-clip-text text-transparent">PP</span><span>The Traveller</span>
                </h3>
                <p class="text-white/70 text-sm leading-relaxed mb-6">
                    Discover the beauty of India with expertly curated tour packages designed for every traveler. Experience unforgettable journeys across India's most stunning destinations.
                </p>
                <div class="flex gap-3">
                    <a href="https://facebook.com/ppthetraveller" class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center text-white hover:bg-gradient-to-br hover:from-orange-primary hover:to-yellow-accent transition-all duration-300 border border-white/10" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook h-4 w-4">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                    </a>
                    <a href="https://instagram.com/ppthetraveller" class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center text-white hover:bg-gradient-to-br hover:from-orange-primary hover:to-yellow-accent transition-all duration-300 border border-white/10" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram h-4 w-4">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="https://twitter.com/ppthetraveller" class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center text-white hover:bg-gradient-to-br hover:from-orange-primary hover:to-yellow-accent transition-all duration-300 border border-white/10" aria-label="Twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter h-4 w-4">
                            <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                        </svg>
                    </a>
                    <a href="https://youtube.com/@ppthetraveller" class="w-10 h-10 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center text-white hover:bg-gradient-to-br hover:from-orange-primary hover:to-yellow-accent transition-all duration-300 border border-white/10" aria-label="YouTube">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube h-4 w-4">
                            <path d="M2.5 17a24.12 24.12 0 0 1 0-10"></path>
                            <path d="M6 5.5a1.5 1.5 0 0 1 2.96-.5"></path>
                            <path d="M10.5 5v3.5"></path>
                            <path d="M14.5 5a1.5 1.5 0 0 1 2.96.5"></path>
                            <path d="M18 5.5v9"></path>
                            <path d="M2.5 12.5h19"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Important Links -->
            <div data-aos="fade-up" data-aos-delay="100">
                <h4 class="font-semibold text-lg mb-4 text-white">Important Links</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="/about" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>About Us
                        </a>
                    </li>
                    <li>
                        <a href="/international" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>International Tours
                        </a>
                    </li>
                    <li>
                        <a href="/vlog" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>Vlog
                        </a>
                    </li>
                    <li>
                        <a href="/vehicle" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>Our Vehicles
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>Contact
                        </a>
                    </li>
                    <li>
                        <a href="/our-locations" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>Our Locations
                        </a>
                    </li>
                    <li>
                        <a href="/sitemap" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>Sitemap
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Popular Tours (Note: Add popular packages here later) -->
            <div data-aos="fade-up" data-aos-delay="200">
                <h4 class="font-semibold text-lg mb-4 text-white">Popular Tours</h4>
                <ul class="space-y-3">
                    <li>
                        <a href="/tours/shillong" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>Shillong Tour Package
                        </a>
                    </li>
                    <li>
                        <a href="/tours/meghalaya" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>Meghalaya Tour Package
                        </a>
                    </li>
                    <li>
                        <a href="/tour-operator/shillong" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>Tour Operator Shillong
                        </a>
                    </li>
                    <li>
                        <a href="/honeymoon-packages" class="text-white/70 hover:text-orange-primary transition-colors duration-300 text-sm inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-orange-primary transition-all duration-300 mr-0 group-hover:mr-2"></span>Honeymoon Packages
                        </a>
                    </li>
                    <!-- TODO: Add more popular tours dynamically -->
                </ul>
            </div>

            <!-- Contact Section -->
            <div data-aos="fade-up" data-aos-delay="300">
                <h4 class="font-semibold text-lg mb-4 text-white">Contact Us</h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-white/70 text-sm group hover:text-white transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-orange-primary/20 flex items-center justify-center flex-shrink-0 group-hover:bg-orange-primary/30 transition-colors mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-4 w-4 text-orange-primary">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <a href="https://maps.google.com/?q=Romillie+Villa+Upper+Lumpynggad+Moti+Nagar+Shillong" class="pt-1" target="_blank">Romillie Villa, Upper Lumpynggad, Moti Nagar, Shillong, Meghalaya 793014</a>
                    </li>
                    <li class="flex items-start gap-3 text-white/70 text-sm group hover:text-white transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-orange-primary/20 flex items-center justify-center flex-shrink-0 group-hover:bg-orange-primary/30 transition-colors mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone h-4 w-4 text-orange-primary">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <a href="tel:+919910141081" class="pt-1">+91 9910141081</a>
                    </li>
                    <li class="flex items-start gap-3 text-white/70 text-sm group hover:text-white transition-colors">
                        <div class="w-8 h-8 rounded-lg bg-orange-primary/20 flex items-center justify-center flex-shrink-0 group-hover:bg-orange-primary/30 transition-colors mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail h-4 w-4 text-orange-primary">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </div>
                        <div class="pt-1 space-y-1">
                            <p><a href="mailto:b2b@ppthetraveller.com" class="hover:text-orange-primary">B2B: b2b@ppthetraveller.com</a></p>
                            <p><a href="mailto:info@ppthetraveller.com" class="hover:text-orange-primary">Info: info@ppthetraveller.com</a></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="mt-12 pt-8 border-t border-white/10" data-aos="fade-up">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-white/60 text-sm">
                    © 2025 PP The Traveller. All rights reserved.
                </p>
                <div class="flex gap-6 text-sm">
                    <a href="/privacy-policy" class="text-white/60 hover:text-orange-primary transition-colors">Privacy Policy</a>
                    <a href="/terms-of-service" class="text-white/60 hover:text-orange-primary transition-colors">Terms of Service</a>
                    <a href="/cookie-policy" class="text-white/60 hover:text-orange-primary transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('newsletterForm', () => ({
            email: '',
            
            async subscribeNewsletter() {
                try {
                    const response = await fetch('/api/newsletter/subscribe', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify({ email: this.email }),
                    });

                    if (response.ok) {
                        alert('Successfully subscribed!');
                        this.email = '';
                    }
                } catch (error) {
                    console.error('Subscription error:', error);
                }
            }
        }));
    });
</script>
@endpush
