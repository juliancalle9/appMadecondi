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
    {
        $categories = Category::all();
    
      $products =DB::table('products')
      ->join('categories', 'categories.idcategoria', '=', 'products.idcategoria')
      ->select('products.idproducto','products.nombre', 'products.precioventa','preciocompra',
      'products.stock','products.estado','categories.nombre as categoria','categories.descripcion')
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
        $request->validate([
            'nombre' => 'required', 
            'stock' => 'required',
            'precioventa' => 'required',
            'preciocompra' => 'required',
            'idcategoria' => 'required'
        ]);
        $input = $request->all();
        Product::create($request->all());
             Flash::success("el producto fue creado con exito");
             return redirect()->route('products.index')->with('status', 'Producto guardado con éxito.');
}
    public function show(Product $product)
    {

        return view('products.show', compact('product')); 
    
    }

    public function edit($idproducto)
    {
        $categories = Category::all();
        return view('products.edit',['product' => Product::find($idproducto)],compact('categories'));
        
    }

    public function update(productFormRequest $request, Product $product)
    {
        $request->validate([
            'nombre' => 'required', 
            'stock' => 'required',
            'precioventa' => 'required',
            'preciocompra' => 'required',
            'idcategoria' => 'required'
        ]);
        
        
       
        
        $product->update($request->all()); //Editar un registro.
        
        return redirect()->route('products.index')->with('status', 'Producto actualizado con éxito.');
    }

    public function changeStatus(Request $request) {
        $product = Product::find($request->idproducto);
        $product->estado = $request->estado;
        $product->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    
    public function destroy(Product $product)
    {
        $product->delete(); 
        return redirect()->route('products.index')
                        ->with('success', 'Producto eliminado con éxito');
    }
}
