<?php

namespace App\Http\Controllers;

use App\Models\viaggi_paesi;
use Illuminate\Http\Request;

class viaggi_paesiController extends Controller
{
    public function index(){
        return response()->json(viaggi_paesi::all(),200);
    }


}
