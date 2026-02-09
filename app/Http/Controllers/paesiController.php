<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\paesi;
use Illuminate\Http\Request;

class paesiController extends Controller
{
    public function index()
    {
        return response()->json(paesi::all(),200);
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'nome' => 'required|string|max:255'
            ]);


        $paesi = paesi::create([
            'nome' => $request->nome
        ]);

        return response()->json($paesi,201);
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
        $paesi = paesi::find($id);

        if($paesi) {
            $request->validate([
                'nome' => 'required|string|max:255',
            ]);

            $paesi->update($request->only(['nome']));
            return response()->json($paesi,200);
        }else{
            return response()->json(['messaggio' => 'paese non trovato'],404);
        }

        
    }

    public function destroy($id)
    {
        $paesi = paesi::find($id);

        if($paesi) {
        $paesi->delete();
        return response()->json(['messaggio'=> 'paese cancellato'],200);
        }else{
        return response()->json(['messaggio' => 'paese non trovato'],404);
        }
    }
}
