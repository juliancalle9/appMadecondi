<link href="{{ asset('css/formularioi.css') }}" rel="stylesheet">
@extends('adminlte::page');
@section('title', 'Editar Ciudad')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="">
                <div class="pull-left">
                    <h2>Editar Ciudad</h2>
                </div>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cities.index') }}"> Volver</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('cities.update',$city->idciudad) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Nombre:</label>
                            <input type="text" name="nombre"  class="form-control" placeholder="Nombre" value="{{$city->nombre}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </div>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            @endsection
