<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable=['post_id','user_id','comment'];

    public function user(){
        return $this->belongsTo(User::class);
    }


         public function comment_replies()
        {
            return $this->hasMany(comment_replies::class);
        }

}
