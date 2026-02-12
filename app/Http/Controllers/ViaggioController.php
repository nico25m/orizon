<?php

namespace App\Http\Controllers;

use App\Models\Viaggio;
use Illuminate\Http\Request;

class ViaggioController extends Controller
{
    public function index(Request $request)
    {
        $query = Viaggio::with(['paesi' => function ($q) use ($request) {
            if ($request->filled('paese')) {
                $q->where('nome', $request->paese);
            }
        }]);

        if ($request->filled('paese')) {
            $query->whereHas('paesi', function ($q) use ($request) {
                $q->where('nome', $request->paese);
            });
        }

        if ($request->filled('posti_disponibili')) {
            $query->where('posti_disponibili', $request->posti_disponibili);
        }

        return response()->json($query->get(), 200);
    }




    public function store(Request $request)
    {
        $request->validate([
            'posti_disponibili' => 'required|integer|min:0',
            'paesi' => 'required|array|min:1'
        ]);

        $viaggio = Viaggio::create([
            'posti_disponibili' => $request->posti_disponibili
        ]);

        $viaggio->paesi()->attach($request->paesi);

        return response()->json($viaggio->load('paesi'), 201);
    }

    public function show($id)
    {
        $viaggio = Viaggio::with('paesi')->find($id);

        if (!$viaggio) {
            return response()->json(['message' => 'Viaggio non trovato'], 404);
        }

        return response()->json($viaggio, 200);
    }


    public function update(Request $request, $id)
    {
        $viaggio = Viaggio::find($id);

        if (!$viaggio) {
            return response()->json(['messaggio' => 'Viaggio non trovato'], 404);
        }

        $request->validate([
            'posti_disponibili' => 'sometimes|integer|min:0',
            'paesi' => 'sometimes|array|min:1'
        ]);

        if ($request->has('posti_disponibili')) {
            $viaggio->posti_disponibili = $request->posti_disponibili;
        }

        $viaggio->save();

        if ($request->has('paesi')) {
            $viaggio->paesi()->sync($request->paesi);
        }

        return response()->json($viaggio->load('paesi'), 200);
    }

    public function destroy($id)
    {
        $viaggio = Viaggio::find($id);

        if ($viaggio) {
            $viaggio->delete();
            return response()->json(['messaggio' => 'Viaggio eliminato'], 204);
        }else{
            return response()->json(['messaggio' => 'Viaggio non trovato'], 404);
        }

        
    }
}
