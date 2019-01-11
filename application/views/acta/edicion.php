<h1>Actualización de Acta</h1>
<form action=" <?php echo base_url('acta/actualizar') ?>" method="POST">
    <?php foreach ($datos_Acta as $value) { ?>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputEmail4">Código de Registro</label>
            <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="Código de Anuncio"
                value="<?php echo $value->cod_registro; ?>" readonly>
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword">Código de Práctica</label>
            <select name="txtpra" id="inputState" class="form-control">
                <?php foreach ($list_Practica as $value2) { ?>
                <option value="<?php echo $value2->cod_prac; ?>">
                    <?php echo $value2->cod_prac; ?>
                </option>
                <?php  } ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmail4">Fecha de Inscripción</label>
            <input name="txtins" type="text" class="form-control" id="inputEmail4" placeholder="Código de Anuncio"
                value="<?php echo $value->fecha_ins; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4">Código de Certificado</label>
            <input name="txtnum" type="text" class="form-control" id="inputPassword4" placeholder="Nombre de la Institución"
                value="<?php echo $value->num_cert; ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

</form>
<?php } ?>