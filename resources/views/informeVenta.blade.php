<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>informes de Venas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
</head>
<body>
<div class="col-lg-12 margin-tb card-header">

<div class="pull-left">
    <h2>Compras</h2>
</div>
<div class="pull-right">
    <a class="btn btn-primary" href="{{route('sales.index')}}">Volver</a>
</div>
</div>
<div class="card">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#A9D0F5">
                        <th>Id Venta</th>
                        <th>Productos</th>
                        <th>Cantidad</th>
                        <th>Fecha Venta</th>
                        <th>Precio Venta/th>
                        <th>Valor Total</th>
                        
                    </thead>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        
                         
                    </tfoot>
                    <tbody>
                    <tr>

                    @foreach($sales as $sale)
                    <td>{{$sale->idVenta}}</td>
                    <td>{{$sale->fechaVenta}}</td>
                    @endforeach
                    
                        @foreach($salesDetails as $det)
                       
                            
                            <td>{{$det->producto}}</td>
                            <td>{{$det->cantidad}}</td>
                            
                            <td>{{$det->precioventa}}</td>
                            <td>{{$det->valorTotal}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</body>
</html>
