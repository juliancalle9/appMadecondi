<?php

namespace App\Http\Controllers;
use App\Client; 
use Flash;
use DataTables;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function clients(){

    }

    public function index(){
        $clients = Client::all(); 
        return view('clients.index', compact('clients')); 
    }

    /*public function list(Request $request){
        $clients = Client::all();

        return DataTables::of($clients)
            ->editColumn("estado", function($client){
                return $clients->estado == 1 ? "Activo" : "Inactivo";
            })
            ->addColumn('editar', function ($clients) {
                return '<a class="btn btn-pimary bt-sm" href="clients.edit' .$clients->documento.'"> Editar</a>';
            })
            ->addColumn('cambiar', function ($clients) {
                if($clients->estado == 1){
                    return '<a class="btn btn-danger bt-sm" href="clients.edit/cambiar/estado/' .$clients->documento.'/0"> Inactivar</a>';
                }else{
                    return '<a class="btn btn-success bt-sm" href="clients.edit/cambiar/estado/' .$clients->documento.'/1"> Activar</a>';
                }
            })
            ->rawColumns(['editar', 'cambiar'])
            ->make(true);
    }*/

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

    public function updateState($documento, $estado){
        $client = Client::find($documento);

        if($client==null){
            Flash::error("Cliente no encontrado");
            return redirect("clients.index");
        }

        try{
            $client->update(["estado"=>$estado]);
            Flash::success("Se modifico el estado del cliente");
            return redirect("clients.index");
        }catch(\Exception $e){
            Flash::error($e->getMessage());
            return redirect("clients.index");
        }
    } 

    public function cambiarEstado(Request $request)
    {
        $clients = Client::findOrFail($request->documento);
        $clients->estado = $request->estado;
        $clients->save();
    
        return response()->json(['message' => 'User status updated successfully.']); 
    }
    

}
