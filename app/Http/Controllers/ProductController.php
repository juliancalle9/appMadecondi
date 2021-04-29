<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
        public function products(){
    
        }

    public function index()
    {
        $products = Product::all(); // almaneca en la variable los productos
        return view('products.index',compact('products'));

    }
    public function create()
    {
        return view('products.create');
     
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 
            'estado' => 'required',
            'preciounitario' => 'required', 
            'idcategoria' => 'required',
            'idlote' => 'required',
        ]);
            
        Product::create($request->all()); 
        return redirect()->route('products.index');
                                
        
    }

    public function show(Product $product)
    {
        
            return view('products.show', compact('product')); 
        
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product')); 
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nombre' => 'required', 
            'estado' => 'required',
            'preciounitario' => 'required', 
            'idcategoria' => 'required',
            'idlote' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                            ->with('success', 'Producto actualizado con éxito.');
    }

    
    public function destroy(Product $product)
    {
            $product->delete(); 
            return redirect()->route('products.index')
                            ->with('success', 'Producto eliminado con éxito');
    }
}
