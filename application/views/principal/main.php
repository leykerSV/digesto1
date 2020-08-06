
<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand bg-dark text-white-50">
        <a class="navbar-brand">Honorable Concejo Deliberante</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              
            </li>
            <li class="nav-item">

            </li>
            <li class="nav-item">
              
            </li>
          </ul>
          <ul class="socialIcons">
            <li class="facebook"><a href=""><i class="fa fa-fw fa-facebook"></i>Facebook</a></li>
            <li class="twitter"><a href=""><i class="fa fa-fw fa-twitter"></i>Twitter</a></li>
            <li class="instagram"><a href=""><i class="fa fa-fw fa-instagram"></i>Instagram</a></li>
            <li class="pinterest"><a href=""><i class="fa fa-fw fa-pinterest-p"></i>Pinterest</a></li>
            <li class="steam"><a href=""><i class="fa fa-fw fa-steam"></i>Steam</a></li>
          </ul>
        </div>
      </nav>
</header>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" align="center">
      </p>
      <h1 class="h4"><?php //echo $encabezado; ?></h4>
      </p>        
    </div>
  </div>
  <div class="row">
    <div class="col-md-3" align="center">
      <img src="<?php echo base_url('assets/imagenes/concejo.png'); ?>" alt="" width=200 height=200/>
      <div class="alert alert-danger">Este Digesto contiene las normas desde el año 1995 en adelante</div>
    </div>
    <div class="col-md-9">
      <?php echo $_view; ?>
    </div>
  </div>

</div>


