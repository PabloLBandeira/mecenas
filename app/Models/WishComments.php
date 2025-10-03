<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WishComments extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $primaryKey = 'id';

    protected $fillable = [
        'wishcomment_id',
        'user_id',
        'content',
        'parent_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wish(): BelongsTo
    {
        return $this->belongsTo(Wish::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(WishComments::class, 'parent_id');
    }

    public function replie()
    {
        return $this->hasMany(WishComments::class, 'parent_id');
    }
}
