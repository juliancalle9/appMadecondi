<?php

namespace App\Http\Controllers;
use App\Client; 
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function clients(){

    }

    public function index(){
        $clients = Client::latest(); 
        return view('clients.index', compact('clients')); 
    }

    public function create(){
        return view('clients.create');
    }

    public function store(Request $request){
        $request->validate([
            'documento' => 'required', 
            'nombre' => 'required', 
            'apellidos' => 'required', 
        ]);
        
        Client::create($request->all()); 
        return redirect()->route('clients.index')
                            -with('success', 'Cliente agregado con éxito.'); 
    }

    public function show(Client $client){
        return view('clients.show', compact('client')); 
    }

    public function edit(Client $client){
        return view('client.edit', compact('client')); 
    }

    public function update(Request $request, Client $client){
        $request->validate([
            'nombre' => 'required', 
            'apellidos' => 'required',
        ]);

        $client->update($request-all());

        return redirect()->route('clients.index')
                            ->with('success', 'Cliente actualizado con éxito.');
    }
    



}
