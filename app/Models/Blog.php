<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author() //user_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getRouteKeyName()  //for route details repeat
    {
        return 'slug';
    }
    public function scopeFilter($query, $filters)
    {
        // dd($filters);    // $query = Blog::latest()   //conditional query
        if ($filters['search'] ?? null) {

            $query->where(function ($query) use ($filters) {
                $query->where('title', 'LIKE', '%' . $filters['search'] . '%')
                    ->orWhere('body', 'LIKE', '%' . $filters['search'] . '%');
            });
        }
        if ($filters['category'] ?? null) {

            $query->whereHas('category', function ($query) use ($filters) {
                // what kinds of blogs ????
                $query->where('slug', $filters['category']);
            });
        }
        if ($filters['author'] ?? null) {
            //author username's blog
            $query->whereHas('author', function ($query) use ($filters) {
                $query->where('username', $filters['author']);
            });
        }
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
