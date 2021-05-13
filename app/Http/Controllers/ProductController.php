<?php

namespace App\Http\Controllers;
use App\Http\Requests\productFormRequest;
use App\Product;
use App\Category;
Use Flash;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
    
      $products =DB::table('products')
      ->join('categories', 'categories.idcategoria', '=', 'products.idcategoria')
      ->select('products.idproducto','products.nombre', 'products.preciounitario','categories.nombre as categoria')
      ->get();
        return view('products.index',compact('products'));

    }

    public function create()
    {  
        $categories = Category::all();
        return view('products.create', compact('categories'));

    }

    
    public function store(productFormRequest $request)
    {

        $input = $request->all();
        Product::create($request->all());
             Flash::success("el producto fue creado con exito");
             return redirect()->route('products.index');
}
    public function show(Product $product)
    {

        return view('products.show', compact('product')); 
    
    }

    public function edit($idproducto)
    {
        return view('products.edit',['product' => Product::find($idproducto)]);
        
    }

    public function update(productFormRequest $request, $idproducto)
    {
        $product = Product::find($idproducto);
        
       // $client->documento = $request->get('documento');
       
        $product->nombre= $request->get('nombre');
        $product->preciounitario = $request->get('preciounitario');
        $product->estado = $request->get('estado');
        $product->idcategoria = $request->get('idcategoria');
        $product->idlote = $request->get('idlote');
        
        $product->update($request->all()); //Editar un registro.
        Flash::success("el producto fue modificado con exito");
        return redirect()->route('products.index');
    }

    
    public function destroy(Product $product)
    {
        $product->delete(); 
        return redirect()->route('products.index')
                        ->with('success', 'Producto eliminado con éxito');
    }
}
