<?php echo form_open('alta/nuevo/',array("class"=>"form-group")); ?>
<small>
<div class="form-group">
    <legend class="text-center header">Alta de Normativa</legend>
            <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control">
                          <?php 
                            foreach($all_tipo as $tipo)
                              {
                                echo '<option id="tipo_norma" name="tipo_norma" value="'.$tipo->codigo.'">'.$tipo->nombre.'</option>';
                              } 
                          ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('revisorid');?></span>
                </div>
                <div class="col-md-4">
                    <input id="numero" name="numero" type="numeric" placeholder="Numero de Norma" class="form-control">
                    <span class="text-danger"><?php echo form_error('numero'); ?></span>
                </div>
                <div class="col-md-4">
                    <input id="expedientechm" name="expedientechm" type="text" placeholder="Expediente CHM" class="form-control">
                    <span class="text-danger"><?php echo form_error('expedientechm'); ?></span>
                </div>
            </div>
            </div>
            </div>
            <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input id="fechasancion" name="fechasancion" type="text" placeholder="Fecha Sanción" class="form-control">
                    <?php echo form_error('fechasancion'); ?>
                </div>
                <div class="col-md-4">
                    <input id="expedientedem" name="expedientedem" type="text" placeholder="Expediente DEM" class="form-control">
                    <?php echo form_error('expedientedem'); ?>
                </div>
                <div class="col-md-4">
                    <input id="fechapublicacion" name="fechapublicacion" type="text" placeholder="Fecha Publicación" class="form-control">
                    <?php echo form_error('fechapublicacion'); ?>
                </div>
            </div>
            </div>
            </div>
            <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <textarea class="form-control" id="contenido" name="contenido" placeholder="Contenido de la Norma. Se recomienda usar descriptores" rows="7"></textarea>
                    <?php echo form_error('contenido'); ?>
                </div>
                <div class="col-md-6">
                    <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Otras Observaciones" rows="7"></textarea>
                    <?php echo form_error('observaciones'); ?>
                </div>
            </div>
            </div>
            </div>
            <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input id="origen" name="origen" type="text" placeholder="Origen" class="form-control">
                    <?php echo form_error('origen'); ?>
                </div>
                <div class="col-md-4">
                    <input id="autor" name="autor" type="text" placeholder="Autor" class="form-control">
                    <?php echo form_error('autor'); ?>
                </div>
                <div class="col-md-4">
                    <input id="alcance" name="alcance" type="text" placeholder="Alcance" class="form-control">
                    <?php echo form_error('alcance'); ?>
                </div>
            </div>
            </div>
            </div>
            <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input id="caracter" name="caracter" type="text" placeholder="Caracter de la Norma" class="form-control">
                    <?php echo form_error('caracter'); ?>
                </div>
                <div class="col-md-4">
                    <input id="nrocaja" name="nrocaja" type="text" placeholder="Nro. de Caja" class="form-control">
                    <?php echo form_error('nrocaja'); ?>    
                </div>
                <div class="col-md-4">
                    <input id="nroord" name="nroord" type="text" placeholder="Nro. de Orden" class="form-control">
                    <?php echo form_error('nroord'); ?>
                </div>
            </div>
            </div>
            </div>
            <div class="card">
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <input id="archivo" name="archivo" type="text" placeholder="Archivo" class="form-control">
                    <?php echo form_error('archivo'); ?>
                </div>
                <div class="col-md-6">
                    <input id="archivoord" name="archivoord" type="text" placeholder="Archivo Ordenanza" class="form-control">
                    <?php echo form_error('archivoord'); ?>
                </div>
            </div>
            </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                </div>
            </div>
</div>                      
<?php echo form_close(); ?>