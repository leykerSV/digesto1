
<header>
      <!-- Fixed navbar -->

      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;;">
      <a class="navbar-brand" href="#">
          <img src="<?php echo base_url('assets/imagenes/concejo.png'); ?>" alt="" height=150 width=400>
          
        </a>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              
            </li>
            <li class="nav-item">

            </li>
            <li class="nav-item" align="center">
              <h3>Digesto Municipal v1.0</h3>
            </li>
          </ul>
          <ul class="nav-item">
              <li class="facebook"><a target="_blank" href="https://www.facebook.com/Honorable-Concejo-Municipal-de-Santo-Tom%C3%A9-107661907437256/"><i class="fa fa-facebook-square" aria-hidden="true"></i>Facebook</a></li>
              <li class="twitter"><a target="_blank" href="https://twitter.com/concejo_st"><i class="fa fa-twitter"></i>Twitter</a></li>
              <li class="instagram"><a target="_blank" href="https://www.instagram.com/concejo_santotome/"><i class="fa fa-instagram"></i>Instagram</a></li>
              <li class="youtube"><a target="_blank" href="https://www.youtube.com/channel/UC0XdTsR71POMKawMFmioNYA?view_as=subscriber"><i class="fa fa-youtube"></i>Youtube</a></li>
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
      
      <div class="alert alert-danger">Este Digesto contiene las normas desde el año 1984 en adelante</div>
    </div>
    <div class="col-md-9">
      <?php echo $_view; ?>
    </div>
  </div>

</div>


