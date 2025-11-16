<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Product;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display the landing page with all sections
     */
    public function index()
    {
        // Get all active sections ordered by display order
        $sections = Section::where('is_active', true)
            ->orderBy('display_order')
            ->get();

        // Get products for each section
        foreach ($sections as $section) {
            $section->loadProducts();
        }

        return view('landing', compact('sections'));
    }

    /**
     * Display a specific section
     */
    public function show($sectionSlug)
    {
        // Find section by name (assuming slug is based on name)
        $section = Section::where('section_name', 'LIKE', '%' . ucfirst(str_replace('-', ' ', $sectionSlug)) . '%')
            ->where('is_active', true)
            ->firstOrFail();

        return view('section.show', compact('section'));
    }

    /**
     * Handle search requests
     */
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (!$query) {
            return redirect()->route('home');
        }

        // Search products across all sections
        $products = Product::where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('product_name', 'LIKE', "%{$query}%")
                  ->orWhere('product_title', 'LIKE', "%{$query}%")
                  ->orWhere('brand', 'LIKE', "%{$query}%");
            })
            ->paginate(12);

        return view('search.results', compact('products', 'query'));
    }
}