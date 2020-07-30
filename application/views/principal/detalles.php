
    
    <div class="container-fluid">
        <h2>Detalles de la Norma N° <?php echo $norma[0]["numero"]; ?></h2>
        <div class="row">
            <div class="col">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <a>Tipo de Norma:  <b><?php echo $norma[0]["nombre"]; ?></b></a>
                    </div>
                    <div class="input-group mb-3">
                        <a>Expediente CHM: </a><b><?php echo $norma[0]["expedientechm"]; ?></b>
                    </div>
                    <div class="input-group mb-3">
                        <a>Expediente DEM: </a><b><?php echo $norma[0]["expedientedem"]; ?></b>
                    </div>
                </div>
            </div>
            </div> 
            <div class="col">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <a>Fecha de Sanción:  </a><b><?php echo date('d-m-Y',strtotime($norma[0]["fechasancion"])) ; ?></b> 
                    </div>
                    <div class="input-group mb-3">
                        <a>Fecha de Promulgación:  </a><b><?php echo date('d-m-Y',strtotime($norma[0]["fechapromulgacion"])) ; ?></b>
                    </div>
                </div>
            </div>
            </div> 
            <div class="col">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <div class="input-group mb-3">
                        <a>Origen: </a><b><?php echo $norma[0]["origen"]; ?></b> 
                    </div>
                    <div class="input-group mb-3">
                        <a>Autor: </a><b><?php echo $norma[0]["autor"]; ?></b>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <div class="card text-white bg-info mb-3">

                <div class="card-body">
                    <div class="input-group mb-3">
                        <a>Caracter: </a><b><?php echo $norma[0]["caracter"]; ?></b> 
                    </div>
                    <div class="input-group mb-3">
                        <a>Alcance: </a><b><?php echo $norma[0]["alcance"]; ?></b>
                    </div>
                </div>
            </div>
            </div> 
            <div class="col">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <a>Contenido: </a><b><?php echo $norma[0]["contenido"]; ?></b> 
                            <p></p>
                            <a>Observaciones: </a><b><?php echo $norma[0]["observaciones"]; ?></b> 
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <a>Observaciones: </a><b><?php echo $norma[0]["observaciones"]; ?></b> 
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead  class="thead-dark">
                    <tr>
                        <th scope="col" width=90>Relación</th>
                        <th scope="col" width=90>Tipo</th>
                        <th scope="col" width=90>Número</th>
                        <th scope="col" width=120>Fecha</th>
                        <th scope="col" width=120>Observaciones</th>
                    </tr>
                </thead>
            <tbody>
                
                    <?php 
                        foreach($relaciones as $relac)
                        {
                            echo '<tr>';
                            echo '<th>'.$relac['relacion'].'</th>';
                            echo '<th>'.$relac['nombrer'].'</th>';
                            echo '<th><a href="'.base_url('index.php/inicio/detalles/'.$relac['nronormar']."/".$relac['tiponormar']).'" target="_blank">'.$relac['nronormar'].'</th>';
                            echo '<th>'.date('d-m-Y',strtotime($relac['fecha'])).'</th>';
                            echo '<th>'.$relac['observacion'].'</th>';
                            echo '</tr>';
                        } 
                    ?>

                
            </tbody>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead  class="thead-dark">
                    <tr>
                        <th scope="col" width=90>Relación</th>
                        <th scope="col" width=90>Tipo</th>
                        <th scope="col" width=90>Número</th>
                        <th scope="col" width=120>Fecha</th>
                        <th scope="col" width=120>Observaciones</th>
                    </tr>
                </thead>
            <tbody>
                
                    <?php 
                        foreach($relacionesinversas as $relac)
                        {
                            echo '<tr>';
                            echo '<th>'.$relac['relacion'].'</th>';
                            echo '<th>'.$relac['nombre'].'</th>';
                            echo '<th><a href="'.base_url('index.php/inicio/detalles/'.$relac['nronorma']."/".$relac['tiponorma']).'" target="_blank">'.$relac['nronorma'].'</th>';
                            echo '<th>'.date('d-m-Y',strtotime($relac['fecha'])).'</th>';
                            echo '<th>'.$relac['observacion'].'</th>';
                            echo '</tr>';
                        } 
                    ?>

                
            </tbody>
            </div>
        </div>

    </div>