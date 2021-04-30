<?php

namespace App\Http\Controllers;

use App\Lot;
use Illuminate\Http\Request;

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            
            'fechaFabricacion' => 'required',
            'fechaVencimiento' => 'required',
            'cantidad' => 'required',
        ]);
        Lot::create($request->all()); 
        return redirect()->route('lots.index')
                            ->with('success', 'lote agregado con éxito.');
    }

    public function show(Lot $lot)
    {
        return view('lots.show', compact('lot')); 
    }

    public function edit(Lot $lot)
    {
        return view('lots.edit', compact('lot')); 
    }


    public function update(Request $request, Lot $lot)
    {
        $request->validate([
         
            'fechaFabricacion' => 'required',
            'fechaVencimiento' => 'required',
            'cantidad' => 'required',
    ]);
    $lot->update($request->all());

    return redirect()->route('lots.index')
                        ->with('success', 'lote actualizada con éxito.');

    }

    public function destroy(Lot $lot)
    {
        $lot->delete(); 
        return redirect()->route('lots.index')
                        ->with('success', 'lote eliminado con éxito');
    }
}
