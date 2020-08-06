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
        </div>
        <div class="col-md-9">
        <div class="frame">
        <div class="nav" align=center>
            <?php
                $success_msg= $this->session->flashdata('success_msg');
                $error_msg= $this->session->flashdata('error_msg');

                if($success_msg){
                    ?>
                    <div class="alert alert-success">
                        <?php echo $success_msg; ?>
                    </div>
                    <?php
                }
                if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                    <?php echo $error_msg; ?>
                    </div>
                    <?php
                }
            ?>
            <div ng-app ng-init="checked = false">
                <?php echo form_open('alta/verifylogin', 'class="form-signin"'); ?>
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <label for="username">Usuario</label>
                            <input class="form-styling" type="text" name="username" id="username" placeholder=""/>
                        </div>
                        <div class="input-group mb-3">
                            <label for="password">Contraseña</label>
                            <input class="form-styling" type="password" name="password" id="password" placeholder=""/>
                        </div>
                        <div class="input-group mb-3">
                            <div class="btn-animate">
                                <button class="btn-signin" type="submit">Ingresar</button>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>   
</div>  