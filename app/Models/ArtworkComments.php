<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtworkComments extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'artwork_id',
        'user_id',
        'content',
        'parent_id'
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function artwork(): BelongsTo
    {
        return $this->belongsTo(Artwork::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ArtworkComments::class, 'parent_id');
    }

    public function replie()
    {
        return $this->hasMany(ArtworkComments::class,  'parent_id');
    }

}
