<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="{{ asset('css/paginaweb.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>Madecondi</title>
</head>
<body>
<header>
 	 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  
  <a class="navbar-brand" href="#"><img src="../public/image/Madecondi(1).jpg"  alt="Logo Empresa" class="img-fluid rounded-circle" style="width: 90px;
	height: 70px;" ></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse  d-flex justify-content-end" id="navbarText">
     
      <span class="navbar-text">
         <ul class="nav ">
         <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('PaginaWeb.index')}}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#producto">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#conocenos">Conocenos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#contacto">Contactanos</a>
        </li>
      </ul>
      </span>
</div>

    
</nav>  
<div class="cover d-flex justify-content-center align-items-center flex-column">
<h1>Madecondi s.a.s</h1>
<p>Madejas y condimentos</p>

</div> 
</header>
<section>
  <div class="container mt-5 mb-5">
    <div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
<div class="card" style="width: 18rem;">
<div title="Madeja de cerdo" class="cover cover-small" style="background-image: url(../public/image/foto1.jpg)" class="card-img-top">
</div>
  <div class="card-body">
    <h5 class="card-title">Tripa Natural de cerdo</h5>
    <p class="card-text">La tripa natural de cerdo entubada se utilizan para un sinfín de variedades de salchichas y embutidos, como la salchicha para hacer a la parrilla, la bockwurst, la morcilla blanca y negra, el chorizo, embutidos cocidos, el pepperoni, la salchicha italiana y la bratwurst..</p>
    
  </div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3">
<div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/foto2.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Condimentos</h5>
    <p class="card-text">Un condimento o aderezo es un ingrediente o mezcla añadida a la comida para darle un sabor especial o complementarla. A menudo fuertes de sabor y por tanto incluidos en pequeñas cantidades...</p>
    
  </div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3">
<div class="card" style="width: 18rem;">
<div title="Cerdos colgados"  class="cover cover-small" style="background-image: url(../public/image/cerdo1.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Procesos</h5>
    <p class="card-text">Obtencion de la tripa en empresas dedicadas a la importacion de tripas de cerdo, clasificacion de madejas. Calibrar para determinar el grosor y perforaciones, salado, secado y empacado</p>
    
  </div>
</div>
</div>

<div class="col-12 col-sm-6 col-md-4 col-lg-3">
<div class="card" style="width: 18rem;">
  <div title="Madeja Clasificada y colgada"  class="cover cover-small" style="background-image: url(../public/image/azul.jpeg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Subprocesos</h5>
    <p class="card-text">Clasificar la tripa por medio del calibre y metraje, Hilos de diferentes colores para identificar el calibre, dejarlas colgadas durante 15 horas y por ultimo empacar en bolsas transparentes para enviar a bodega</p>
    
  </div>
</div>
</div>
</div>
</div>
</section>
<section>
  
<div class="container mt-5 mb-5" id="contacto">
  <div class="row">
  <div class="col-12 col-sm-6  col-lg-5">
  <img src="../public/image/MessyDoodle.svg" alt="una persona con muchos mensajes"/>
</div>
<div class="col-12 col-sm-6  col-lg-5 d-flex justify-content-center align-items-center flex-column text-center">
<h3>100% natural de cerdo!</h3>
  <h4>Siempre brindando el mejor servicio puedes comunicarte al 3136017340 o 3146341132 para una mejro asesorìa</h4>
</div>

</section>
     <section>
     <div class="container mt-5 mb-5" id="producto">
     <h3>Nuestros Productos</h3>
     <div class="product-stripe">
     <div class="stripe-container">
     <!--madeja 26-28 -->
     <div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/amari.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Madeja 26-28</h5>   
  </div>
</div>
<!--madeja 28-30 -->
<div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/corrugada.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Madeja corrugada</h5> 
  </div>
</div>
<!--madeja 30-32 -->
<div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/roja.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Madeja 30-32</h5>  
  </div>
</div>
<!--Ajo -->
<div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/Ajo.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Ajo En polvo</h5>
  </div>
</div>
<!--Comino entero -->
<div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/comino-entero.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Comino Entero</h5>
  </div>
</div>
<!--Comino en polvo -->
<div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/molido.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Comino en polvo</h5>  
  </div>
</div>
<!--Color -->
<div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/color.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Color</h5>    
  </div>
</div>
<!--humo -->
<div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/humo.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Humo</h5> 
  </div>
</div>
<!--crispeta-->
<div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/crispeta.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Crispeta</h5>
    
  </div>
</div>

     </div>
     </div>
     </div>
     </section>
     <section>
  <div class="container mt-5 mb-5 " id="conocenos">
    <div class="row">
    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
<div class="card" style="width: 18rem;">
<div title="Madeja de cerdo" class="cover cover-small" style="background-image: url(../public/image/cerdo.jpg)" class="card-img-top">
</div>
  <div class="card-body">
    <h5 class="card-title">Quienes Somos?</h5>
    <p class="card-text" style="min-height: 24rem;">La empresa MADECONDI S.A.S ubicada en Girardota Antioquia vereda el totumo, 
                    es una empresa dedicada desde hace mas de diez años a la clasificación y 
                    comercialización de tripa natural de cerdo, la cual es utilizada para hacer 
                    chorizos, morcilla y butifarras, “embutidos”. A su vez se dedica a la 
                    comercialización de  condimentos para uso comestible en todo lo relacionado 
                    con los cárnicos. Actualmente la empresa está reconocida legalmente por su 
                    buen servicio y calidad.</p>
    
  </div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3">
<div class="card" style="width: 18rem;">
<div title="Condimentos" class="cover cover-small" style="background-image: url(../public/image/mision.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Mision</h5>
    <p class="card-text" style="min-height: 24rem;"> comercializa la mejor tripa de cerdo 100% natural, 
    nuestra misiòn es satisfacer las necesidades del cliente para ofrecerles la mejor experiencia con los
     productos comercializando la mejor tripa de cerdo 100% natural, define el mercado en el que se desarrolla
    la empresa y la imagen publìca de la organizacion</p>
    
  </div>
</div>
</div>
<div class="col-12 col-sm-6 col-md-4 col-lg-3">
<div class="card" style="width: 18rem;">
<div title="Cerdos colgados"  class="cover cover-small" style="background-image: url(../public/image/vision1.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Vision</h5>
    <p class="card-text" style="min-height: 24rem;">ofrecer la mejor experiencia de productos carnicos. 
    Ser un excelente lugar para trabajar. Donde el personal se inspire para dar siempre lo mejor de si.
    Ofrecer a nuestros clientes un cartelera de productos sazonadores y carnicos que se anticipan y satisfacen los deseos
  y necesidades de las personas </p>
    
  </div>
</div>
</div>

<div class="col-12 col-sm-6 col-md-4 col-lg-3">
<div class="card" style="width: 18rem;">
  <div title="Madeja Clasificada y colgada"  class="cover cover-small" style="background-image: url(../public/image/despacho.jpg)" class="card-img-top" >
</div>
  <div class="card-body">
    <h5 class="card-title">Productos y despachos</h5>
    <p class="card-text" style="min-height: 24rem;">Hacemos despachos a todo el nivel nacional, con todos los protocoles de bioseguridad.

Obtención de la tripa en empresas dedicadas a la importación de tripa de cerdo

Clasificación de madejas. Calibrar para determinar el grosor y perforaciones

Metrado para formar la madeja, de acuerdo a las necesidades del cliente.

Salado y secado

Empacado</p>
    
  </div>
</div>
</div>
</div>
</div>
</section>
     <section>
     <div class="container mt-5 mb-5">
     <h3>Aqui nos encontramos:</h3>
    <h5>Vereda El totumo en girardota Antioquia</h5>
    
     <div class="responsive-iframe">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31721.25975780095!2d-75.48415968580036!3d6.373662255460574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e443b32351b505b%3A0xa13dbe4f81a49323!2sVda.%20El%20Totumo%2C%20Girardota%2C%20Antioquia!5e0!3m2!1ses!2sco!4v1624452042383!5m2!1ses!2sco" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
     </div>
     </div>
     </section>

     <section>
     <div class="container mt-5 mb-5 mr-5 ">
     <div class="comments">
     <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v11.0" nonce="Ks97BaCJ"></script>
     </div>
     <div class="fb-comments" data-href="http://localhost/appMadecondi/public/PaginaWeb" data-width="700" data-numposts="5"></div>
     </div>
    </section>
</body>
</html>