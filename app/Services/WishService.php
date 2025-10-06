<?php

namespace App\Services;

use App\Models\Wish;
use Illuminate\Database\Eloquent\Collection;

class WishService
{
    public function getActiveWishes(int $limit = 15): Collection
    {
        return Wish::where('status', 'ativo')
        ->with(['user'])
        ->orderBy('created_at', 'desc')
        ->limit($limit)
        ->get();
    }
}
