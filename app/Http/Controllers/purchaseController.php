<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Requests\purchaseFormRequest;

use Illuminate\Http\Request;

use App\Purchase;
//use App\Supplier;
use App\purchasedetail; 
Use Flash;
use DB;
use Carbon\Carbon;
use Carbon\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;


class purchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
        
            $purchases=DB::table('purchases as c')
            ->join('suppliers as p', 'c.nit', '=', 'p.nit')
            ->join('purchasesdetails as pd', 'c.idcompra', '=', 'pd.idcompra')
            ->select('c.idcompra', 'c.nit', 'p.nombre', 
            'c.fechacompra', 'pd.precioFinal');
            $purchases = $purchases->get();
            return view('purchases.index', compact('purchases'));
   }
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $suppliers=DB::table('suppliers')->get();
        $products=DB::table('products as pro')
        ->select(DB::raw('CONCAT(pro.idproducto, " ", pro.nombre) as producto'),
        'pro.preciounitario')
        ->where('pro.estado', '=', '1')
        ->where('pro.cantidad', '>', '0')
        ->get();    
        return view('purchases.create', ["suppliers"=>$suppliers, "products"=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(purchaseFormRequest $request)
    {
        try{
            DB::beginTransaction(); 
            $purchase = new Purchase; 
            //campos de compras
            $purchase->nit= $request->get('nit');
            $purchase->fechacompra= $request->get('fechacompra');
            $purchase->save(); 
            
            //productos
            $idproducto= $request->get('idproducto');
            $cantidad = $request->get('cantidad'); 
            $precioUnitario = $request->get('preciounitario'); 

            //detalles de compra
            $cont = 0;
            while($cont < count($idproducto)){
                $detalle  = new purchasedetail();
                $detalle->idcompra= $purchase->idcompra;
                $detalle->idproducto=$idproducto[$cont];
                $detalle->cantidad=$cantidad[$cont];
                $detalle->precioFinal=$precioFinal[$cont];
                $detalle->save(); 
                $cont=$cont+1; 
            }
            DB::commit(); 

        }catch(\Exception $e){
            DB::rollback(); 
        }
        return redirect::to('purchases.index');
        $input = $request->all();
        Purchase::create($request->all());
             Flash::success("La compra fue creada con exito");
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
        $purchase=DB::table('purchases as c')
            ->join('suppliers as p', 'c.nit', '=', 'p.nit')
            ->join('purchasesdetails as dp', 'c.idcompra', '=', 'dp.idcompra')
            ->select('c.idcompra', 'p.nit', 'p.nombre',  'c.fechacompra', 'dp.precioFinal')
            ->where('c.idcompra', '=', $idcompra)
            ->first(); 

            //tabla detalles
            $detalles = DB::table('purchasesdetails as dp')
            ->join('products as p', 'dp.idproducto', '=', 'p.producto')
            ->select('p.nombre as producto', 'dp.cantidad')
            ->where('c.idcompra', '=', $idcompra)
            ->get();
            return view('purchases.show', ["purchases"=>$purchases, "purchasesdetails"=>$purchasesdetails]);
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
        
        
        
        $purchase->nombre = $request->get('nombre');
        $purchase->direccion = $request->get('direccion');
        $purchase->telefono = $request->get('telefono');
        $purchase-> precioUnitario= $request->get('precioUnitario');
        $sale-> precioTotal= $request->get('precioTotal');

        
        $sale->update($request->all()); //Editar un registro.
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
