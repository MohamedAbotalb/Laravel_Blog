<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'publisher'];

    public function publisher()
    {
        return $this->belongsTo(User::class, 'publisher');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
