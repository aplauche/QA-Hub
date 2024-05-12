<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "url"
    ];

    protected static function booted()
    {
        // manually delete associated issues to fire the deleted event and remove any images
        static::deleting(function (Website $website) {
            $issues = $website->issues()->get();
            Issue::destroy($issues);
        });
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function issues(): HasMany
    {
        return $this->hasMany(Issue::class);
    }

    public function checks(): HasMany
    {
        return $this->hasMany(Check::class);
    }

    public function scopeWithIssueCounts($query)
    {
        return $query->withCount([
            'issues as total_issues_count',
            'issues as completed_issues_count' => function ($query) {
                return $query->where('completed', true);
            }
        ]);
    }
}
