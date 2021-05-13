<?php

namespace App\Http\Controllers;

use App\Http\Requests\supplierFormRequest;
use App\Supplier;
use App\City;
use Flash;
use DB;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {  $cities = City::all();
          //$supliers = Supplier::all();
        $suppliers =DB::table('suppliers')
        ->join('cities', 'cities.idciudad', '=', 'suppliers.idciudad')
        ->select('suppliers.nit','suppliers.nombre', 'suppliers.direccion','suppliers.telefono', 'cities.nombre as ciudad')
        ->get();
        //dd($suppliers);
    
        return view('suppliers.index', compact('suppliers'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $cities = City::all();
        return view('suppliers.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(supplierFormRequest $request)
    {
        $input = $request->all();
        Supplier::create($request->all());
             Flash::success("el proveedor fue creado con exito");
             return redirect()->route('suppliers.index');
         
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
    public function edit($nit)
    {
        return view('suppliers.edit',['supplier' => Supplier::find($nit)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier){
        $request->validate([
            
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|numeric',
            'idciudad' => 'required'
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')
                            ->with('success', 'proveedor actualizado con éxito.');
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
