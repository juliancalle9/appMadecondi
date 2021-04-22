
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>editar ciudad</h2>
            </div>
        </div>
    </div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('cities.index') }}">Atrás</a>
    </div>

    <form action="{{ route('cities.update',$city->idciudad) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            
             
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre"  class="form_control" placeholder="nombre" value="{{$city->nombre}}">
                </div>
            </div>
            @endsection