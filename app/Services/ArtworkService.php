<?php

namespace App\Services;

use App\Models\Artwork;
use Illuminate\Database\Eloquent\Collection;

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
}
