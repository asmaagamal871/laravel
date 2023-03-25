<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{
    use Sluggable;
    use HasFactory;


    protected $fillable = [
        'title','description','user_id','image',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                
            ]
        ];
    }
    // protected function image():Attribute{
    //     return Attribute::make(
    //         get:fn ($value)=>asset("storage".$value)
    //     );
        
    //     }

    // protected function createdAt(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
    //     );
    // }
}
