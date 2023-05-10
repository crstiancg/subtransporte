<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Beneficio extends Model
{
    use HasFactory;


    public function tipos():BelongsToMany
    {
        return $this->belongsToMany(Tipo::class);
    }
}
