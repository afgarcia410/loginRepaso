<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;
    
    protected $table = "etiqueta";
    
    protected $fillable = ['etiqueta'];
    
    public function enlaces()
    {
    return $this->belongsToMany(Enlace::class);
    }
}
