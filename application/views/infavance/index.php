<h1>Informe de Avance</h1>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Consulta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Insertar</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#doc" role="tab">Documentos</a>
    </li>
</ul>


<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel">
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-4">
                    <?php echo form_open('infavance/busqueda'); ?>
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
                    <?php echo form_open('infavance/mostrar');?>
                    <?php echo form_submit("", "Mostrar Todo", "class= 'btn btn-outline-primary'");?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Codigo de Informe de Avance</th>
                    <th scope="col">Código de Informe del Asesor</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Código del Revisor</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buscar_infavance as $value) { ?>
                <tr>
                    <td>
                        <?php echo $value->cod_avance; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_inf_ase; ?>
                    </td>
                    <td>
                        <?php echo $value->estado; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_revisor; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url('infavance/eliminar')."/".$value->cod_avance;
                            ?>">Eliminar</a>
                        <a class="btn btn-primary" href="<?php echo base_url('infavance/editar')."/".$value->cod_avance;
                            ?>">Actualizar</a>
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
        <?php echo $this->pagination->create_links(); ?>
    </div>

    <div class="tab-pane" id="profile" role="tabpanel">
        <br>
        <form method="POST" action=" <?php echo base_url('infavance/insertar_infavance') ?>">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Código de Informe de Avance</label>
                    <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="Código de Asesor">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword4">Código de Informe de Asesor</label>
                    <input name="txtias" type="text" class="form-control" id="inputPassword4" placeholder="Código de Informe de Asesor">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail4">Estado</label>
                    <input name="txtest" type="text" class="form-control" id="inputEmail4" placeholder="Estado">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword">Código de Revisor</label>
                    <select name="txtrev" id="inputState" class="form-control">
                        <?php foreach ($list_revisor as $value) { ?>
                        <option value="<?php echo $value->cod_revisor; ?>">
                            <?php echo $value->cod_revisor; ?>
                        </option>
                        <?php  } ?>
                    </select>
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
                        <h2>Informes de Avance</h2>
                    </div>
                    <div class="form-row">
                        <?php echo form_open_multipart('infavance/do_upload');?>
                        <div class="form-group col-md-4">
                            <label for="inputPassword">Código de Avance</label>
                            <select name="txtcod" id="inputState" class="form-control">
                                <?php foreach ($sel_Infavance as $value) { ?>
                                <option value="<?php echo $value->cod_avance; ?>">
                                    <?php echo $value->cod_avance; ?>
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
                        <?php echo form_open_multipart('infavance/do_upload_ase');?>
                        <div class="form-group col-md-4">
                            <label for="inputPassword">Código de Avance</label>
                            <select name="txtcod" id="inputState" class="form-control">
                                <?php foreach ($sel_Infavance as $value) { ?>
                                <option value="<?php echo $value->cod_avance; ?>">
                                    <?php echo $value->cod_avance; ?>
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