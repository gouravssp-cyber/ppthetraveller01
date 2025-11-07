@extends('layouts.app')

@section('title', 'Contact - Best Tour Packages')
@section('meta_description', 'Get in touch with us for any inquiries about our tour packages')

@section('content')

<section
    class="relative py-32 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-orange-primary/10 via-yellow-accent/10 to-orange-primary/10">
    <div class="absolute top-20 right-20 w-72 h-72 bg-orange-primary/20 rounded-full blur-3xl"
        style="transform: translateX(-2.80074px) translateY(-5.60147px);"></div>
    <div class="absolute bottom-20 left-20 w-96 h-96 bg-yellow-accent/20 rounded-full blur-3xl"
        style="transform: translateX(1.16221px) translateY(2.32442px);"></div>
    <div class="relative z-10 max-w-7xl mx-auto text-center">
        <div style="opacity: 1; transform: none;"><span
                class="inline-block text-orange-primary text-sm font-semibold tracking-widest uppercase mb-4">Get In
                Touch</span></div>
        <h1 class="text-5xl md:text-7xl font-bold text-title mb-6" style="opacity: 1; transform: none;">We'd Love
            to<br><span class="bg-gradient-to-r from-orange-primary to-yellow-accent bg-clip-text text-transparent">Hear
                From You</span></h1>
        <p class="text-xl text-body-text max-w-2xl mx-auto" style="opacity: 1; transform: none;">Have questions about
            our tours? Need help planning your dream vacation? Our travel experts are here to assist you.</p>
    </div>
</section>



<section class="py-16 px-4 md:px-8 -mt-16 relative z-20">
    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-orange-primary/10"
                style="opacity: 1; transform: none;">
                <div
                    class="bg-gradient-to-br from-orange-primary to-orange-primary/80 w-14 h-14 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-phone h-7 w-7 text-white">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-title mb-3">Call Us</h3>
                <p class="text-body-text text-sm">+91 98765 43210</p>
                <p class="text-body-text text-sm">+91 98765 43211</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-orange-primary/10"
                style="opacity: 1; transform: none;">
                <div
                    class="bg-gradient-to-br from-yellow-accent to-yellow-accent/80 w-14 h-14 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-mail h-7 w-7 text-white">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-title mb-3">Email Us</h3>
                <p class="text-body-text text-sm">info@wanderflow.com</p>
                <p class="text-body-text text-sm">support@wanderflow.com</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-orange-primary/10"
                style="opacity: 1; transform: none;">
                <div
                    class="bg-gradient-to-br from-orange-primary to-yellow-accent w-14 h-14 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-map-pin h-7 w-7 text-white">
                        <path
                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                        </path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-title mb-3">Visit Us</h3>
                <p class="text-body-text text-sm">123 Travel Street</p>
                <p class="text-body-text text-sm">New Delhi, India 110001</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-xl border border-orange-primary/10"
                style="opacity: 1; transform: none;">
                <div
                    class="bg-gradient-to-br from-yellow-accent to-orange-primary w-14 h-14 rounded-xl flex items-center justify-center mb-4 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-clock h-7 w-7 text-white">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-title mb-3">Working Hours</h3>
                <p class="text-body-text text-sm">Mon - Sat: 9AM - 8PM</p>
                <p class="text-body-text text-sm">Sunday: 10AM - 6PM</p>
            </div>
        </div>
    </div>
</section>



<section class="py-24 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-5 gap-12">
            <div class="lg:col-span-3" style="opacity: 1; transform: none;">
                <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl border border-orange-primary/10">
                    <div class="flex items-center gap-3 mb-8"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-message-square h-8 w-8 text-orange-primary">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <h2 class="text-3xl font-bold text-title">Send Us a Message</h2>
                    </div>
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2"><label
                                    class="peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-sm font-semibold text-title"
                                    for="name">Full Name *</label><input
                                    class="flex w-full bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm h-12 border-2 border-gray-200 focus:border-orange-primary rounded-xl"
                                    id="name" placeholder="John Doe" required="" value=""></div>
                            <div class="space-y-2"><label
                                    class="peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-sm font-semibold text-title"
                                    for="email">Email Address *</label><input type="email"
                                    class="flex w-full bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm h-12 border-2 border-gray-200 focus:border-orange-primary rounded-xl"
                                    id="email" placeholder="john@example.com" required="" value=""></div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="space-y-2"><label
                                    class="peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-sm font-semibold text-title"
                                    for="phone">Phone Number</label><input type="tel"
                                    class="flex w-full bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm h-12 border-2 border-gray-200 focus:border-orange-primary rounded-xl"
                                    id="phone" placeholder="+91 98765 43210" value=""></div>
                            <div class="space-y-2"><label
                                    class="peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-sm font-semibold text-title"
                                    for="subject">Subject *</label><input
                                    class="flex w-full bg-background px-3 py-2 text-base ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 md:text-sm h-12 border-2 border-gray-200 focus:border-orange-primary rounded-xl"
                                    id="subject" placeholder="Tour Inquiry" required="" value=""></div>
                        </div>
                        <div class="space-y-2"><label
                                class="peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-sm font-semibold text-title"
                                for="message">Message *</label><textarea
                                class="flex min-h-[80px] w-full bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-2 border-gray-200 focus:border-orange-primary rounded-xl resize-none"
                                id="message" placeholder="Tell us about your dream vacation..." required=""
                                rows="6"></textarea></div>
                        <div tabindex="0"><button
                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-primary hover:bg-primary/90 px-4 py-2 w-full bg-gradient-to-r from-orange-primary to-orange-primary/90 hover:from-orange-primary/90 hover:to-orange-primary text-white h-14 rounded-xl text-lg font-semibold shadow-lg hover:shadow-xl transition-all"
                                type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-send mr-2 h-5 w-5">
                                    <path
                                        d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z">
                                    </path>
                                    <path d="m21.854 2.147-10.94 10.939"></path>
                                </svg>Send Message</button></div>
                    </form>
                </div>
            </div>
            <div class="lg:col-span-2 space-y-8" style="opacity: 1; transform: none;">
                <div
                    class="bg-gradient-to-br from-orange-primary to-orange-primary/90 rounded-3xl p-8 text-white shadow-xl">
                    <h3 class="text-2xl font-bold mb-4">Need Quick Help?</h3>
                    <p class="mb-6 text-white/90">Chat with our travel experts instantly and get answers to all your
                        questions.</p><button
                        class="w-full bg-white text-orange-primary px-6 py-3 rounded-xl font-semibold hover:bg-white/90 transition-all shadow-lg"
                        tabindex="0">Start Live Chat</button>
                </div>
                <div class="bg-white rounded-3xl p-8 shadow-xl border border-orange-primary/10">
                    <h3 class="text-xl font-bold text-title mb-3">Frequently Asked Questions</h3>
                    <p class="text-body-text mb-6">Find answers to common questions about our tours, bookings, and
                        policies.</p><button class="text-orange-primary font-semibold hover:underline" tabindex="0">View
                        FAQs →</button>
                </div>
                <div
                    class="bg-gradient-to-br from-yellow-accent/10 to-orange-primary/10 rounded-3xl p-8 border border-orange-primary/10">
                    <h3 class="text-xl font-bold text-title mb-4">Follow Us</h3>
                    <p class="text-body-text mb-6">Stay connected for travel inspiration, tips, and exclusive offers.
                    </p>
                    <div class="flex gap-4"><a href="#"
                            class="bg-gradient-to-br from-orange-primary to-yellow-accent w-12 h-12 rounded-xl flex items-center justify-center text-white shadow-lg hover:shadow-xl transition-all"
                            aria-label="Facebook" tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook h-5 w-5">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg></a><a href="#"
                            class="bg-gradient-to-br from-orange-primary to-yellow-accent w-12 h-12 rounded-xl flex items-center justify-center text-white shadow-lg hover:shadow-xl transition-all"
                            aria-label="Instagram" tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram h-5 w-5">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                            </svg></a><a href="#"
                            class="bg-gradient-to-br from-orange-primary to-yellow-accent w-12 h-12 rounded-xl flex items-center justify-center text-white shadow-lg hover:shadow-xl transition-all"
                            aria-label="Twitter" tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter h-5 w-5">
                                <path
                                    d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z">
                                </path>
                            </svg></a><a href="#"
                            class="bg-gradient-to-br from-orange-primary to-yellow-accent w-12 h-12 rounded-xl flex items-center justify-center text-white shadow-lg hover:shadow-xl transition-all"
                            aria-label="LinkedIn" tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin h-5 w-5">
                                <path
                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                </path>
                                <rect width="4" height="12" x="2" y="9"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg></a></div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-16 px-4 md:px-8 bg-gradient-to-b from-orange-primary/5 to-transparent">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-3xl overflow-hidden shadow-xl border border-orange-primary/10"
            style="opacity: 1; transform: none;">
            <div class="aspect-[21/9] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                <div class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-map-pin h-16 w-16 text-orange-primary mx-auto mb-4">
                        <path
                            d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                        </path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                    <p class="text-lg text-title font-semibold">Interactive Map</p>
                    <p class="text-body-text">123 Travel Street, New Delhi, India</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection