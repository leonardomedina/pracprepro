<h1>Descarga de Archivos</h1>
<h1>Asesor</h1>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Descarga</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Subida</a>
    </li>
</ul>


<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-4">
                    <?php echo form_open('descarga/busqueda'); ?>
                    <div class="input-group">
                        <?php if ($this->session->userdata("busqueda")) {
							 echo form_input(["type" => "text", "name" => "busqueda", "class" => "form-control", "placeholder" => "Ingrese su busqueda", "value" => $this->session->userdata("busqueda")]);
						}else{
							echo form_input(["type" => "text", "name" => "busqueda", "class" => "form-control", "placeholder" => "Ingrese su busqueda"]); 
						} ?>

                        <span class="input-group-btn">
                            <?php echo form_submit("", "Buscar", "class= 'btn btn-outline-primary'");?>
                        </span>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-md-2">
                    <?php echo form_open('descarga/mostrar');?>
                    <?php echo form_submit("", "Mostrar Todo", "class= 'btn btn-outline-primary'");?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Codigo de Registro</th>
                    <th scope="col">Código de Práctica</th>
                    <th scope="col">Fecha de Insripción</th>
                    <th scope="col">Número de Certificado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buscar_acta as $value) { ?>
                <tr>
                    <td>
                        <?php echo $value->cod_registro; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_prac; ?>
                    </td>
                    <td>
                        <?php echo $value->fecha_ins; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_cert; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url('descarga/descargar')."/".$value->cod_registro;
                            ?>">Descargar</a>
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
        <?php echo $this->pagination->create_links(); ?>

    </div>

    <div class="tab-pane" id="profile" role="tabpanel">
        <br>
        <form method="POST" action=" <?php echo base_url('asesor/insertar_asesor') ?>">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputEmail4">Código de asesor</label>
                    <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="Código de asesor">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Nombre de asesor</label>
                    <input name="txtnom" type="text" class="form-control" id="inputPassword4" placeholder="Nombre de asesor">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

</div>