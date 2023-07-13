<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public const PUBLISHED=1;
    public const DRAFT=0;

    protected $fillable=['gallery_id','user_id','category_id','title','description','status'];
    protected $guarded=[];

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

    public function category(){

        return $this->belongsTo(category::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function gallery(){

        return $this->belongsTo(gallery::class);
    }
         public function comments()
        {
            return $this->hasMany(comment::class);
        }

}
