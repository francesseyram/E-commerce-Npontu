<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display the homepage with featured products and categories
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        // Get random products for featured section
        $featuredProducts = Product::inRandomOrder()
            ->with(['category', 'images'])
            ->take(8)
            ->get();

        // Get all categories with their products
        $categories = Category::with(['products' => function($query) {
            $query->with('images')->take(4);
        }])->get();

        // Get latest products
        $latestProducts = Product::with(['category', 'images'])
            ->latest()
            ->take(8)
            ->get();

        return Inertia::render('HomePage', [
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
            'latestProducts' => $latestProducts
        ]);
    }
}
