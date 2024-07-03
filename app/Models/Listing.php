<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Listing extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'beds',
        'baths',
        'area',
        'city',
        'street',
        'code',
        'street_nr',
        'price',
        // Các thuộc tính khác nếu có
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class,
            'by_user_id'
        );
    }
}
