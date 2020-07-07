<?php echo form_open('inicio/busqueda/',array("class"=>"form-horizontal")); ?>
<h5>Buscar Normas</h5>
<small>

  
  <div class="form-group">
    <div class="col-md-8">
      <label for="busqueda" class="col-md-4 control-label">Buscar en Contenido - (Palabra Clave)</label>
      <input type="text" name="busqueda" value="" class="form-control" id="busqueda" />
		</div>
  </div>

    <div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Buscar</button>
        </div>
	</div>
	
<?php
	if(isset($listaNormas)) {

?>
	<div class="table-responsive">
        <table class="table table-striped">
         <thead  class="thead-dark">
         <tr>
            <th scope="col">Tipo</th>
            <th scope="col">N° Norma</th> 
            <th scope="col">Expediente</th>  
            <th scope="col">F. Sanción</th>
            <th scope="col">Exp. DEM</th>
            <th scope="col">F. Promulgacion</th>
            <th scope="col">Autor</th>
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
                            //if ($tipo['codigo']==$item['tipo']){
                              //$tiponorma=$tipo['nombre'];
                            //}
                          } 
                        ?>
                        <th> <?php echo $item['tipo'] ?> </th>
                        <th> <?php echo $item['numero'] ?> </th>
                        <th> <?php echo $item['expedientechm'] ?> </th>
                        <th> <?php echo $item['fechasancion'] ?> </th>
                        <th> <?php echo $item['expedientedem'] ?> </th>
                        <th> <?php echo $item['fechapromulgacion'] ?> </th>
                        <th> <?php echo $item['autor'] ?> </th>
                        <th> <?php echo $item['contenido'] ?> </th>
                        <th> <?php echo anchor_popup(base_url('/normas/'.$item['archivo']), $item['archivo'], ''); ?> </th>
                        
                    </tr>

            <?php endforeach; ?>
          </tbody>
		</table>
	</div>

	<?php } ?>

</small>
<?php echo form_close(); ?>