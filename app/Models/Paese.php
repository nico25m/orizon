<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paese extends Model
{
    protected $table = 'paesi';

    protected $fillable = ['nome'];

    public function viaggi()
    {
        return $this->belongsToMany(Viaggio::class, 'paese_viaggio');
    }
}
