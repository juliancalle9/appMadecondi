<?php

namespace App\Http\Controllers;
use App\Client; 
use Flash;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function clients(){

    }

    public function index(){
        $clients = Client::all(); 
        return view('clients.index', compact('clients')); 
    }

    public function create(){
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate(client::$rules);
        $input = $request->all();
        
         try {
             client::create([
                "documento"=>$input["documento"],
               "nombre"=>$input["nombre"],
               "apellidos"=>$input["apellidos"],
               "telefono"=>$input["telefono"],
               "correoElectronico"=>$input["correoElectronico"],
               "direccion"=>$input["direccion"]
             ]);
   
             Flash::success("el cliente fue creado con exito");
             return redirect()->route('clients.index');

         }catch(\Exception $e){
           Flash::error($e->getMessage());
             return redirect()->route('clients.create');
         }
          
    }

    public function show(Client $client){
        return view('clients.show', compact('client')); 
    }

    public function edit(Client $client){
        return view('clients.edit', compact('client')); 
    }

    public function update(Request $request, Client $client){
        $request->validate([
            'nombre' => 'required', 
            'apellidos' => 'required',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')
                            ->with('success', 'Cliente actualizado con éxito.');
    }

    public function destroy(Client $client){
        $client->delete(); 
        return redirect()->route('clients.index')
                        ->with('success', 'Cliente eliminado con éxito');
    }

}
