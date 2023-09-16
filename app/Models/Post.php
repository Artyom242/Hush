<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = false;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    protected $withCount = ['likedUsers'];

    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id');
    }
}
