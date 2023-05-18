<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    use HasFactory;

    protected $table = 'tarjeta_circulacion';
    protected $primaryKey = 'cod_tarjeta_circulacion';

}
