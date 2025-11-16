
<section
    id="contact"
    class="py-24 px-4 md:px-8 relative overflow-hidden"
    style="background: linear-gradient(135deg, #F8FAFC 0%, #FFF9F5 50%, #FFFBF7 100%)"
    data-aos="fade-up">
    
    <!-- Animated Background Orbs -->
    <div class="absolute inset-0 opacity-5 pointer-events-none">
        <div class="absolute top-20 left-10 w-96 h-96 bg-orange-primary rounded-full blur-3xl"
             style="animation: float 8s ease-in-out infinite;"></div>
        <div class="absolute bottom-10 right-20 w-96 h-96 bg-yellow-400 rounded-full blur-3xl"
             style="animation: float 6s ease-in-out infinite 1s;"></div>
    </div>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Smooth transitions */
        .contact-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .contact-card:hover {
            transform: translateY(-4px);
        }

        .contact-icon {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .contact-card:hover .contact-icon {
            transform: scale(1.1) rotate(5deg);
        }

        /* Input focus smooth effect */
        input:focus, textarea:focus {
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Submit button animation */
        .submit-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 0;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(255, 107, 53, 0.25) !important;
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn span, .submit-btn svg {
            position: relative;
            z-index: 1;
        }
    </style>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold mb-6"
                     style="background-color: rgba(255, 107, 53, 0.08); color: hsl(27, 98%, 48%); transition: all 0.3s ease;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="h-4 w-4">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    Get In Touch
                </div>

                <h2 class="text-4xl md:text-5xl font-bold mb-6" style="color: hsl(24, 33%, 5%)">
                    Ready to Start Your<br />
                    <span style="background: linear-gradient(90deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text">
                        Next Adventure?
                    </span>
                </h2>

                <p class="text-lg mb-8" style="color: hsl(0, 0%, 47%); line-height: 1.6;">
                    Have questions or special requests? Our travel experts are here to help you plan the perfect trip tailored to your dreams.
                </p>

                <div class="space-y-4">
                    <!-- Phone -->
                    <a href="tel:+919910141081" class="contact-card flex items-center gap-4 bg-white rounded-2xl p-5 shadow-md border transition-all"
                       style="border-color: rgba(255, 107, 53, 0.1)">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 contact-icon"
                             style="background: linear-gradient(135deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="h-6 w-6">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm" style="color: hsl(0, 0%, 47%)">Call Us</div>
                            <div class="font-semibold text-lg" style="color: hsl(24, 33%, 5%)">+91 9910141081</div>
                        </div>
                    </a>

                    <!-- Email -->
                    <a href="mailto:info@ppthetraveller.com" class="contact-card flex items-center gap-4 bg-white rounded-2xl p-5 shadow-md border transition-all"
                       style="border-color: rgba(255, 107, 53, 0.1)">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 contact-icon"
                             style="background: linear-gradient(135deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="h-6 w-6">
                                <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm" style="color: hsl(0, 0%, 47%)">Email Us</div>
                            <div class="font-semibold text-lg" style="color: hsl(24, 33%, 5%)">
                                info@ppthetraveller.com
                            </div>
                        </div>
                    </a>

                    <!-- Location -->
                    <a href="https://maps.google.com/?q=Shillong,Meghalaya" target="_blank" class="contact-card flex items-center gap-4 bg-white rounded-2xl p-5 shadow-md border transition-all"
                       style="border-color: rgba(255, 107, 53, 0.1)">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center flex-shrink-0 contact-icon"
                             style="background: linear-gradient(135deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="white" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="h-6 w-6">
                                <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div>
                            <div class="text-sm" style="color: hsl(0, 0%, 47%)">Visit Us</div>
                            <div class="font-semibold text-lg" style="color: hsl(24, 33%, 5%)">Shillong, Meghalaya</div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Right Form -->
            <div>
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-2xl border" style="border-color: rgba(255, 107, 53, 0.1); backdrop-filter: blur(10px)">
                    <form @submit.prevent="submitContactForm()" class="space-y-6" x-data="contactForm()">
                        <!-- Full Name -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold flex items-center gap-2" style="color: hsl(24, 33%, 5%)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="h-4 w-4" style="color: hsl(27, 98%, 48%)">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Full Name *
                            </label>
                            <input
                                x-model="form.name"
                                type="text"
                                placeholder="John Doe"
                                class="w-full px-4 py-3 h-12 rounded-xl border-2 transition-all"
                                style="background-color: #F8F9FA; border-color: #e5e7eb; color: hsl(24, 33%, 5%)"
                                required />
                        </div>

                        <!-- Email & Phone -->
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-sm font-semibold flex items-center gap-2" style="color: hsl(24, 33%, 5%)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="h-4 w-4" style="color: hsl(27, 98%, 48%)">
                                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                    </svg>
                                    Email *
                                </label>
                                <input
                                    x-model="form.email"
                                    type="email"
                                    placeholder="john@example.com"
                                    class="w-full px-4 py-3 h-12 rounded-xl border-2 transition-all"
                                    style="background-color: #F8F9FA; border-color: #e5e7eb; color: hsl(24, 33%, 5%)"
                                    required />
                            </div>
                            <div class="space-y-2">
                                <label class="text-sm font-semibold flex items-center gap-2" style="color: hsl(24, 33%, 5%)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="h-4 w-4" style="color: hsl(27, 98%, 48%)">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    Phone *
                                </label>
                                <input
                                    x-model="form.phone"
                                    type="tel"
                                    placeholder="+91 98765 43210"
                                    class="w-full px-4 py-3 h-12 rounded-xl border-2 transition-all"
                                    style="background-color: #F8F9FA; border-color: #e5e7eb; color: hsl(24, 33%, 5%)"
                                    required />
                            </div>
                        </div>

                        <!-- Message -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold flex items-center gap-2" style="color: hsl(24, 33%, 5%)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="h-4 w-4" style="color: hsl(27, 98%, 48%)">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                                </svg>
                                Your Message *
                            </label>
                            <textarea
                                x-model="form.message"
                                placeholder="Tell us about your dream vacation..."
                                rows="5"
                                class="w-full px-4 py-3 rounded-xl border-2 resize-none transition-all"
                                style="background-color: #F8F9FA; border-color: #e5e7eb; color: hsl(24, 33%, 5%)"
                                required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            :disabled="isSubmitting"
                            class="w-full h-14 rounded-xl text-lg font-semibold text-white shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2 submit-btn"
                            style="background: linear-gradient(90deg, hsl(27, 98%, 48%) 0%, hsl(40, 96%, 61%) 100%)">
                            <svg x-show="!isSubmitting" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                <path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path>
                                <path d="m21.854 2.147-10.94 10.939"></path>
                            </svg>
                            <span x-show="!isSubmitting">Send Message</span>
                            <span x-show="isSubmitting" class="flex items-center gap-2">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Sending...
                            </span>
                        </button>

                        <!-- Form Message -->
                        <div x-show="formMessage" x-transition
                             class="p-4 rounded-lg text-sm font-medium"
                             :class="formSuccess ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'"
                             x-text="formMessage"></div>
                    </form>
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
            formMessage: '',
            formSuccess: false,
            form: {
                name: '',
                email: '',
                phone: '',
                message: '',
            },

            async submitContactForm() {
                if (this.isSubmitting) return;
                
                this.isSubmitting = true;
                this.formMessage = '';
                
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
                        this.formSuccess = true;
                        this.formMessage = '✓ Message sent successfully! We\'ll get back to you soon.';
                        this.form = {
                            name: '',
                            email: '',
                            phone: '',
                            message: ''
                        };
                        
                        // Clear message after 5 seconds
                        setTimeout(() => {
                            this.formMessage = '';
                        }, 5000);
                    } else {
                        this.formSuccess = false;
                        this.formMessage = '✗ Error sending message. Please try again.';
                    }
                } catch (error) {
                    console.error('Error:', error);
                    this.formSuccess = false;
                    this.formMessage = '✗ Network error. Please check your connection and try again.';
                } finally {
                    this.isSubmitting = false;
                }
            }
        }));
    });
</script>
@endpush