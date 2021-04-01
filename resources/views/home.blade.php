    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
 
    @extends('layouts.app')

    @section('content')
    <link href="/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <div class="container">
        <div class="card-body">
            <div class="grid">
                <div>
                    <a href="" class="linkIcono" > 
                        Clientes
                        <img src="{{ asset('image/clientes.png')}}" alt="icono clientes">
                    </a>
                </div>
                <div>
                    <a href="{{ route('suppliers.index')}}">
                        Proveedores
                        <img src="{{ asset('image/proveedores.png')}}" alt="icono proveedores">
                    </a>
                </div>
                <div>
                    <a href="">
                        Productos   
                        <img src="{{ asset('image/producto.png')}}" alt="icono proveedores">
                    </a>
                </div> 
                <div>
                    <a href="">
                        Ventas
                        <img src="{{ asset('image/ventas.png')}}" alt="icono ventas">
                    </a>
                </div>
                <div>
                    <a href="">
                        Compras
                        <img src="{{ asset('image/compras.png')}}" alt="icono compras">
                    </a>
                </div>
                <div>
                    <a href="">
                        Informes
                        <img src="{{ asset('image/pdf.png')}}" alt="icono informes">
                    </a>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        
        </div>
    </div>
    @endsection
