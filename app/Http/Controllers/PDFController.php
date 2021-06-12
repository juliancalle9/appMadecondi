<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Product;
use App\Purchasedetail; 
use DB;

class PDFController extends Controller
{
    public function pdf(Purchase $purchases )
    {    $purchases=DB::table('purchases as c')
        ->join('suppliers as p', 'c.id', '=', 'p.id')
        ->join('purchasesdetails as dp', 'c.idcompra', '=', 'dp.idcompra')
        ->select('c.idcompra', 'p.nit', 'p.nombre',  'c.fechacompra', 'dp.precioFinal')
        ->DISTINCT() 
        ->get(); 

        //tabla detalles
        $detalles = DB::table('purchasesdetails as dp')
        ->join('products as p', 'dp.idproducto', '=', 'p.idproducto')
        ->select('p.nombre as producto', 'dp.cantidad', 'p.preciocompra','dp.precioFinal')
        ->DISTINCT() 
        ->get();
       
        $pdf =\PDF::loadView('informe', ["purchases"=>$purchases, "purchasesdetails"=>$detalles],
        compact('detalles'));
       return   $pdf->stream('informe.pdf');
      }
}
