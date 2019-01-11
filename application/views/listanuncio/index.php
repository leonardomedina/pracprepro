<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <p><a href="<?php echo base_url('principal'); ?>">Página Principal </a><i class="fa fa-angle-double-right"
            aria-hidden="true"></i>
        Lista de Anuncios</p>
    <h1>Lista de Anuncios</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-4">
                <?php echo form_open('listanuncio/busqueda'); ?>
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
                <?php echo form_open('listanuncio/mostrar');?>
                <?php echo form_submit("", "Mostrar Todo", "class= 'btn btn-outline-primary'");?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Ver</th>
                <th scope="col">Título</th>
                <th scope="col">Nombre de la Institución</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buscar_listanuncio as $value) { ?>
            <tr>
                <td><a class="btn btn-primary" href="<?php echo base_url('listanuncio/ver')."/".$value->cod_postulacion;
                        ?>">Ver</a></td>
                <td>
                    <?php echo $value->titulo_anuncio; ?>
                </td>
                <td>
                    <?php echo $value->nombre_institucion; ?>
                </td>
                <td>
                    <?php echo $value->fecha_pub; ?>
                </td>
                <td>
                    <?php echo $value->estado; ?>
                </td>
            </tr>
            <?php  } ?>
        </tbody>
    </table>
    <?php echo $this->pagination->create_links(); ?>
</body>

</html>