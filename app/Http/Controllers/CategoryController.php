<?php

namespace App\Http\Controllers;

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

    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required', 
            'descripcion' => 'required', 
            
        ]);
        
        Category::create($request->all()); 
        return redirect()->route('categories.index')
                            ->with('success', 'Categoria agregado con éxito.');
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
