<?php

namespace App\Http\Controllers;
use App\Http\Requests\lotFormRequest;
use App\Lot;
use Flash;
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

    
    public function store(lotFormRequest $request)
    {
        $input = $request->all();
        Lot::create($request->all());
             Flash::success("el lote fue creado con exito");
             return redirect()->route('lots.index');
    }

    public function show(Lot $lot)
    {
        return view('lots.show', compact('lot')); 
    }

    public function edit($idlote)
    {
        return view('lots.edit',['lot' => Lot::find($idlote)]);
 
    }


    public function update(lotFormRequest $request,  $idlote)
    {
        $lot = Lot::find($idlote);
        
         $lot->fechaFabricacion = $request->get('fechaFabricacion');
         $lot->fechaVencimiento = $request->get('fechaVencimiento');
         $lot->cantidad = $request->get('cantidad');
         
         $lot->update($request->all()); //Editar un registro.
         Flash::success("el lote fue modificado con exito");
         return redirect()->route('lots.index');

    }

    public function destroy(Lot $lot)
    {
        $lot->delete(); 
        return redirect()->route('lots.index')
                        ->with('success', 'lote eliminado con éxito');
    }
}
