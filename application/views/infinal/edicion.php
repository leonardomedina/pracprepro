<h1>Edición de Informes Finales</h1>
<form method="POST" action=" <?php echo base_url('infinal/actualizar') ?>">
    <?php foreach ($list_Infinal as $value) { ?>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputEmail4">Código de Informe Final</label>
            <input name="txtifi" type="text" class="form-control" id="inputEmail4" placeholder="Código de Asesor" value="<?php echo $value->cod_inf_final; ?>"
                readonly>
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4">Código de Informe de Asesor</label>
            <input name="txtcer" type="text" class="form-control" id="inputPassword4" placeholder="Código de Informe de Asesor"
                value="<?php echo $value->cod_cerins; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmail4">Código de Acta de Culminación</label>
            <input name="txtacu" type="text" class="form-control" id="inputEmail4" placeholder="Código de Acta de Culminación"
                value="<?php echo $value->cod_actcul; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4">Código de Hojas de Supervisión</label>
            <input name="txthos" type="text" class="form-control" id="inputPassword4" placeholder="Código de Hojas de Supervisión"
                value="<?php echo $value->cod_hosup; ?>">
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword4">Estado</label>
            <input name="txtest" type="text" class="form-control" id="inputPassword4" placeholder="Código de Revisor"
                value="<?php echo $value->estado; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword">Código de Informe Final</label>
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
<?php  } ?>