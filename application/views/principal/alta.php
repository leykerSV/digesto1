<?php echo form_open('alta/alta/',array("class"=>"form-group")); ?>
<small>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Alta de Normativa</legend>
                        
                        <div class="col-sm-3">
                          <select class="form-control">
                          <?php 
                            foreach($all_tipo as $tipo)
                              {
                                echo '<option name="tipo_norma" value="'.$tipo->codigo.'">'.$tipo->nombre.'</option>';
                              } 
                          ?>
                          </select>
                        </div>

   
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="numero" name="numero" type="numeric" placeholder="Numero de Norma" class="form-control">
                            </div>
                            <?php echo form_error('numero'); ?>
                        </div>


                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="expedientechm" name="expedientechm" type="text" placeholder="Expediente CHM" class="form-control">
                            </div>
                            <?php echo form_error('expedientechm'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fechasancion" name="fechasancion" type="text" placeholder="Fecha Sanción" class="form-control">
                            </div>
                            <?php echo form_error('fechasancion'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="expedientedem" name="expedientedem" type="text" placeholder="Expediente DEM" class="form-control">
                            </div>
                            <?php echo form_error('expedientedem'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fechapublicacion" name="fechapublicacion" type="text" placeholder="Fecha Publicación" class="form-control">
                            </div>
                            <?php echo form_error('fechapublicacion'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="origen" name="origen" type="text" placeholder="Origen" class="form-control">
                            </div>
                            <?php echo form_error('origen'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="autor" name="autor" type="text" placeholder="Autor" class="form-control">
                            </div>
                            <?php echo form_error('autor'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="contenido" name="contenido" placeholder="Contenido de la Norma. Se recomienda usar descriptores" rows="7"></textarea>
                            </div>
                            <?php echo form_error('contenido'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Otras Observaciones" rows="7"></textarea>
                            </div>
                            <?php echo form_error('observaciones'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="caracter" name="caracter" type="text" placeholder="Caracter de la Norma" class="form-control">
                            </div>
                            <?php echo form_error('caracter'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="alcance" name="alcance" type="text" placeholder="Alcance" class="form-control">
                            </div>
                            <?php echo form_error('alcance'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="archivo" name="archivo" type="text" placeholder="Archivo" class="form-control">
                            </div>
                            <?php echo form_error('archivo'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="archivoord" name="archivoord" type="text" placeholder="Archivo Ordenanza" class="form-control">
                            </div>
                            <?php echo form_error('archivoord'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nrocaja" name="nrocaja" type="text" placeholder="Nro. de Caja" class="form-control">
                            </div>
                            <?php echo form_error('nrocaja'); ?>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nroord" name="nroord" type="text" placeholder="Nro. de Orden" class="form-control">
                            </div>
                            <?php echo form_error('nroord'); ?>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
</small>
<?php echo form_close(); ?>