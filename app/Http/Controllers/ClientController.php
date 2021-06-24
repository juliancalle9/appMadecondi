<?php

namespace App\Http\Controllers;
use App\Http\Requests\clientFormRequest;
use App\Client; 
use Flash;
use DataTables;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $request->validate([
            'documento' => 'required|min:5',
            'nombre' => 'required',
            'apellidos' => 'required',
            'telefono|min:7',
            'correoElectronico',
            'direccion'
        ]);
        
        $input = $request->all();
        Client::create($request->all());
        return redirect()->route('clients.index')
            ->with('status','Cliente agregado correctamente');
       
        
        
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
            'telefono|min:7'
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')
                            ->with('status', 'Cliente actualizado con éxito.');
    }

    
    public function changeStatus(Request $request) {
        $client = Client::find($request->documento);
        $client->estado = $request->estado;
        $client->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
    

}
