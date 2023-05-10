<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;


    public function infracciones(){
        return $this->hasMany(Infraccion::class);
    }

    public function descuento(){
        
    }
}
