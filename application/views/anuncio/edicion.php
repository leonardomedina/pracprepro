<h1>Actualización de Usuario</h1>
<form action=" <?php echo base_url('anuncio/actualizar') ?>" method="POST">
		<?php foreach ($datos_Anuncio as $value) { ?>
		<div class="form-row">
		    <div class="form-group col-md-2">
		      <label for="inputEmail4">Código de Anuncio</label>
		      <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="Código de Anuncio" value="<?php echo $value->cod_postulacion; ?>" readonly>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">Título de Anuncio</label>
		      <input name="txttil" type="text" class="form-control" id="inputEmail4" placeholder="Código de Anuncio" value="<?php echo $value->titulo_anuncio; ?>">
		    </div>
		     <div class="form-group col-md-4">
      <label for="inputState">Nombre de la Institución</label>
      <select name="txtins" id="inputState" class="form-control">
        <?php foreach ($datos_Anuncio2 as $value) { ?>
  	   	<option value="<?php echo $value->nombre_institucion; ?>"><?php echo $value->nombre_institucion; ?></option><?php  } ?>
   		<?php  } ?> 
      </select>
    </div>
	  </div>
	  <?php foreach ($datos_Anuncio as $value) { ?>
	  <div class="form-group">
	    <label for="inputAddress">Requisitos</label>
	    <input name="txtreq" type="text" class="form-control" id="inputAddress" placeholder="Requisitos" value="<?php echo $value->beneficios; ?>">
	  </div>
	  <div class="form-group">
		  <label for="inputAddress2">Funciones</label>
		  <input name="txtfun" type="text" class="form-control" id="inputAddress2" placeholder="Funciones" value="<?php echo $value->funciones; ?>">
	  </div>
	  <div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="inputCity">Beneficios</label>
		      <input name="txtben" type="text" class="form-control" id="inputCity" placeholder="Beneficios" value="<?php echo $value->beneficios; ?>">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputState">Area</label>
		      <input name="txtarea" type="text" class="form-control" id="inputArea" placeholder="Área" value="<?php echo $value->area; ?>">
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputZip">Tipo de Puesto</label>
		      <input name="txttip" type="text" class="form-control" id="inputZip" placeholder="Tipo de Puesto" value="<?php echo $value->tipo_puesto; ?>">
		    </div>
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-4">
	      <label for="inputCity">Salario</label>
	      <input name="txtsal" type="text" class="form-control" id="inputCity" placeholder="Funciones" value="<?php echo $value->salario; ?>">
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputState">Fecha de Publicación</label>
	      <input name="txtfecha" type="text" class="form-control" id="inputArea" placeholder="Fecha de Publicación" value="<?php echo $value->fecha_pub; ?>" >
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputState">Estado</label>
	      <input name="txtest" type="text" class="form-control" id="inputArea" placeholder="Fecha de Publicación" value="<?php echo $value->estado; ?>" >
	    </div>
	   </div>
	  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>			
							
					</form>
		<?php } ?>