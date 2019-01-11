<h1>Actualización de Institucion</h1>
<form action=" <?php echo base_url('cuenta/actualizar') ?>" method="POST">
    <?php foreach ($list_Cuenta as $value) { ?>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Usuario</label>
            <input name="txtusu" type="text" class="form-control" id="inputEmail4" placeholder="Usuario" value="<?php echo $value->usuario; ?>"
                readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="inputPassword4">Contraseña</label>
            <input name="txtcon" type="text" class="form-control" id="inputPassword4" placeholder="Contraseña" value="<?php echo $value->contraseña; ?>">
        </div>
        <div class="form-groupw col-md-4">
            <label for="inputPassword4">Nivel</label>
            <select name="txtniv" id="inputState" class="form-control">
                <option value="<?php echo $value->nivel; ?>">admin</option>
                <option value="<?php echo $value->nivel; ?>">alumno</option>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>

</form>
<?php } ?>