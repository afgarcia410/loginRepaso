<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
    use HasFactory;
    /*Para los tags*/
    use \Conner\Tagging\Taggable;
    
    protected $table = "enlace";
    
    protected $fillable = ['titulo', 'descripcion','enlace', 'imagen'];
    
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
    return $this->belongsToMany(Etiqueta::class)->as('tags');
    }
}
