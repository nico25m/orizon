<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class viaggi extends Model
{
    protected $fillable = ['posti_disponibili'];

    public function paesi()
    {
        return $this->belongsToMany(paesi::class);
    }
}
