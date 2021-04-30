<?php

namespace App\Http\Controllers;

use App\Lot;
use Illuminate\Http\Request;

class LotController extends Controller
{

    public function index()
    {
        $lots = Lot::all(); // almaneca en la variable los productos
        return view('lots.index',compact('lots'));
    }


    public function create()
    {
        return view('lots.create');
    }


    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required',
        'fechaFabricacion' => 'required',
        'fechaVencimiento' => 'required',
        'cantidad' => 'required',
    ]);
    Lot::create($request->all()); 
    return redirect()->route('lots.index')
                        ->with('success', 'lote agregado con éxito.'); 
}

    
    public function show(Lot $lote)
    {
        return view('lots.show', compact('lote')); 
    }


    public function edit(Lot $lote)
    {
        return view('lots.edit', compact('lote')); 
    }

    
    public function update(Request $request, Lot $lote)
    {
        $request->validate([
            'nombre' => 'required',
            'fechaFabricacion' => 'required',
            'fechaVencimiento' => 'required',
            'cantidad' => 'required',
    ]);
    $lote->update($request->all());

    return redirect()->route('lots.index')
                        ->with('success', 'lote actualizada con éxito.');

    }


    public function destroy(Lot $lote)
     {
        $lote->delete(); 
            return redirect()->route('lots.index')
                            ->with('success', 'lote eliminado con éxito');
    }
}
