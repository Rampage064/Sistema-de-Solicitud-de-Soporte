 <!--************************************ Boton Soporte******************************-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="text-center text-info"><a href="./index.php?view=soporte"></span>&nbsp;&nbsp;SOPORTE TECNICO</a></h1>
    </div>
  </div>

 
<!--************ Imagen que reemplaza el carousel para dispositivos moviles ********-->
<div id="img-linux-tux" class="container hidden-lg hidden-md hidden-sm">
    <center><img src="img/slide-header.jpg" class="img-responsive img-rounded" alt="Image"></center>
</div>

<!--************************************Carousel******************************-->
<div class="container hidden-xs">
    <div class="col-xs-20">
<div id="carousel-example-generic" class="carousel slide">

  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  
  </ol>
    <div class="carousel-inner">
       <div class="item active">
           <img src="img/HAPc.png" alt="">
          <div class="carousel-caption">
              PATIO PRINCIPAL
          </div>
       </div>
       <div class="item">
          <img src="img/HAPP.png" alt="">
          <div class="carousel-caption">
              PUERTA PRINCIPAL
          </div>
       </div>
       <div class="item ">
          <img src="img/HAEP.png" alt="">
          <div class="carousel-caption">
              PUERTA EMERGENCIA
          </div>
        </div>
   </div>
   <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
       <span class="icon-prev"></span>
   </a>
   <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
     <span class="icon-next"></span>
   </a>
</div>
        </div>
     <div class="col-sm-200">&nbsp;</div>
</div>

<!--************************************ Fin Carousel ******************************-->
</div>
<script>
    $(document).ready(function(){
        $("#carousel-example-generic").carousel({
            interval: 4000,
        });
    });
</script>

