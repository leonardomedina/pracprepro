<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php foreach ($datos_Listanuncio as $value) { ?>
    <table class="table table-striped">
        <p><a href="<?php echo base_url('principal'); ?>">Página Principal </a><i class="fa fa-angle-double-right"
                aria-hidden="true"></i><a href="<?php echo base_url('listanuncio'); ?>">Lista de Anuncios </a><i class="fa fa-angle-double-right"
                aria-hidden="true"></i>Ver Anuncio de
            <?php echo ' ' ?>
            <?php echo $value->nombre_institucion; ?>
        </p>
        </p>
        </p>

        <tr class="row">
            <td class="col-md-3">
                <h2>Nombre de la Institución</h2>
            </td>
            <td class="col">
                <?php echo $value->nombre_institucion; ?>
            </td>
        </tr>
        <tr class="row">
            <td class="col-md-3">Requisitos</td>
            <td class="col">
                <?php echo $value->requisitos; ?>
            </td>
        </tr>
        <tr class="row">
            <td class="col-md-3">Funciones</td>
            <td class="col">
                <?php echo $value->funciones; ?>
            </td>
        </tr>
        <tr class="row">
            <td class="col-md-3">Beneficios</td>
            <td class="col">
                <?php echo $value->beneficios; ?>
            </td>
        </tr>
        <tr class="row">
            <td class="col-md-3">Area</td>
            <td class="col">
                <?php echo $value->area; ?>
            </td>
        <tr class="row">
            <td class="col-md-3">Tipo</td>
            <td class="col">
                <?php echo $value->tipo_puesto; ?>
            </td>
        </tr>
        <tr class="row">
            <td class="col-md-3">Salario</td>
            <td class="col">
                <?php echo $value->salario; ?>
            </td>
        </tr>
        <tr class="row">
            <td class="col-md-3">Fecha</td>
            <td class="col">
                <?php echo $value->fecha_pub; ?>
            </td>
        </tr>
        <tr class="row">
            <td class="col-md-3">Estado</td>
            <td class="col">
                <?php echo $value->estado; ?>
            </td>
        </tr>
        </tr>
        <?php  } ?>

    </table>
</body>

</html>