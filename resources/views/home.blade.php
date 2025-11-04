@extends('layouts.app')

@section('title', 'Home - Best Tour Packages')
@section('meta_description', 'Explore our amazing tour packages')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center">
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover -z-10">
            <source src="https://example.com/hero-video.mp4" type="video/mp4">
        </video>

        <div class="absolute inset-0 bg-black bg-opacity-40 -z-10"></div>

        <div class="container mx-auto px-4 py-20">
            <div class="max-w-2xl" data-aos="fade-up">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                    Explore Amazing Tours
                </h1>
                <p class="text-xl text-gray-100 mb-8">
                    Discover the world's most beautiful destinations with our carefully curated tour packages.
                </p>
                <button class="btn-primary">
                    Explore Now
                </button>
            </div>
        </div>
    </section>

    <!-- Package Sections -->
    @foreach(\App\Models\PackageSection::active()->ordered()->get() as $section)
        <section class="py-16 bg-gradient-to-b from-white to-gray-50">
            <div class="container mx-auto px-4">
                <!-- Section Header -->
                <div class="mb-12" data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-4">
                        @if($section->section_icon)
                            <div class="text-4xl">
                                @php
                                    $iconMap = [
                                        'heroicon-o-star' => '⭐',
                                        'heroicon-o-fire' => '🔥',
                                        'heroicon-o-sparkles' => '✨',
                                        'heroicon-o-trending-up' => '📈',
                                    ];
                                    echo $iconMap[$section->section_icon] ?? '🎯';
                                @endphp
                            </div>
                        @endif
                        <div>
                            <h2 class="section-title">{{ $section->title }}</h2>
                        </div>
                    </div>

                    <div class="prose max-w-3xl text-gray-600">
                        {!! $section->description !!}
                    </div>

                    @if($section->packages->count() > 4)
                        <a href="{{ route('sections.show', $section->slug) }}"
                           class="inline-block mt-6 text-orange-500 hover:text-orange-600 font-semibold">
                            View All Packages →
                        </a>
                    @endif
                </div>

                <!-- Packages Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($section->packages->take(4) as $package)
                        <a href="{{ route('packages.show', $package->slug) }}" 
                           class="group card overflow-hidden" 
                           data-aos="fade-up"
                           data-aos-delay="{{ $loop->index * 100 }}">
                            @if($package->banner_image)
                                <div class="relative h-48 overflow-hidden bg-gray-200">
                                    <img src="{{ asset('storage/' . $package->banner_image) }}"
                                         alt="{{ $package->banner_image_alt }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition duration-300"
                                         loading="lazy">
                                    
                                    @if($package->discount_percentage > 0)
                                        <div class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                            -{{ $package->discount_percentage }}%
                                        </div>
                                    @endif
                                </div>
                            @endif

                            <div class="p-4">
                                <h3 class="font-bold text-lg group-hover:text-orange-500 transition">
                                    {{ $package->title }}
                                </h3>

                                <p class="text-gray-500 text-sm mb-3">
                                    📍 {{ $package->destination->name }}
                                </p>

                                <div class="flex items-center justify-between mb-3">
                                    <span class="text-gray-600 text-sm">
                                        ⏱️ {{ $package->duration_days }} Days
                                    </span>
                                    <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">
                                        {{ $package->tourType->name }}
                                    </span>
                                </div>

                                <div class="flex items-baseline gap-2">
                                    <span class="text-2xl font-bold text-orange-500">
                                        {{ $package->formatted_price }}
                                    </span>
                                    @if($package->price_compare_at)
                                        <span class="text-gray-400 line-through">
                                            {{ $package->formatted_compare_price }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-500">No packages available</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    @endforeach

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-orange-500 to-orange-600 text-white">
        <div class="container mx-auto px-4 text-center" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-6">Ready for Your Next Adventure?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Join thousands of travelers who've discovered amazing destinations with us.
            </p>
            <button class="px-8 py-4 bg-white text-orange-500 rounded-lg font-bold hover:bg-gray-100 transition">
                Start Exploring
            </button>
        </div>
    </section>
@endsection
