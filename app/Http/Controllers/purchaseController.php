<?php

namespace App\Http\Controllers;
use App\Http\Requests\purchaseFormRequest;
use App\Purchase;
use App\Supplier;
Use Flash;
use DB;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        //$supliers = Supplier::all();
      $purchases =DB::table('purchases')
      ->join('suppliers', 'suppliers.nit', '=', 'purchases.nit')
      ->select('purchases.idcompra','purchases.fechacompra', 'suppliers.nombre as proveedor')
      ->get();
      //dd($suppliers);
  
        return view('purchases.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $suppliers = Supplier::all();
        return view('purchases.create' , compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(purchaseFormRequest $request)
    {
        $input = $request->all();
        Purchase::create($request->all());
             Flash::success("la compra fue creada con exito");
             return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit($idcompra)
    {
        return view('purchases.edit',['purchase' => Purchase::find($idcompra)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(purchaseFormRequest $request, $idcompra)
    {
        $purchase = Purchase::find($idcompra);
        
        
        
         $purchase->fechacompra= $request->get('fechacompra');
         $purchase->nit = $request->get('nit');
         
         $purchase->update($request->all()); //Editar un registro.
         Flash::success("la compra fue modificada con exito");
         return redirect()->route('purchases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete(); 
        return redirect()->route('purchases.index')
                        ->with('success', 'compra eliminada con éxito');
    }
}
