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
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        ->select('suppliers.id','suppliers.nit','suppliers.nombre', 'suppliers.direccion','suppliers.telefono', 'suppliers.correoelectronico','suppliers.estado','cities.nombre as ciudad')
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
        $request->validate([
        'nit' => 'required|min:9',
        'nombre' => 'required|min:4',
        'direccion' => 'required|min:8',
        'telefono' => 'required|min:7',
        ]);
        $input = $request->all();
        Supplier::create($request->all());
             Flash::success("el proveedor fue creado con exito");
             return redirect()->route('suppliers.index')->with('status', 'Proveedor guardado con éxito.');
         
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
    public function edit($id)
    {
        $cities = City::all();
        return view('suppliers.edit',['supplier' => Supplier::find($id)],compact('cities'));
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
            'telefono' => 'required',
            'idciudad' => 'required'
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('status', 'Proveedor actualizado con éxito.');
    }

    public function changeStatus(Request $request) {
        $supplier = Supplier::find($request->id);
        $supplier->estado = $request->estado;
        $supplier->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
 
 
     
}
