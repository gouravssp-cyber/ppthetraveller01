@extends('layouts.app')

@section('title', 'Search Results for "' . $query . '" - E-Commerce Store')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-6 text-center" style="color: #5d4037;">Search Results</h1>
    <p class="text-lg text-center mb-12" style="color: #5d4037;">Results for: "{{ $query }}"</p>
    
    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                    <div class="p-4">
                        <h3 class="text-lg font-bold mb-1">{{ $product->product_name }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $product->product_title }}</p>
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-lg font-bold" style="color: #8d6e63;">₹{{ number_format($product->min_price) }}</span>
                            @if($product->max_price > $product->min_price)
                                <span class="text-gray-500 text-sm line-through">₹{{ number_format($product->max_price) }}</span>
                            @endif
                        </div>
                        <a href="{{ route('product.show', $product->product_id) }}" class="bg-[#8d6e63] hover:bg-[#5d4037] text-white text-sm font-bold py-2 px-4 rounded-full transition duration-300 inline-block w-full text-center">
                            View Product
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->appends(['query' => $query])->links() }}
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-xl" style="color: #5d4037;">No products found for "{{ $query }}".</p>
            <a href="{{ route('home') }}" class="mt-4 bg-[#8d6e63] hover:bg-[#5d4037] text-white font-bold py-2 px-6 rounded-full transition duration-300 inline-block">
                Browse All Products
            </a>
        </div>
    @endif
</div>
@endsection