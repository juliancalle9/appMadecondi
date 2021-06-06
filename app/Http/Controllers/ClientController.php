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

    public function store(clientFormRequest $request)
    {
        try{
        $input = $request->all();
        Client::create($request->all());
        Flash::success("Cliente agregado con éxito");
        //return redirect()->route('clients.index');
        
            return redirect()->route('clients.index')
            ->with('status','Cliente agregado correctamente');
        }catch(Throwable $e){
            report($e);
            
        }
        
        
    }

    public function show(Client $client){
        return view('clients.show', compact('client')); 
    }

    public function edit($documento){
        return view('clients.edit',['client' => Client::find($documento)]);
    }

    
    public function changeStatus(Request $request) {
        $client = Client::find($request->documento);
        $client->estado = $request->estado;
        $client->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
    

}
