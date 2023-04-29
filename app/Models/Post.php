<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relacion MUCHOS A MUCHOS
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Relación UNO A UNO POLIMORFICA
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
