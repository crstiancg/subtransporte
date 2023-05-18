<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papeleta extends Model
{
    use HasFactory;

    protected $table = 'papeleta';


    protected $casts = ['cod_papeleta' => 'string'];

    public $incrementing = false;

    protected $primaryKey = 'cod_papeleta';

    public function infraccion()
    {
        //$infracion = Infraccion::where('papeleta_id','=',$this->cod_papeleta)->first();
        //return strval($this->cod_papeleta);
        return $this->hasOne(Infraccion::class,'papeleta_id');
    }

}
