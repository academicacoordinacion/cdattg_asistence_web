<?php

namespace App\Http\Controllers;

use App\Models\EntradaSalida;
use App\Http\Requests\StoreEntradaSalidaRequest;
use App\Http\Requests\UpdateEntradaSalidaRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EntradaSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Obtén todos los registros de entrada/salida del usuario actual
        $registros = EntradaSalida::where('user_id', $user->id)->get();

        // Pasa los registros a la vista
        return view('entradaSalidas.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEntradaSalidaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EntradaSalida $entradaSalida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EntradaSalida $entradaSalida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEntradaSalidaRequest $request, EntradaSalida $entradaSalida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntradaSalida $entradaSalida)
    {
        //
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}