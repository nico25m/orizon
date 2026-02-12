<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viaggio extends Model
{
    protected $table = 'viaggi';

    protected $fillable = ['posti_disponibili'];

    public function paesi()
    {
        return $this->belongsToMany(Paese::class, 'paese_viaggio');
    }
}
