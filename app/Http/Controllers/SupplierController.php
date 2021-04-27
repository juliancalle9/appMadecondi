<?php

namespace App\Http\Controllers;

use App\Supplier;
use Flash;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all(); // almaneca en la variable los productos
        return view('suppliers.index',compact('suppliers'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Supplier::$rules);
        $input = $request->all();
        
         try {
             Supplier::create([
                
                "nit" => $input["nit"],
                "nombre" => $input["nombre"],
                "direccion" => $input["direccion"],
                "telefono" => $input["telefono"],
                "idciudad"=> $input["idciudad"]
             ]);
    
             Flash::success("el proveedor fue creado con exito");
             return redirect()->route('suppliers.index');
         }catch(\Exception $e){
           Flash::error($e->getMessage());
             return redirect()->route('suppliers.create');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->all()); //Editar un registro.
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
 
 
     
}
