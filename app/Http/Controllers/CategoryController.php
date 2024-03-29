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
        $categories = Category::all(); 
        return view('categories.index',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    
    public function store(categoryFormRequest $request)
    {
        $input = $request->all();
        Category::create($request->all());
             Flash::success("La Categoría fue creada con éxito");
             return redirect()->route('categories.index')->with('status', 'Categoría agregada con éxito.');;
          
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
                                ->with('status', 'Categoría actualizada con éxito.');
        }
    


    public function destroy(Category $category)
    {
        $category->delete(); 
        return redirect()->route('categories.index')
                        ->with('status', 'Categoria eliminado con éxito');
    }
}
