<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        "completed",
        "page",
        "browser",
        "screen_size",
        "description",
        "screenshot",
        "website_id",
        "priority"
    ];

    public static $priorityDictionary = [
        0 => "Low",
        1 => "Normal",
        2 => "High",
        3 => "Critical"
    ];


    public function getPriorityLabelAttribute()
    {

        return Issue::$priorityDictionary[$this->priority] ?? "Normal";
    }

    protected static function booted()
    {
        static::deleting(function (Issue $issue) {
            if ($issue->screenshot) {

                $screenshot_path = str_replace('storage/', 'public/', $issue->screenshot);

                Storage::delete($screenshot_path);
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
