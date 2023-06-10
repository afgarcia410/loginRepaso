<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
   // protected $table = 'comments';
    //use SoftDeletes;
    
    protected $fillable = [
        'post_id',
        'iduser',
        'comment'
        ];
    
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    /*
    public function enlace(){
        return $this->belongsTo(Enlace::class);
    }
    */
    public function replies(){
        return $this->hasMany(Comment::class,'orden_id');
    }
}
