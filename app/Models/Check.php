<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Check extends Model
{
    use HasFactory;

    protected $fillable = [
        "browser",
        "screen_size",
        "website_id"
    ];

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

    static array $matrix = [
        "Chrome" => [1024, 1440, 1600],
        "Firefox" => [1024, 1440, 1600],
        "Edge" => [1024, 1440, 1600],
        "Safari" => [1024, 1440, 1600],
        "IOS Safari" => [375, 768],
        "Android Chrome" => [375, 768]
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
