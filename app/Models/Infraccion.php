<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infraccion extends Model
{

    use HasFactory;


    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    public function calcularEstado():string
    {
        $n= rand(1, 100);
        $placa1 ="PLACA";
        $placa = $this->cod_placa;
        $this->cod_placa=$placa1.strval($n);
        $this->save();
        return $this->cod_placa;
    }
    // public function cambiarEstado(){

    // }
    public function papeleta(){

        return $this->belongsTo(Papeleta::class,'papeleta_id');
    }



}
