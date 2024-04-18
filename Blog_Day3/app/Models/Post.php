<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'publisher'];

    public function publisher() {
        return $this->belongsTo(User::class, 'publisher');
    }
}
