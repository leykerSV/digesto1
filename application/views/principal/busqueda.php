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
  <div class="card bg-light mb-3">
    <div class="card-header">
      Número de Norma a Buscar
    </div>
    <div class="card-body">
      <div class="input-group mb-3">
        <input type="text" name="busquedanorma" value="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="busquedanorma" placeholder="Escriba el numero de Norma a Buscar" />
      </div>
    </div>
  </div>
  <div class="row"> 
    <div class="col">
      <div class="card text-white bg-info mb-3">
        <div class="card-header">
          Tipo de Norma
        </div>
        <div class="card-body" align="center">
        <div class="form-check-inline">
                <?php 
                foreach($all_tipo as $tipo)
                {
                  echo '<label class="form-check-label">';
                  echo '<input type="checkbox" class="form-check-input" value="'.$tipo->codigo.'">'.$tipo->nombre.'   </input>';
                  echo '</label>';
                }
                ?>
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" value="0">Todos
                </label>
              </div>  
        </div>
      </div>
    </div> 
    <div class="col">
      <div class="card text-white bg-info mb-3">
        <div class="card-header">
          Rango de Fechas de la Norma
        </div>
        <div class="card-body">

        </div>
      </div>
    </div>
  </div>
</div>
  

    
  </p>
   
  <div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Buscar</button>
    </div>
	</div>
  <?php if(isset($contador)){?>
    <div class="alert alert-info">Se encontraron <?php echo $contador ?> Normas que coiciden con el criterio de búsqueda</div>
  <?php } ?>
	
<?php
	if(isset($listaNormas)) {

?>
  <nav aria-label="Page navigation example">
    <div class="table-responsive">
          <table class="table table-striped">
          <thead  class="thead-dark">
          <tr>
              <th scope="col">Tipo</th>
              <th scope="col">N° Norma</th> 

              <th width=120 scope="col">F. Sanción</th>

              <th width=120 scope="col">F. Promulgacion</th>

              <th scope="col">Contenido</th>
              <th scope="col">Archivo</th>
            </tr>
          
          </thead>
          <tbody>
              <?php foreach ($listaNormas as $item): ?>
                      <tr>
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
                          }else{ ?>
                            <th> <?php echo anchor_popup(base_url('/normas/'.$item['archivo']), $item['archivo'], ''); ?> </th>
                          <?php } ?>
                          
                      </tr>

              <?php endforeach; ?>
            </tbody>
      </table>
    </div>
  </nav>

	<?php } ?>

</small>
<?php echo form_close(); ?>
</div>