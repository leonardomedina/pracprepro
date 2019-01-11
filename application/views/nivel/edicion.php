<h1>Actualización de Nivel</h1>
<form action=" <?php echo base_url('nivel/actualizar') ?>" method="POST">
    <?php foreach ($list_Nivel as $value) { ?>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputEmail4">Nombre de Nivel</label>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <input name="txtnom" type="text" class="form-control" id="inputEmail4" placeholder="Nombre de Nivel" value="<?php echo $value->nombre_nivel; ?>"
                </div> </div> <div class="form-row">
            <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>


</form>

</form>
<?php } ?>