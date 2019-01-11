<h1>Instituciones</h1>
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
                    <?php echo form_open('institucion/busqueda'); ?>
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
                    <?php echo form_open('institucion/mostrar');?>
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
                    <th scope="col">Nombre de Intitucion</th>
                    <th scope="col">Direccion de Institucion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buscar_institucion as $value) { ?>
                <tr>
                    <td>
                        <?php echo $value->nombre_institucion; ?>
                    </td>
                    <td>
                        <?php echo $value->dir_institucion; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo base_url('institucion/eliminar')."/".$value->nombre_institucion;
                            ?>">Eliminar</a>
                        <a class="btn btn-primary" href="<?php echo base_url('institucion/editar')."/".$value->nombre_institucion;
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
        <form method="POST" action=" <?php echo base_url('institucion/insertar_institucion') ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Nombre de Institucuión</label>
                    <input name="txtnom" type="text" class="form-control" id="inputEmail4" placeholder="Nombre de Institución">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Dirección de Institución</label>
                    <input name="txtdir" type="text" class="form-control" id="inputPassword4" placeholder="Dirección de Institución">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

</div>