<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Consulta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Insertar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#doc" role="tab">Documento</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel">
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-4">
                    <?php echo form_open('acta/busqueda'); ?>
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
                    <?php echo form_open('acta/mostrar');?>
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
                        <?php echo $value->num_cert; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url('acta/eliminar')."/".$value->cod_registro;
                            ?>">Eliminar</a>
                        <a class="btn btn-primary" href="<?php echo base_url('acta/editar')."/".$value->cod_registro; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
        <?php echo $this->pagination->create_links(); ?>
    </div>

    <div class="tab-pane" id="profile" role="tabpanel">
        <br>
        <form method="POST" action=" <?php echo base_url('acta/insertar_Acta') ?>">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Código de Registro</label>
                    <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="RE00">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword">Código de Anuncio</label>
                    <select name="txtpra" id="inputState" class="form-control">
                        <?php foreach ($datos_Practica as $value) { ?>
                        <option value="<?php echo $value->cod_prac; ?>">
                            <?php echo $value->cod_prac; ?>
                        </option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword">Fecha de Inscripción</label>
                    <input name="txtins" type="text" class="form-control" id="inputEmail4" placeholder="2017-01-01">
                </div>
                <div class="col-md-3">
                    <label for="inputPassword4">Código de Certificado</label>
                    <input name="txtnum" type="text" class="form-control" id="inputPassword4" placeholder="2017-2">
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <div class="tab-pane" id="doc" role="tabpanel">
        <br>

        <table class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <h2>Libro de Actas</h2>
                    </div>
                    <div class="form-row">
                        <?php echo form_open_multipart('acta/do_upload_act');?>
                        <div class="form-group col-md-4">
                            <label for="inputPassword">Código de Avance</label>
                            <select name="txtcod" id="inputState" class="form-control">
                                <?php foreach ($list_Acta as $value) { ?>
                                <option value="<?php echo $value->cod_registro; ?>">
                                    <?php echo $value->cod_registro; ?>
                                </option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-row">

                            <input type="file" name="userfile" size="80" class="btn btn-primary" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <?php echo form_submit("", "Subir Informe", "class= 'btn btn-outline-primary'");?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <h2>Informes de Avance</h2>
                    </div>
                    <div class="form-row">
                        <?php echo form_open_multipart('acta/do_upload_cer');?>
                        <div class="form-group col-md-4">
                            <label for="inputPassword">Código de Avance</label>
                            <select name="txtcod" id="inputState" class="form-control">
                                <?php foreach ($list_Acta as $value) { ?>
                                <option value="<?php echo $value->cod_registro; ?>">
                                    <?php echo $value->cod_registro; ?>
                                </option>
                                <?php  } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-row">

                            <input type="file" name="userfile" size="80" class="btn btn-primary" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <?php echo form_submit("", "Subir Informe", "class= 'btn btn-outline-primary'");?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </table>



    </div>
</div>