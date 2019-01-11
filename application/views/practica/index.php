<h1>Prácticas</h1>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Consulta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Insertar</a>
    </li>
</ul>


<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel">
        <div class="container">

            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-4">
                    <?php echo form_open('practica/busqueda'); ?>
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



            </div>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Código de Anuncio</th>
                    <th scope="col">Código de Asesor</th>
                    <th scope="col">Semestre Académico</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Código Avance</th>
                    <th scope="col">Código de Plan</th>
                    <th scope="col">Código Inf Final</th>
                    <th scope="col">Código Inf Asesor</th>
                    <th scope="col">Fecha</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($buscar_practica as $value) { ?>
                <tr>
                    <td>
                        <?php echo $value->cod_prac; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_post; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_asesor; ?>
                    </td>
                    <td>
                        <?php echo $value->semestre_academico; ?>
                    </td>
                    <td>
                        <?php echo $value->estado; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_avance; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_plan; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_inf_final; ?>
                    </td>
                    <td>
                        <?php echo $value->cod_inf_ase; ?>
                    </td>
                    <td>
                        <?php echo $value->fecha_insc; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url('practica/eliminar')."/".$value->cod_prac;
                            ?>">Eliminar</a>
                        <hr>
                        <a class="btn btn-primary" href="<?php echo base_url('practica/editar')."/".$value->cod_prac; ?>">Editar</a>
                    </td>

                </tr>


                <?php  } ?>
            </tbody>
        </table>
        <?php echo $this->pagination->create_links(); ?>
    </div>
    <div class="tab-pane" id="profile" role="tabpanel">
        <br>
        <form method="POST" action=" <?php echo base_url('practica/insertar_practica') ?>">
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputEmail4">Código de Práctica</label>
                    <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="Código de Práctica">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword">Código de Anuncio</label>
                    <select name="txtanu" id="inputState" class="form-control">
                        <?php foreach ($sel_Anuncio as $value) { ?>
                        <option value="<?php echo $value->cod_postulacion; ?>">
                            <?php echo $value->cod_postulacion; ?>
                        </option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword">Código de Revisor</label>
                    <select name="txtase" id="inputState" class="form-control">
                        <?php foreach ($list_asesor as $value) { ?>
                        <option value="<?php echo $value->cod_asesor; ?>">
                            <?php echo $value->cod_asesor; ?>
                        </option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword">Código de Alumno</label>
                    <select name="txtalu" id="inputState" class="form-control">
                        <?php foreach ($list_alumno as $value) { ?>
                        <option value="<?php echo $value->cod_alumno; ?>">
                            <?php echo $value->cod_alumno; ?>
                        </option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddress2">Semestre Académico</label>
                    <input name="txtsem" type="text" class="form-control" id="inputAddress2" placeholder="Semestre Académico">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputCity">Estado Actual de Práctica</label>
                    <input name="txtest" type="text" class="form-control" id="inputCity" placeholder="Estado">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword">Código de Avance</label>
                    <select name="txtava" id="inputState" class="form-control">
                        <?php foreach ($sel_Infavance as $value) { ?>
                        <option value="<?php echo $value->cod_avance; ?>">
                            <?php echo $value->cod_avance; ?>
                        </option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword">Código de Informe Final</label>
                    <select name="txtpla" id="inputState" class="form-control">
                        <?php foreach ($sel_Infinal as $value) { ?>
                        <option value="<?php echo $value->cod_inf_final; ?>">
                            <?php echo $value->cod_inf_final; ?>
                        </option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPassword">Código de Plan de Prácticas</label>
                    <select name="txtpla" id="inputState" class="form-control">
                        <?php foreach ($sel_Plan as $value) { ?>
                        <option value="<?php echo $value->cod_plan; ?>">
                            <?php echo $value->cod_plan; ?>
                        </option>
                        <?php  } ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputZip">Código del Informe del Asesor</label>
                    <input name="txtiav" type="text" class="form-control" id="inputZip" placeholder="Código del Informe del Asesor">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCity">Fecha de Inscripción</label>
                    <input name="txtfec" type="text" class="form-control" id="inputCity" placeholder="Fecha de Inscripción">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

</div>

</body>

</html>