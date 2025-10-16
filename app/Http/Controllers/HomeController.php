<?php

namespace App\Http\Controllers;

use App\Services\ArtworkService;
use App\Services\WishService;
use App\Services\CategoryService;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(
        private ArtworkService $artworkService,
        private WishService $wishService,
        private CategoryService $categoryService,
    ) {}

    public function index()
    {
        $artworks = $this->artworkService->getFeaturedArtworks(15);
        $wishes = $this->wishService->getActiveWishes(15);
        $categories = $this->categoryService->getCategoriesForGrid();

        return view('home', compact('artworks', 'wishes', 'categories'));
    }
}
