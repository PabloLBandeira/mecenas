<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artwork extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'sub_category',
        'price',
        'status'
    ];

    protected $casts = [
        'price' => 'integer'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasMany(ArtworkImage::class);
    }

    public function comments ()
    {
        return $this->hasMany(ArtworkComments::class);
    }
}
