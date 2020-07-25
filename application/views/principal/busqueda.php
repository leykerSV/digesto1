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
              <th scope="col">LEER</th>
              <th scope="col">BAJAR</th>
            </tr>
          
          </thead>
          <tbody>
              <?php foreach ($listaNormas as $item): ?>
                      <tr>
                          <th> <?php
                                $atts = array('width' => '800', 'height' => '600', 'scrollbars' => 'yes', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '20', 'screeny' => '20'); 
                                echo anchor_popup('/inicio/detalles/'.$item['numero']."/".$item['tipo'], 'VER', $atts); ?> </th>
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
                            <th><a href="<?php echo base_url('/normas/'.$item['archivo']); ?>" target="_blank">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-book-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
                              <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869z"/>
                            </svg>
                            </a>
                            </th>

                            <th><a href="<?php echo base_url('/normas/'.$item['archivo']); ?>" download="<?php echo $item['archivo']; ?>">
                              <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-box-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 11.646a.5.5 0 0 1 .708 0L8 14.293l2.646-2.647a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708z"/>
                                <path fill-rule="evenodd" d="M8 4.5a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd" d="M2.5 2A1.5 1.5 0 0 1 4 .5h8A1.5 1.5 0 0 1 13.5 2v7a1.5 1.5 0 0 1-1.5 1.5h-1.5a.5.5 0 0 1 0-1H12a.5.5 0 0 0 .5-.5V2a.5.5 0 0 0-.5-.5H4a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h1.5a.5.5 0 0 1 0 1H4A1.5 1.5 0 0 1 2.5 9V2z"/>
                              </svg>
                            </a>
                            </th>
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