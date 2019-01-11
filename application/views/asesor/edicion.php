<h1>Actualización de Asesor</h1>
<form action=" <?php echo base_url('asesor/actualizar') ?>" method="POST">
		<?php foreach ($datos_Asesor as $value) { ?>
		<div class="form-row">
		    <div class="form-group col-md-2">
		      <label for="inputEmail4">Código de Asesor</label>
		      <input name="txtcodi" type="text" class="form-control" id="inputEmail4" placeholder="Código de Anuncio" value="<?php echo $value->cod_asesor; ?>">
		    </div>
		    <div class="form-group col-md-10">
		      <label for="inputPassword4">Nombre de Asesor</label>
		      <input name="txtnom" type="text" class="form-control" id="inputPassword4" placeholder="Nombre de la Institución" value="<?php echo $value->nombre_asesor; ?>">
		    </div>
	  </div>
	  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>			
							
					</form>
		<?php } ?>