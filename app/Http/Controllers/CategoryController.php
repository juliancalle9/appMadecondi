<?php

namespace App\Http\Controllers;

use App\Category;
use Flash;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function categories(){
    
    }
    public function index()
    {
        $categories = Category::all(); // almaneca en la variable los productos
        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(Category::$rules);
        $input = $request->all();
        //City::create($request->all());
         try {
             Category::create([
               "idcategoria"=>$input["idcategoria"],
               "nombre"=>$input["nombre"],
               "descripcion"=>$input["descripcion"]
             ]);
   
             Flash::success("La categoria fue creada con exito");
             return redirect()->route('categories.index');
         }catch(\Exception $e){
           Flash::error($e->getMessage());
             return redirect()->route('categories.create');
         }
          
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category')); 
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category')); 
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nombre' => 'required', 
            'descripcion' => 'required',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
                            ->with('success', 'Categoria actualizada con éxito.');
    }

    public function destroy(Category $category)
    {
        $category->delete(); 
            return redirect()->route('categories.index')
                            ->with('success', 'Categoria eliminado con éxito');
    }
}
