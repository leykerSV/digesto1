<div class="container-fluid">
<?php echo form_open('inicio/busqueda/',array("class"=>"form-group")); ?>
<small>
  
<div class="container-fluid">
  <div class="card text-white bg-info mb-3">
    <div class="card-header">
      Texto de Referencia a Buscar
    </div>
    <div class="card-body">
      <div class="input-group mb-3">
        <input type="text" name="busqueda" value="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="busqueda" placeholder="Escriba un texto, numero, etc." />
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="col">
      <div class="card text-white bg-info mb-3">
        <div class="card-header">
          N° de Norma
        </div>
        <div class="card-body">
          <div class="input-group mb-3">
            <input type="text" name="busquedanorma" value="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="busquedanorma" placeholder="Escriba el numero de Norma a Buscar" />
          </div>
        </div>
      </div>
    </div> 
    <div class="col">
      <div class="card text-white bg-info mb-3">
        <div class="card-header">
          Tipo de Norma
        </div>
        <div class="card-body" align="center">
          <p></p>
          <div class="form-check-inline">
                <?php 
                foreach($all_tipo as $tipo)
                {
                  echo '<label class="form-check-label">';
                  echo '<input type="checkbox" name="tipo_norma[]" class="form-check-input" value="'.$tipo->codigo.'">'.$tipo->nombre.'   </input>';
                  echo '</label>';
                }
                ?>

            </div> 
            <p></p> 
        </div>
      </div>
    </div> 
    <div class="col">
      <div class="card text-white bg-info mb-3">
        <div class="card-header">
          Rango de Años
        </div>
        <div class="card-body">
          <div class="input-group mb-3">
            <input type="text" name="fechadesde" value="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="fechadesde" placeholder="Año Desde" />
            <input type="text" name="fechahasta" value="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="fechahasta" placeholder="Año Hasta" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  

    
  </p>
   
  <div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-info">Buscar</button>
    </div>
	</div>
  <?php if(isset($contador)){?>
    <div class="alert alert-info">Se encontraron <?php echo $contador ?> Normas que coinciden con el criterio de búsqueda</div>
  <?php } ?>
	
<?php
	if(isset($listaNormas)) {

?>
  <nav aria-label="Page navigation example">
    <div class="table-responsive">
          <table class="table table-striped">
          <thead  class="thead-dark">
          <tr>
              <th scope="col">Detalles</th>
              <th scope="col">Tipo</th>
              <th scope="col">N° Norma</th> 

              <th width=120 scope="col">F. Sanción</th>

              <th width=120 scope="col">F. Promulgacion</th>

              <th scope="col">Contenido</th>
              <th scope="col">VER</th>
              <th scope="col">BAJAR</th>
            </tr>
          
          </thead>
          <tbody>
              <?php foreach ($listaNormas as $item): ?>
                      <tr>
                          <th><a href="<?php anchor(); ?>"</a>VER</th>
                          <?php 
                            foreach($all_tipo as $tipo)
                            {
                              if ($tipo->codigo==$item['tipo']){
                                $tiponorma=$tipo->nombre;
                              }
                            } 
                          ?>
                          <th> <?php echo $tiponorma ?> </th>
                          <th> <?php echo $item['numero'] ?> </th>

                          <?php if (is_null($item['fechasancion'])){ 
                            echo '<th> -- </th>';    
                          }else{ ?>
                            <th><?php echo date('d-m-Y',strtotime($item['fechasancion'])) ?></th>
                          <?php } ?>
                           

                          <?php if (is_null($item['fechapromulgacion'])){ 
                            echo '<th> -- </th>';    
                          }else{ ?>
                            <th><?php echo date('d-m-Y',strtotime($item['fechapromulgacion'])) ?></th> 
                          <?php } ?>
                          
                          <th> <?php echo $item['contenido'] ?> </th>
                          <?php if ($item['archivo']==""){ 
                            echo '<th>Sin Archivo Asociado</th>';   
                            echo '<th>Sin Archivo Asociado</th>';  
                          }else{ ?>
                            <th> <?php echo anchor_popup(base_url('/normas/'.$item['archivo']), 'VER', ''); ?> </th>
                            <th><a href="<?php echo base_url('/normas/'.$item['archivo']); ?>" download="<?php echo $item['archivo']; ?>">BAJAR</a></th>
                          <?php } ?>
                          
                      </tr>

              <?php endforeach; ?>
            </tbody>
      </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </nav>

	<?php } ?>

</small>
<?php echo form_close(); ?>
</div>