@extends('layouts.app')

@section('title', $package->meta_title ?? $package->title)
@section('meta_description', $package->meta_description ?? $package->summary)

@section('content')
    <!-- Banner -->
    @if($package->banner_image)
        <div class="relative h-96 bg-gray-200 overflow-hidden">
            <img src="{{ asset('storage/' . $package->banner_image) }}"
                 alt="{{ $package->banner_image_alt }}"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-30"></div>

            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                <h1 class="text-5xl font-bold mb-2">{{ $package->title }}</h1>
                <p class="text-xl">📍 {{ $package->destination->name }}</p>
            </div>
        </div>
    @endif

    <div class="container mx-auto px-4 py-12">
        <!-- Quick Info -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-12">
            <div class="card p-6 text-center">
                <div class="text-4xl mb-2">⏱️</div>
                <p class="text-gray-600">Duration</p>
                <p class="text-2xl font-bold">{{ $package->duration_days }} Days</p>
            </div>
            <div class="card p-6 text-center">
                <div class="text-4xl mb-2">🏨</div>
                <p class="text-gray-600">Nights</p>
                <p class="text-2xl font-bold">{{ $package->duration_nights }} Nights</p>
            </div>
            <div class="card p-6 text-center">
                <div class="text-4xl mb-2">💰</div>
                <p class="text-gray-600">Starting Price</p>
                <p class="text-2xl font-bold text-orange-500">{{ $package->formatted_price }}</p>
            </div>
            <div class="card p-6 text-center">
                <div class="text-4xl mb-2">🎫</div>
                <p class="text-gray-600">Type</p>
                <p class="text-2xl font-bold">{{ $package->tourType->name }}</p>
            </div>
        </div>

        <!-- Description -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-12">
            <div class="lg:col-span-2">
                <h2 class="text-3xl font-bold mb-6">About This Package</h2>
                <div class="prose max-w-none">
                    {!! $package->full_description !!}
                </div>

                <!-- Highlights -->
                @if($package->highlights)
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold mb-6">Highlights</h3>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($package->highlights as $highlight)
                                <li class="flex items-start gap-3" data-aos="fade-up">
                                    <span class="text-orange-500 text-xl">✓</span>
                                    <span>{{ $highlight }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Gallery -->
                @if($package->gallery->count() > 0)
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold mb-6">Photo Gallery</h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($package->gallery as $image)
                                <a href="{{ asset('storage/' . $image->image_url) }}"
                                   class="group relative overflow-hidden rounded-lg h-48"
                                   data-lightbox="gallery">
                                    <img src="{{ asset('storage/' . $image->image_url) }}"
                                         alt="{{ $image->alt_text }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-300"
                                         loading="lazy">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Itinerary -->
                @if($package->itineraryDays->count() > 0)
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold mb-6">Itinerary</h3>
                        <div class="space-y-6">
                            @foreach($package->itineraryDays as $day)
                                <div class="border-l-4 border-orange-500 pl-6 py-2" data-aos="fade-up">
                                    <h4 class="text-xl font-bold text-orange-500 mb-2">
                                        Day {{ $day->day_number }}: {{ $day->day_title }}
                                    </h4>
                                    <div class="prose prose-sm max-w-none text-gray-600">
                                        {!! $day->day_description !!}
                                    </div>

                                    @if($day->places->count() > 0)
                                        <div class="mt-4 space-y-3">
                                            @foreach($day->places as $place)
                                                <div class="bg-gray-50 p-3 rounded">
                                                    <p class="font-semibold">📍 {{ $place->place_name }}</p>
                                                    @if($place->place_description)
                                                        <p class="text-sm text-gray-600">{{ $place->place_description }}</p>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- FAQs -->
                @if($package->faqs->count() > 0)
                    <div class="mt-12">
                        <h3 class="text-2xl font-bold mb-6">Frequently Asked Questions</h3>
                        <div class="space-y-4">
                            @foreach($package->faqs as $faq)
                                <details class="group bg-gray-50 p-4 rounded-lg cursor-pointer">
                                    <summary class="font-bold text-lg flex items-center justify-between">
                                        {{ $faq->question }}
                                        <span class="ml-2 transition group-open:rotate-180">▼</span>
                                    </summary>
                                    <div class="mt-4 prose prose-sm max-w-none">
                                        {!! $faq->answer !!}
                                    </div>
                                </details>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="card p-6 sticky top-20">
                    <div class="mb-6">
                        <div class="text-3xl font-bold text-orange-500 mb-2">
                            {{ $package->formatted_price }}
                        </div>
                        @if($package->price_compare_at)
                            <p class="text-gray-500 line-through">{{ $package->formatted_compare_price }}</p>
                        @endif
                    </div>

                    <button class="btn-primary w-full mb-3">
                        Book Now
                    </button>

                    <button class="btn-secondary w-full">
                        Contact Us
                    </button>

                    <div class="mt-6 space-y-3 text-sm text-gray-600">
                        <p>✓ Best Price Guarantee</p>
                        <p>✓ 24/7 Customer Support</p>
                        <p>✓ Free Cancellation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
