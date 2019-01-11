<h1>Actualización de Acta</h1>
<form action=" <?php echo base_url('plan/actualizar') ?>" method="POST">
    <?php foreach ($datos_Plan as $value) { ?>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputEmail4">Código de Plan de Prácticas</label>
            <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="Código de Anuncio"
                value="<?php echo $value->cod_plan; ?>" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">Título</label>
            <input name="txttit" type="text" class="form-control" id="inputPassword4" placeholder="Nombre de la Institución"
                value="<?php echo $value->titulo; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="inputEmail4">Fecha de Inicio</label>
            <input name="txtins" type="text" class="form-control" id="inputEmail4" placeholder="Código de Anuncio"
                value="<?php echo $value->fecha_inicio; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Fecha de FIn</label>
            <input name="txtfin" type="text" class="form-control" id="inputPassword4" placeholder="Nombre de la Institución"
                value="<?php echo $value->fecha_final; ?>">
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
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

</form>
<?php } ?>