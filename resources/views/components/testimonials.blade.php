<section class="py-24 px-4 md:px-8" style="background-color: hsl(var(--background))" data-aos="fade-up">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-semibold mb-6" style="background-color: hsl(var(--orange-primary) / 0.1); color: hsl(var(--orange-primary))">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                Google Reviews
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-4" style="color: hsl(var(--title))">
                What Our Travelers Say
            </h2>
            <p class="text-lg max-w-2xl mx-auto" style="color: hsl(var(--body-text))">
                Real reviews from real travelers on Google
            </p>
        </div>

        <!-- 3 Review Cards -->
        <div class="grid md:grid-cols-3 gap-8">
            @php
                $reviews = [
                    [
                        'name' => 'Priya Sharma',
                        'rating' => 5,
                        'review' => 'The Kashmir tour was absolutely breathtaking! Every moment was perfectly planned, from the stunning Shikara rides on Dal Lake to the luxury houseboat stays. PP The Traveller made our honeymoon unforgettable!',
                        'initials' => 'PS'
                    ],
                    [
                        'name' => 'Rajesh Kumar',
                        'rating' => 5,
                        'review' => 'An incredible 7-day journey through Rajasthan! The guides were knowledgeable, accommodations were fantastic, and every moment felt magical. Highly recommend PP The Traveller for anyone wanting premium experience.',
                        'initials' => 'RK'
                    ],
                    [
                        'name' => 'Anjali Patel',
                        'rating' => 5,
                        'review' => 'Truly a paradise! The Kerala backwaters tour was so relaxing and rejuvenating. The houseboats, local cuisine, and serene landscapes exceeded all expectations. Can\'t wait to book another trip!',
                        'initials' => 'AP'
                    ]
                ];
            @endphp

            @foreach($reviews as $review)
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all border" style="border-color: hsl(var(--orange-primary) / 0.1)" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <!-- Header with User & Google Icon -->
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex items-center gap-4">
                            <!-- User Avatar SVG -->
                            <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background: linear-gradient(135deg, hsl(var(--orange-primary)), hsl(var(--yellow-accent)))">
                                {{ $review['initials'] }}
                            </div>
                            <!-- Name -->
                            <div>
                                <p class="font-semibold text-lg" style="color: hsl(var(--title))">
                                    {{ $review['name'] }}
                                </p>
                                <p style="color: hsl(var(--body-text))" class="text-xs">Google Review</p>
                            </div>
                        </div>
                        <!-- Google Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-6 w-6">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"></path>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"></path>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"></path>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"></path>
                        </svg>
                    </div>

                    <!-- Stars Rating -->
                    <div class="flex gap-1 mb-4">
                        @for($i = 0; $i < $review['rating']; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4" style="color: hsl(var(--yellow-accent))">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                        @endfor
                    </div>

                    <!-- Review Text -->
                    <p class="leading-relaxed mb-6 line-clamp-4" style="color: hsl(var(--body-text))">
                        "{{ $review['review'] }}"
                    </p>

                    <!-- View More Link -->
                    <a href="#" class="inline-flex items-center gap-2 font-semibold text-sm" style="color: hsl(var(--orange-primary))">
                        Read Full Review
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- View All Reviews Button -->
        <div class="text-center mt-12">
            <a href="https://www.google.com/search?q=ppthetraveller" target="_blank" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl font-semibold text-white shadow-lg hover:shadow-xl transition-all" style="background: linear-gradient(to right, hsl(var(--orange-primary)), hsl(var(--orange-primary) / 0.9))">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5">
                    <path fill="white" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"></path>
                    <path fill="white" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"></path>
                    <path fill="white" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"></path>
                    <path fill="white" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"></path>
                </svg>
                View All Reviews on Google
            </a>
        </div>
    </div>
</section>
