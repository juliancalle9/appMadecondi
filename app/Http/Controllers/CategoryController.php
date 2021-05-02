<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryFormRequest;
use App\Category;
use Flash;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all(); // almaneca en la variable los productos
        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    
    public function store(categoryFormRequest $request)
    {
<<<<<<< HEAD
        $input = $request->all();
        Category::create($request->all());
             Flash::success("La Categoria fue creada con exito");
             return redirect()->route('categories.index');
          
=======
        $request->validate([
            'nombre' => 'required', 
            'descripcion' => 'required', 
            
        ]);
        
        Category::create($request->all()); 
        return redirect()->route('categories.index')
                            ->with('success', 'Categoria agregado con éxito.');
>>>>>>> 65e72a41d7c8351a73641f479eb81f17f27353f2
    }


    public function show(Category $category)
    {
        return view('categories.show', compact('category')); 
    }

    public function edit($idcategoria)
    {
        return view('categories.edit',['category' => Category::find($idcategoria)]);
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
