<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['category','author'];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query){
        return $query->where('title','like','%'. request('search') .'%')->orWhere('body','like','%'. request('search') .'%');
    }

    public function scopePop(Builder $query){
        return $query->where('user_id','=','1');
    }

   


    public function author(){
        return $this->belongsTo(User::class,"user_id");
    }
   
}