<?php

namespace App\Http\Controllers;

use App\Models\Paese;
use Illuminate\Http\Request;

class PaeseController extends Controller
{
    public function index()
    {
        $paesi = Paese::all();
        return response()->json($paesi, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|unique:paesi'
        ]);

        $paese = Paese::create($request->only('nome'));

        return response()->json($paese, 201);
    }

    public function update(Request $request, $id)
    {
        $paese = Paese::find($id);

        if (!$paese) {
            return response()->json(['messaggio' => 'Paese non trovato'], 404);
        }

        $request->validate([
            'nome' => 'required|string|unique:paesi,nome,' . $id
        ]);

        $paese->update($request->only('nome'));

        return response()->json($paese, 200);
    }

    public function destroy($id)
    {
        $paese = Paese::find($id);

        if ($paese) {
            $paese->delete();
            return response()->json(['messaggio' => 'Paese eliminato'], 204);
        } else {
            return response()->json(['messaggio' => 'Paese non trovato'], 404);
        }
    }
}
