<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class viaggi_paesi extends Model
{
    protected $fillable = [
        'paese_id',
        'viaggio_id',
    ];

    public function paesi()
    {
        return $this->belongsToMany(paesi::class);
    }

    public function viaggi()
    {
        return $this->belongsToMany(viaggi::class);
    }    
}
