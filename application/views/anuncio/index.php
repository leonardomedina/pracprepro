<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Administración de Anuncios</h1>
	<ul class="nav nav-tabs" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Consulta</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Insertar</a>
	  </li>
  	</ul>


<div class="tab-content">
  	<div class="tab-pane active" id="home" role="tabpanel">
	<br>
	<div class="container">
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-4">
				<?php echo form_open('anuncio/busqueda'); ?>
					<div class="input-group">
						<?php if ($this->session->userdata("busqueda")) {
							 echo form_input(["type" => "text", "name" => "busqueda", "class" => "form-control", "placeholder" => "Ingrese su busqueda", "value" => $this->session->userdata("busqueda")]);
						}else{
							echo form_input(["type" => "text", "name" => "busqueda", "class" => "form-control", "placeholder" => "Ingrese su busqueda"]); 
						} ?>
						
				      	<span class="input-group-btn">
				      		<?php echo form_submit("", "Buscar", "class= 'btn btn-outline-primary'");?>	
				      	</span>
				    </div>
				<?php echo form_close(); ?>
				</div>
				<div class="col-md-2">
				<?php echo form_open('anuncio/mostrar');?>
					<?php echo form_submit("", "Mostrar Todo", "class= 'btn btn-outline-primary'");?>
				<?php echo form_close(); ?>
			</div>
			</div>
		</div>
  	<div class="row">
  	</div>
  	
  	<table class="table table-striped">
  	<thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Título de Práctica</th>
      <th scope="col">Nombre de la Institución</th>
      <th scope="col">Requisitos</th>
      <th scope="col">Funciones</th>
      <th scope="col">Beneficios</th>
      <th scope="col">Area</th>
      <th scope="col">Tipo</th>
      <th scope="col">Salario</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estado</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($buscar_anuncio as $value) { ?>
    				<tr>
    					<td><?php echo $value->cod_postulacion; ?></td>
    					<td><?php echo $value->titulo_anuncio; ?></td>
    					<td><?php echo $value->nombre_institucion; ?></td>
    					<td><?php echo $value->requisitos; ?></td>
    					<td><?php echo $value->funciones; ?></td>
    					<td><?php echo $value->beneficios; ?></td>
    					<td><?php echo $value->area; ?></td>
    					<td><?php echo $value->tipo_puesto; ?></td>
    					<td><?php echo $value->salario; ?></td>
    					<td><?php echo $value->fecha_pub; ?></td>
    					<td><?php echo $value->estado; ?></td>
    					<td>
    					<a class="btn btn-primary" href="<?php echo base_url('anuncio/eliminar')."/".$value->cod_postulacion; ?>">Eliminar</a>
    					<a class="btn btn-primary" href="<?php echo base_url('anuncio/editar')."/".$value->cod_postulacion; ?>">Actualizar</a>
    					</td>

    				</tr>

    				
    			<?php  } ?> 
  </tbody>
</table>
<?php echo $this->pagination->create_links(); ?>
	</div>
  <div class="tab-pane" id="profile" role="tabpanel">
  	<br>
  	<form method="POST" action=" <?php echo base_url('anuncio/insertar_anuncio') ?>">
	  <div class="form-row">
	    <div class="form-group col-md-2">
	      <label for="inputEmail4">Código de Anuncio</label>
	      <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="PO-00">
	    </div>
	    <div class="form-group col-md-6">
	      <label for="inputPassword">Título de Práctica</label>
	      <input name="txttit" type="text" class="form-control" id="inputPassword" placeholder="Título del Anuncio">
	    </div>
	    <div class="form-group col-md-4">
      <label for="inputState">Nombre de la Institución</label>
      <select name="txtins" id="inputState" class="form-control">
        <?php foreach ($datos_Anuncio2 as $value) { ?>
  	   	<option value="<?php echo $value->nombre_institucion; ?>"><?php echo $value->nombre_institucion; ?></option>
   		<?php  } ?> 
      </select>
    </div>
	    
	  </div>
	  <div class="form-group">
	    <label for="inputAddress">Requisitos</label>
	    <input name="txtreq" type="text" class="form-control" id="inputAddress" placeholder="Requisitos">
	  </div>
	  <div class="form-group">
	    <label for="inputAddress2">Funciones</label>
	    <input name="txtfun" type="text" class="form-control" id="inputAddress2" placeholder="Funciones">
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-4">
	      <label for="inputCity">Beneficios</label>
	      <input name="txtben" type="text" class="form-control" id="inputCity" placeholder="Beneficios">
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputState">Area</label>
	      <input name="txtarea" type="text" class="form-control" id="inputArea" placeholder="Área">
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputZip">Tipo de Puesto</label>
	      <input name="txttip" type="text" class="form-control" id="inputZip" placeholder="Tipo de Puesto">
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="form-group col-md-4">
	      <label for="inputCity">Salario</label>
	      <input name="txtsal" type="text" class="form-control" id="inputCity" placeholder="Salario">
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputState">Fecha de Publicación</label>
	      <input name="txtfecha" type="text" class="form-control" id="inputArea" placeholder="Año-Mes-Día">
	    </div>
	    <div class="form-group col-md-4">
	      <label for="inputState">Estado</label>
	      <input name="txtest" type="text" class="form-control" id="inputArea" placeholder="Estado">
	    </div>
	   </div>
	  <button type="submit" class="btn btn-primary">Registrar</button>
</form>
  </div>
 
</div>

</body>
</html>