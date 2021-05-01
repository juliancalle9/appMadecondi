<?php

namespace App\Http\Controllers;

use App\Product;
Use Flash;
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
<<<<<<< HEAD

        $request->validate(Product::$rules);
        $input = $request->all();
        
         try {
             Product::create([
                "nombre"=>$input["nombre"],
               "preciounitario"=>$input["preciounitario"],
               "idcategoria"=>$input["idcategoria"]
               
             ]);
   
             Flash::success("el Producto fue creado con exito");
             return redirect()->route('products.index');

         }catch(\Exception $e){
           Flash::error($e->getMessage());
             return redirect()->route('products.create');
         }

        
=======
        $request->validate([
            'idcategoria' => 'required',
            'idlote' => 'required',
            'nombre' => 'required', 
            'preciounitario' => 'required',
            'estado' => 'required',
        ]);
>>>>>>> 80ad89ac493c6f9fc6aac77f8188d90b3f6c0b22
            
        

        
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
            'idcategoria' => 'required',
            'idlote' => 'required',
            'nombre' => 'required', 
            'preciounitario' => 'required',
            'estado' => 'required',
             
           
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
