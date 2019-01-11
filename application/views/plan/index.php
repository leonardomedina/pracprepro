<h1>Plan de Prácticas</h1>
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
                    <?php echo form_open('plan/busqueda'); ?>
                    <div class="input-group">
                        <?php if ($this->session->userdata("busqueda")) {
							 echo form_input(["type" => "text", "name" => "busqueda", "class" => "form-control", "placeholder" => "Ingrese su busqueda", "value" => $this->session->userdata("busqueda")]);
						}else{
							echo form_input(["type" => "text", "name" => "busqueda", "class" => "form-control", "placeholder" => "Ingrese su busqueda"]); 
						} ?>

                        <?php $data = array(
		'type'      => 'submit',
		'content'   => '<span class="btn-label"><i class="fa fa-search" aria-hidden="true"></i> 
		</span>',
		'class'     => 'btn btn-outline-primary'
		

		);
		echo form_button($data); ?>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-md-2">
                    <?php echo form_open('plan/mostrar');?>
                    <?php echo form_submit("", "Mostrar Todo", "class= 'btn btn-outline-primary'");?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Codigo de Plan de Práctica</th>
                    <th scope="col">Título</th>
                    <th scope="col">Fecha de Inicio</th>
                    <th scope="col">Número de Fin</th>
                    <th scope="col">Código del Revisor</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buscar_plan as $value) { ?>
                <tr>
                    <td>
                        <?php echo $value->cod_plan; ?>
                    </td>
                    <td>
                        <?php echo $value->titulo; ?>
                    </td>
                    <td>
                        <?php echo $value->fecha_inicio; ?>
                    </td>
                    <td>
                        <?php echo $value->fecha_final; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_revisor; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url('plan/eliminar')."/".$value->cod_plan; ?>">Eliminar</a>
                        <a class="btn btn-primary" href="<?php echo base_url('plan/editar')."/".$value->cod_plan; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
        <?php echo $this->pagination->create_links(); ?>
    </div>

    <div class="tab-pane" id="profile" role="tabpanel">
        <br>
        <form method="POST" action=" <?php echo base_url('plan/insertar_Plan') ?>">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputEmail4">Código de Plan</label>
                    <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="Código de Plan">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Título</label>
                    <input name="txttit" type="text" class="form-control" id="inputPassword4" placeholder="Título">
                </div>
                <div class="col-md-3">
                    <label for="inputEmail4">Fecha de Inscripción</label>
                    <input name="txtins" type="text" class="form-control" id="inputEmail4" placeholder="Fecha de Inscripción">
                </div>
                <div class="col-md-3">
                    <label for="inputPassword4">Fecha de Fin</label>
                    <input name="txtfin" type="text" class="form-control" id="inputPassword4" placeholder="Fecha de Fin">
                </div>
            </div>
            <div class="form-row">
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
            <br>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <div class="tab-pane" id="doc" role="tabpanel">
        <br>

        <table class="container-fluid">
            <div class="row">
                <div class="col">

                    <div class="form-row">
                        <?php echo form_open_multipart('plan/do_upload');?>
                        <div class="form-group col-md-3">
                            <label for="inputPassword">Código de Plan de Prácticas</label>
                            <select name="txtcod" id="inputState" class="form-control">
                                <?php foreach ($sel_Plan as $value) { ?>
                                <option value="<?php echo $value->cod_plan; ?>">
                                    <?php echo $value->cod_plan; ?>
                                </option>
                                <?php  } ?>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-row">

                            <input type="file" name="userfile" size="80" class="btn" />
                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <?php $data = array(
		'type'      => 'submit',
		'content'   => '<span class="btn-label"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Subir plan de Práctica
		</span>',
		'class'     => 'btn btn-outline-primary'
		
		);
		echo form_button($data); ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>

            </div>
        </table>



    </div>

</div>