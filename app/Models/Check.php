<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Check extends Model
{
    use HasFactory;

    static array $browsers = [
        "Chrome",
        "Firefox",
        "Edge",
        "Safari",
        "IOS Safari",
        "Android Chrome"
    ];

    static array $screen_sizes = [
        375, 768, 1024, 1440, 1600
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
