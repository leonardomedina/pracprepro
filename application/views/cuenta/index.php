<h1>Cuentas</h1>
<br>
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Consulta</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Insertar</a>
    </li>
</ul>

<br>
<div class="tab-content">
    <div class="tab-pane active" id="home" role="tabpanel">
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-4">
                    <?php echo form_open('cuenta/busqueda'); ?>
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
                    <?php echo form_open('cuenta/mostrar');?>
                    <?php echo form_submit("", "Mostrar Todo", "class= 'btn btn-outline-primary'");?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-striped" style="
    table{
      border:2px solid #000;
      border-collapse:collapse;
      padding: 20px;
      width: 100%;
    }
    table td{
    border:2px solid #000;
    padding: 20px;
    }">
            <thead>
                <tr>
                    <th scope="col">Usuario</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Nivel</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buscar_cuenta as $value) { ?>
                <tr>
                    <td>
                        <?php echo $value->usuario; ?>
                    </td>
                    <td>
                        <?php echo $value->contraseña; ?>
                    </td>
                    <td>
                        <?php echo $value->nivel; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url('cuenta/eliminar')."/".$value->usuario; ?>">Eliminar</a>
                        <a class="btn btn-primary" href="<?php echo base_url('cuenta/editar')."/".$value->usuario; ?>">Actualizar</a>
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
        <?php echo $this->pagination->create_links(); ?>
    </div>

    <div class="tab-pane" id="profile" role="tabpanel">
        <br>
        <form method="POST" action=" <?php echo base_url('cuenta/insertar_cuenta') ?>">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Usuario</label>
                    <input name="txtusu" type="text" class="form-control" id="inputEmail4" placeholder="Usuario">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Contraseña</label>

                    <input name="txtcon" type="text" class="form-control" id="inputPassword4" placeholder="Contraseña">
                </div>
                <div class="form-group col-md-4">
                    <label for="form-group">Nivel</label>
                    <select name="txtrev" id="inputState" class="form-control">
                        <?php foreach ($list_Nivel as $value) { ?>
                        <option value="<?php echo $value->nombre_nivel; ?>">
                            <?php echo $value->nombre_nivel; ?>
                            <?php  } ?>
                    </select>
                </div>


            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

</div>