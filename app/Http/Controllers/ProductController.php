<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($productId)
    {
        $product = Product::where('product_id', $productId)
            ->where('is_active', true)
            ->with(['category', 'seo'])
            ->firstOrFail();

        // Get related products (same category, exclude current product)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->with('category')
            ->limit(8)
            ->get();

        // If not enough related products, get random products
        if ($relatedProducts->count() < 4) {
            $additionalProducts = Product::where('id', '!=', $product->id)
                ->where('is_active', true)
                ->with('category')
                ->inRandomOrder()
                ->limit(8 - $relatedProducts->count())
                ->get();
            
            $relatedProducts = $relatedProducts->merge($additionalProducts);
        }

        return view('product.show', compact('product', 'relatedProducts'));
    }
}
