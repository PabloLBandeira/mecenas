<?php

namespace App\Services;

use App\Models\Artwork;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getCategoriesForGrid(): Collection
    {
        $categories = Artwork::where('status', 'ativo')
            ->select('category')
            ->selectRaw('COUNT(*)  as artwork_count')
            ->groupBy('category')
            ->orderBy('artwork_count', 'desc')
            ->get();

        return $categories->map(function($category){
            $representativeArtwork = Artwork::where('category', $category->category)
                ->where('status', 'ativo')
                ->with('image')
                ->first();

            return [
                'name' => $category->category,
                'artwork_count' => $category->artwork_count,
                'image' => $representativeArtwork->image->first()->path ?? 'https://picsum.photos/1200/800?random=' . uniqid(),
                'slug' => Str::slug($category->category)
            ];
        });
    }

    public function getArtworksByCategory(string $category, int $perPage = 20): LengthAwarePaginator
    {
        return Artwork::where('category', 'ilike', $category)
            ->where('status', 'ativo')
            ->with('user', 'image')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);


    }

    public function getAllCategories(): Collection
    {
        return Artwork::where('status', 'ativo')
            ->distinct('category')
            ->pluck('category');
    }

    public function getAllCategoriesWithData(): Collection
    {
        return $this->getCategoriesForGrid();
    }

    public function getCategoryName(string $slug): string
    {
        return Str::title(str_replace('-', ' ', $slug ));
    }
}
