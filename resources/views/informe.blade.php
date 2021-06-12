 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inforemes de compras</title>
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
    <a class="btn btn-primary" href="{{route('purchases.index')}}">Volver</a>
</div>
</div>
<div class="card">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#A9D0F5">
                        <th>Id Compra</th>
                        <th>Productos</th>
                        <th>Cantidad</th>
                        <th>Fecha Compra</th>
                        <th>Precio Compra</th>
                        <th>Precio Final</th>
                        
                    </thead>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        
                         
                    </tfoot>
                    <tbody>
                    <tr>

                    @foreach($purchases as $purchase)
                    <td>{{$purchase->idcompra}}</td>
                    <td>{{$purchase->fechacompra}}</td>
                    @endforeach
                    
                        @foreach($purchasesdetails as $det)
                       
                            
                            <td>{{$det->producto}}</td>
                            <td>{{$det->cantidad}}</td>
                            
                            <td>{{$det->preciocompra}}</td>
                            <td>{{$det->precioFinal}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</body>
</html>
