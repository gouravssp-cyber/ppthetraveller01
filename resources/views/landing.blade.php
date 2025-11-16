@extends('layouts.app')

@section('title', 'Home - E-Commerce Store')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Hero Banner Section -->
    <section class="mb-16">
        <div class="bg-gradient-to-r from-[#8d6e63] to-[#a1887f] rounded-2xl p-8 text-white text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to Our Store</h1>
            <p class="text-xl mb-6">Discover the latest fashion trends and exclusive collections</p>
            <a href="{{ route('filter') }}" class="bg-white text-[#8d6e63] hover:bg-[#d7ccc8] font-bold py-3 px-6 rounded-full transition duration-300 inline-block">
                Shop Now
            </a>
        </div>
    </section>

    <!-- Sections Loop -->
    @foreach($sections as $section)
        @switch($section->section_type)
            @case('banner')
                @include('sections.banner', ['section' => $section])
                @break

            @case('banner_carousel')
                @include('sections.banner-carousel', ['section' => $section])
                @break

            @case('carousel')
                @include('sections.carousel', ['section' => $section])
                @break

            @case('bento')
                @include('sections.bento', ['section' => $section])
                @break

            @default
                @include('sections.grid', ['section' => $section])
        @endswitch
    @endforeach
</div>
@endsection