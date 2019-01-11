<h1>Actualización de Revisor</h1>
<form action=" <?php echo base_url('revisor/actualizar') ?>" method="POST">
    <?php foreach ($datos_revisor as $value) { ?>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputEmail4">Código de Revisor</label>
            <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="Código de Anuncio"
                value="<?php echo $value->cod_revisor; ?>" readonly>
        </div>
        <div class="form-group col-md-10">
            <label for="inputPassword4">Nombre de Revisor</label>
            <input name="txtnom" type="text" class="form-control" id="inputPassword4" placeholder="Nombre de la Institución"
                value="<?php echo $value->nombre_revisor; ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>


<?php } ?>