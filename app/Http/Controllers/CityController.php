<?php

namespace App\Http\Controllers;

use App\Http\Requests\cityFormRequest;
use App\City;
use App\Supplier;
use Flash;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all(); 
        return view('cities.index',compact('cities'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cityFormRequest $request)
    {
        //$request->validate(City::$rules);
     $input = $request->all();
     City::create($request->all());
          Flash::success("La ciudad fue creada con exito");
          return redirect()->route('cities.index');
      
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($idciudad)
    {
        return view('cities.edit',['city' => City::find($idciudad)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(cityFormRequest $request, $idciudad)
    {
        $city = City::find($idciudad);

        $city->nombre = $request->get('nombre');
       
        $city->update($request->all()); //Editar un registro.
        Flash::success("La ciudad fue modificada con exito");
        return redirect()->route('cities.index');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
 
}
