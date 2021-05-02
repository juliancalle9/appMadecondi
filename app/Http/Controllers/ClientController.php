<?php

namespace App\Http\Controllers;
use App\Http\Requests\clientFormRequest;
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

    public function store(clientFormRequest $request)
    {
        $input = $request->all();
        Client::create($request->all());
             Flash::success("La ciudad fue creada con exito");
             return redirect()->route('clients.index');
          
    }

    public function show(Client $client){
        return view('clients.show', compact('client')); 
    }

    public function edit($documento){
        return view('clients.edit',['client' => Client::find($documento)]);
    }

    
    public function update(Request $request, Client $client){
        $request->validate([
            'nombre' => 'required', 
            'apellidos' => 'required',
            'telefono' => 'required|numeric',
            'correoElectronico',
            'direccion'
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
