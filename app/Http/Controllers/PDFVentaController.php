<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Sale;
use App\Product;
use App\SaleDetail; 
use DB;
class PDFVentaController extends Controller
{ 
    public function pdf(Sale $sales)
    {
    $sales=DB::table('sales as v')
    ->join('clients as c', 'v.documento', '=', 'c.documento')
    ->join('salesdetail as sv', 'v.idVenta', '=', 'sv.idVenta')
    ->select('v.idVenta', 'c.documento', 'c.nombre', 'c.apellidos', 'v.fechaVenta', 'sv.valorTotal')
    ->DISTINCT() 
    ->get(); 

    //tabla detalles
    $detalles = DB::table('salesdetail as dv')
    ->join('products as p', 'dv.idproducto', '=', 'p.idproducto')
    ->select('p.nombre as producto', 'dv.cantidad', 'p.precioventa', 'dv.valorTotal')
    ->DISTINCT() 
    ->get();
    $pdf =\PDF::loadView('informeVenta', ["sales"=>$sales, "salesDetails"=>$detalles],
    compact('detalles'));
   return   $pdf->stream('informeVenta.pdf');
}
}