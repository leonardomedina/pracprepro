<h1>Actualización de Institucion</h1>
<form action=" <?php echo base_url('institucion/actualizar') ?>" method="POST">
    <?php foreach ($list_Institucion as $value) { ?>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputEmail4">Nombre de Institución</label>
            <input name="txtnom" type="text" class="form-control" id="inputEmail4" placeholder="Código de Anuncio"
                value="<?php echo $value->nombre_institucion; ?>" readonly>
        </div>
        <div class="form-group col-md-10">
            <label for="inputPassword4">Dirección de Institución</label>
            <input name="txtdir" type="text" class="form-control" id="inputPassword4" placeholder="Nombre de la Institución"
                value="<?php echo $value->dir_institucion; ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

</form>
<?php } ?>