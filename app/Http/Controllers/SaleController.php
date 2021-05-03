<?php

namespace App\Http\Controllers;
use App\Http\Requests\saleFormRequest;
use App\Sale;
use Flash;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sale = Sale::all();
        return view('sales.index',compact('sale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saleFormRequest $request)
    {
        $input = $request->all();
        Sale::create($request->all());
             Flash::success("La Venta fue creada con exito");
             return redirect()->route('sales.index');
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit($idVenta)
    {
        return view('sales.edit',['sale' => Sale::find($idVenta)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(saleFormRequest $request, $idVenta)
    {
        $sale = Sale::find($idVenta);
        
        
        
         $sale->nombreCliente = $request->get('nombreCliente');
         $sale->telefono = $request->get('telefono');
         $sale->direccion = $request->get('direccion');
         $sale-> precioUnitario= $request->get('precioUnitario');
         $sale-> precioTotal= $request->get('precioTotal');

         
         $sale->update($request->all()); //Editar un registro.
         Flash::success("la venta fue modificada con exito");
         return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
