<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryService $categoryService
    ){}

    public function index()
    {
        $categories = $this->categoryService->getAllCategoriesWithData();

        return view('categories.index', compact('categories'));
    }

    public function show(string $category)
    {
        $artworks = $this->categoryService->getArtworksByCategory($category);
        $categoryName = $this->categoryService->getCategoryName($category);

        return view('categories.show', compact('artworks', 'categoryName'));
    }
}
