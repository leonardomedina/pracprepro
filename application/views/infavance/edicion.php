<form method="POST" action=" <?php echo base_url('infavance/actualizar') ?>">
    <?php foreach ($list_Infavance as $value) { ?>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputEmail4">Código de Informe de Avance</label>
            <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="Código de Asesor" value="<?php echo $value->cod_avance; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4">Código de Informe de Asesor</label>
            <input name="txtias" type="text" class="form-control" id="inputPassword4" placeholder="Código de Informe de Asesor"
                value="<?php echo $value->cod_inf_ase; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="inputEmail4">Estado</label>
            <input name="txtest" type="text" class="form-control" id="inputEmail4" placeholder="Estado" value="<?php echo $value->estado; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4">Código de Revisor</label>
            <input name="txtrev" type="text" class="form-control" id="inputPassword4" placeholder="Código de Revisor"
                value="<?php echo $value->cod_revisor; ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
<?php  } ?>