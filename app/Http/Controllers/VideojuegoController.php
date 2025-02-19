<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('videojuegos.index', [
            'videojuegos' => Videojuego::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        {
            return view('videojuegos.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $validated = $request->validate([
                'titulo' => 'required',
                'descripcion' => 'required|string|max:255',
                'dificultad' => 'required|string|max:255'
            ]);

            DB::beginTransaction();
    
            $videojuego = Videojuego::create([
                'dificultad' => $validated['dificultad']]);
    
            $ficha = new Ficha([
                'titulo' => $validated['titulo'],
                'descripcion' => $validated['descripcion'],
            ]);
            // $ficha = Ficha::create([
            //     'titulo' => $validated['titulo'],
            //     'descripcion' => $validated['descripcion'],
            // ]);
            $ficha->fichable()->associate($videojuego);
            $ficha->save();
            DB::commit();

            session()->flash('exito', 'Videojuego creado correctamente.');
            return redirect()->route('videojuegos.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videojuego $videojuego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        //
    }
}
