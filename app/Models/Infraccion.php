<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infraccion extends Model
{

    use HasFactory;
    protected $fillable = [
        'id',
        'cod_placa',
    ];

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

}
