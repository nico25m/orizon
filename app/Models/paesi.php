<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paesi extends Model
{
    protected $fillable = ['nome'];

    public function viaggi()
    {
        return $this->belongsToMany(viaggi::class);
    }
}
