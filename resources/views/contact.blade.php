@extends('layouts.app')

@section('title', 'Contact - Best Tour Packages')
@section('meta_description', 'Get in touch with us for any inquiries about our tour packages')

@section('content')

<!-- Hero Section -->
<section
    class="relative py-32 px-4 md:px-8 overflow-hidden"
    style="">
    
    <!-- Animated Background Orbs -->
    <div class="absolute top-20 right-20 w-72 h-72 rounded-full blur-3xl"
        style="background: rgba(255, 107, 53, 0.2); transform: translateX(-2.80074px) translateY(-5.60147px);"></div>
    <div class="absolute bottom-20 left-20 w-96 h-96 rounded-full blur-3xl"
        style="background: rgba(255, 201, 71, 0.2); transform: translateX(1.16221px) translateY(2.32442px);"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto text-center">
        <div style="opacity: 1; transform: none;">
            <span class="inline-block text-sm font-semibold tracking-widest uppercase mb-4"
                  style="color: hsl(27, 98%, 48%);">Get In Touch</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-bold mb-6" style="color: hsl(24, 33%, 5%);">We'd Love to<br>
            <span style="background: linear-gradient(90deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                Hear From You
            </span>
        </h1>
        <p class="text-xl max-w-2xl mx-auto" style="opacity: 1; transform: none; color: hsl(0, 0%, 47%);">
            Have questions about our tours? Need help planning your dream vacation? Our travel experts are here to assist you.
        </p>
    </div>
</section>

<!-- Info Cards Section -->
<section class="py-16 px-4 md:px-8 -mt-16 relative z-20">
    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Call Us Card -->
            <div class="bg-white rounded-2xl p-6 shadow-xl" style="border: 1px solid rgba(255, 107, 53, 0.1); opacity: 1; transform: none;">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4 shadow-lg"
                     style="background: linear-gradient(135deg, hsl(27, 98%, 48%) 0%, rgba(255, 107, 53, 0.8) 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3" style="color: hsl(24, 33%, 5%);">Call Us</h3>
                <p class="text-sm" style="color: hsl(0, 0%, 47%);">+91 9910141081</p>
                <p class="text-sm" style="color: hsl(0, 0%, 47%);">+91 98765 43211</p>
            </div>

            <!-- Email Us Card -->
            <div class="bg-white rounded-2xl p-6 shadow-xl" style="border: 1px solid rgba(255, 107, 53, 0.1); opacity: 1; transform: none;">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4 shadow-lg"
                     style="background: linear-gradient(135deg, hsl(40, 96%, 61%) 0%, rgba(255, 201, 71, 0.8) 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3" style="color: hsl(24, 33%, 5%);">Email Us</h3>
                <p class="text-sm" style="color: hsl(0, 0%, 47%);">info@ppthetraveller.com</p>
                <p class="text-sm" style="color: hsl(0, 0%, 47%);">support@ppthetraveller.com</p>
            </div>

            <!-- Visit Us Card -->
            <div class="bg-white rounded-2xl p-6 shadow-xl" style="border: 1px solid rgba(255, 107, 53, 0.1); opacity: 1; transform: none;">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4 shadow-lg"
                     style="background: linear-gradient(135deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3" style="color: hsl(24, 33%, 5%);">Visit Us</h3>
                <p class="text-sm" style="color: hsl(0, 0%, 47%);">Romillie Villa, Upper Lumpynggad</p>
                <p class="text-sm" style="color: hsl(0, 0%, 47%);">Shillong, Meghalaya 793014</p>
            </div>

            <!-- Working Hours Card -->
            <div class="bg-white rounded-2xl p-6 shadow-xl" style="border: 1px solid rgba(255, 107, 53, 0.1); opacity: 1; transform: none;">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4 shadow-lg"
                     style="background: linear-gradient(135deg, hsl(40, 96%, 61%) 0%, hsl(27, 98%, 48%) 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h3 class="text-lg font-bold mb-3" style="color: hsl(24, 33%, 5%);">Working Hours</h3>
                <p class="text-sm" style="color: hsl(0, 0%, 47%);">Mon - Sat: 9AM - 8PM</p>
                <p class="text-sm" style="color: hsl(0, 0%, 47%);">Sunday: 10AM - 6PM</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Contact Section -->
<section class="py-24 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-5 gap-12">
            
            <!-- Contact Form -->
            <div class="lg:col-span-3" style="opacity: 1; transform: none;">
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl" style="border: 1px solid rgba(255, 107, 53, 0.1);">
                    <div class="flex items-center gap-3 mb-8">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8" style="color: hsl(27, 98%, 48%);">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <h2 class="text-3xl font-bold" style="color: hsl(24, 33%, 5%);">Send Us a Message</h2>
                    </div>

                    <form class="space-y-6" @submit.prevent="submitContactForm()" x-data="contactForm()">
                        
                        <!-- Name and Email Row -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-semibold" style="color: hsl(24, 33%, 5%);">Full Name *</label>
                                <input x-model="form.name" type="text" placeholder="John Doe" required
                                    class="w-full px-4 py-3 h-12 border-2 rounded-xl focus:outline-none transition-all"
                                    style="border-color: #e5e7eb; color: hsl(24, 33%, 5%);"
                                    @focus="$el.style.borderColor = 'hsl(27, 98%, 48%)'"
                                    @blur="$el.style.borderColor = '#e5e7eb'" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-semibold" style="color: hsl(24, 33%, 5%);">Email Address *</label>
                                <input x-model="form.email" type="email" placeholder="john@example.com" required
                                    class="w-full px-4 py-3 h-12 border-2 rounded-xl focus:outline-none transition-all"
                                    style="border-color: #e5e7eb; color: hsl(24, 33%, 5%);"
                                    @focus="$el.style.borderColor = 'hsl(27, 98%, 48%)'"
                                    @blur="$el.style.borderColor = '#e5e7eb'" />
                            </div>
                        </div>

                        <!-- Phone and Subject Row -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-semibold" style="color: hsl(24, 33%, 5%);">Phone Number</label>
                                <input x-model="form.phone" type="tel" placeholder="+91 98765 43210"
                                    class="w-full px-4 py-3 h-12 border-2 rounded-xl focus:outline-none transition-all"
                                    style="border-color: #e5e7eb; color: hsl(24, 33%, 5%);"
                                    @focus="$el.style.borderColor = 'hsl(27, 98%, 48%)'"
                                    @blur="$el.style.borderColor = '#e5e7eb'" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-semibold" style="color: hsl(24, 33%, 5%);">Subject *</label>
                                <input x-model="form.subject" type="text" placeholder="Tour Inquiry" required
                                    class="w-full px-4 py-3 h-12 border-2 rounded-xl focus:outline-none transition-all"
                                    style="border-color: #e5e7eb; color: hsl(24, 33%, 5%);"
                                    @focus="$el.style.borderColor = 'hsl(27, 98%, 48%)'"
                                    @blur="$el.style.borderColor = '#e5e7eb'" />
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold" style="color: hsl(24, 33%, 5%);">Message *</label>
                            <textarea x-model="form.message" placeholder="Tell us about your dream vacation..." required rows="6"
                                class="w-full px-4 py-3 border-2 rounded-xl focus:outline-none transition-all resize-none"
                                style="border-color: #e5e7eb; color: hsl(24, 33%, 5%);"
                                @focus="$el.style.borderColor = 'hsl(27, 98%, 48%)'"
                                @blur="$el.style.borderColor = '#e5e7eb'"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" :disabled="isSubmitting"
                            class="w-full h-14 rounded-xl text-lg font-semibold text-white shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2"
                            style="background: linear-gradient(90deg, hsl(27, 98%, 48%) 0%, rgba(255, 107, 53, 0.9) 100%);">
                            <svg x-show="!isSubmitting" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                                <path d="m21.854 2.147-10.94 10.939"></path>
                            </svg>
                            <span x-show="!isSubmitting">Send Message</span>
                            <span x-show="isSubmitting">Sending...</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="lg:col-span-2 space-y-8" style="opacity: 1; transform: none;">
                
                <!-- Live Chat Card -->
                <div class="rounded-3xl p-8 text-white shadow-xl" style="background: linear-gradient(135deg, hsl(27, 98%, 48%) 0%, rgba(255, 107, 53, 0.9) 100%);">
                    <h3 class="text-2xl font-bold mb-4">Need Quick Help?</h3>
                    <p class="mb-6" style="color: rgba(255, 255, 255, 0.9);">Chat with our travel experts instantly and get answers to all your questions.</p>
                    <button class="w-full px-6 py-3 rounded-xl font-semibold transition-all hover:opacity-90"
                            style="background: white; color: hsl(27, 98%, 48%);">Start Live Chat</button>
                </div>

                <!-- FAQ Card -->
                <div class="bg-white rounded-3xl p-8 shadow-xl" style="border: 1px solid rgba(255, 107, 53, 0.1);">
                    <h3 class="text-xl font-bold mb-3" style="color: hsl(24, 33%, 5%);">Frequently Asked Questions</h3>
                    <p class="mb-6" style="color: hsl(0, 0%, 47%);">Find answers to common questions about our tours, bookings, and policies.</p>
                    <button class="font-semibold transition-all hover:opacity-70" style="color: hsl(27, 98%, 48%);">View FAQs →</button>
                </div>

                <!-- Social Links Card -->
                <div class="rounded-3xl p-8" style="background: linear-gradient(135deg, rgba(255, 201, 71, 0.1) 0%, rgba(255, 107, 53, 0.1) 100%); border: 1px solid rgba(255, 107, 53, 0.1);">
                    <h3 class="text-xl font-bold mb-4" style="color: hsl(24, 33%, 5%);">Follow Us</h3>
                    <p class="mb-6" style="color: hsl(0, 0%, 47%);">Stay connected for travel inspiration, tips, and exclusive offers.</p>
                    <div class="flex gap-4">
                        <a href="#" class="w-12 h-12 rounded-xl flex items-center justify-center text-white shadow-lg hover:shadow-xl transition-all"
                           style="background: linear-gradient(135deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-xl flex items-center justify-center text-white shadow-lg hover:shadow-xl transition-all"
                           style="background: linear-gradient(135deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-xl flex items-center justify-center text-white shadow-lg hover:shadow-xl transition-all"
                           style="background: linear-gradient(135deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                            </svg>
                        </a>
                        <a href="#" class="w-12 h-12 rounded-xl flex items-center justify-center text-white shadow-lg hover:shadow-xl transition-all"
                           style="background: linear-gradient(135deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect width="4" height="12" x="2" y="9"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-16 px-4 md:px-8" style="background: linear-gradient(180deg, rgba(255, 107, 53, 0.05) 0%, transparent 100%);">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-3xl overflow-hidden shadow-xl" style="border: 1px solid rgba(255, 107, 53, 0.1); opacity: 1; transform: none;">
            <div class="aspect-[21/9] flex items-center justify-center" style="background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-16 w-16 mx-auto mb-4" style="color: hsl(27, 98%, 48%);">
                        <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <p class="text-lg font-semibold" style="color: hsl(24, 33%, 5%);">Interactive Map</p>
                    <p style="color: hsl(0, 0%, 47%);">Shillong, Meghalaya, India</p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('contactForm', () => ({
            isSubmitting: false,
            form: {
                name: '',
                email: '',
                phone: '',
                subject: '',
                message: '',
            },

            async submitContactForm() {
                if (this.isSubmitting) return;
                
                this.isSubmitting = true;
                try {
                    const response = await fetch('/api/contact', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify(this.form),
                    });

                    if (response.ok) {
                        alert('Message sent successfully! We\'ll get back to you soon.');
                        this.form = {
                            name: '',
                            email: '',
                            phone: '',
                            subject: '',
                            message: ''
                        };
                    } else {
                        alert('Error sending message. Please try again.');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Network error. Please try again.');
                } finally {
                    this.isSubmitting = false;
                }
            }
        }));
    });
</script>
@endpush

@endsection