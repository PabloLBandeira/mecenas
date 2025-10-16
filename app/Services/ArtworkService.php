<?php

namespace App\Services;

use App\Models\Artwork;
use App\Models\ArtworkImage;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

class ArtworkService
{
    public function getFeaturedArtworks(int $limit = 15): Collection
    {
        return Artwork::where('status', 'ativo')
        ->with(['user', 'image'])
        ->orderBy('created_at', 'desc')
        ->limit($limit)
        ->get();
    }

    public function getAllArtworks(int $perPage = 20): LengthAwarePaginator
    {
        return Artwork::where('status', 'ativo')
        ->with(['user', 'image'])
        ->orderBy('created_at', 'desc')
        ->paginate($perPage);
    }

    public function getArtworkById($id): Artwork
    {
        return Artwork::where('status', 'ativo')
        ->with(['user', 'image'])
        ->findOrFail($id);
    }

}
