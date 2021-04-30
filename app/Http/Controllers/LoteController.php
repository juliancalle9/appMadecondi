<?php

namespace App\Http\Controllers;

use App\Lote;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotes = Lote::all(); // almaneca en la variable los productos
        return view('lots.index',compact('lots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    Lote::create($request->all()); 
    return redirect()->route('lots.index')
                        ->with('success', 'lote agregado con éxito.'); 
}

    
    public function show(Lote $lote)
    {
        return view('lots.show', compact('lote')); 
    }


    public function edit(Lote $lote)
    {
        return view('lots.edit', compact('lote')); 
    }

    
    public function update(Request $request, Lote $lote)
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


    public function destroy(Lote $lote)
     {
        $lote->delete(); 
            return redirect()->route('lots.index')
                            ->with('success', 'lote eliminado con éxito');
    }
}
