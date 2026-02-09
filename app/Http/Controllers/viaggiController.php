<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\viaggi;
use Illuminate\Http\Request;

class viaggiController extends Controller
{
    public function index()
    {
        return response()->json(viaggi::all(),200);
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'posti_disponibili' => 'required|integer|min:1'
            ]);


        $viaggi = viaggi::create([
            'posti_disponibili' => $request->posti_disponibili
        ]);

        return response()->json($viaggi,201);
    }

    /**
     * Display the specified resource.
     *
    *public function show(string $id)
    *{
     *   //
    *}
    */

    public function update(Request $request, $id)
    {
        $viaggi = viaggi::find($id);

        if($viaggi) {
            $request->validate([
                'posti_disponibili' => 'required|integer|min:1',
            ]);

            $viaggi->update($request->only(['posti_disponibili']));
            return response()->json($viaggi,200);
        }else{
            return response()->json(['messaggio' => 'viaggio non trovato'],404);
        }

        
    }

    public function destroy($id)
    {
        $viaggi = viaggi::find($id);

        if($viaggi) {
        $viaggi->delete();
        return response()->json(['messaggio'=> 'viaggio cancellato'],200);
        }else{
        return response()->json(['messaggio' => 'viaggio non trovato'],404);
        }
    }
}
