<h1>Actualización de Usuario</h1>
<form method="POST" action=" <?php echo base_url('practica/actualizar') ?>">
    <?php foreach ($datos_Practica as $value) { ?>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputEmail4">Código de Práctica</label>
            <input name="txtcod" type="text" class="form-control" id="inputEmail4" placeholder="Código de Práctica"
                value="<?php echo $value->cod_prac; ?>" readonly>
        </div>

        <div class="form-group col-md-2">
            <label for="inputPassword">Código de Anuncio</label>
            <select name="txtpos" id="inputState" class="form-control">
                <?php foreach ($sel_Anuncio as $value) { ?>
                <option value="<?php echo $value->cod_postulacion; ?>">
                    <?php echo $value->cod_postulacion; ?>
                </option>
                <?php  } ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputPassword">Código de Asesor</label>
            <select name="txtase" id="inputState" class="form-control">
                <?php foreach ($sel_Asesor as $value) { ?>
                <option value="<?php echo $value->cod_asesor; ?>">
                    <?php echo $value->cod_asesor; ?>
                </option>
                <?php  } ?>
            </select>
        </div>
        <?php foreach ($datos_Practica as $value2) { ?>
        <div class="form-group col-md-2">
            <label for="inputPassword">Código de Alumno</label>
            <select name="txtalu" id="inputState" class="form-control">
                <?php foreach ($list_alumno as $value) { ?>
                <option value="<?php echo $value->cod_alumno; ?>">
                    <?php echo $value->cod_alumno; ?>
                </option>
                <?php  } ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputAddress2">Semestre Académico</label>
            <input name="txtsem" type="text" class="form-control" id="inputAddress2" placeholder="Semestre Académico"
                value="<?php echo $value2->semestre_academico; ?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="inputCity">Estado Actual de Práctica</label>
            <input name="txtest" type="text" class="form-control" id="inputCity" placeholder="Estado" value="<?php echo $value2->estado; ?>">
        </div>
        <?php  } ?>
        <div class="form-group col-md-3">
            <label for="inputPassword">Código de Avance</label>
            <select name="txtava" id="inputState" class="form-control">
                <?php foreach ($sel_Infavance as $value) { ?>
                <option value="<?php echo $value->cod_avance; ?>">
                    <?php echo $value->cod_avance; ?>
                </option>
                <?php  } ?>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword">Código de Informe Final</label>
            <select name="txtifi" id="inputState" class="form-control">
                <?php foreach ($sel_Infinal as $value) { ?>
                <option value="<?php echo $value->cod_inf_final; ?>">
                    <?php echo $value->cod_inf_final; ?>
                </option>
                <?php  } ?>
            </select>
        </div>
        <!-- <div class="form-group col-md-3">
	      <label for="inputZip">Código del Informe Final</label>
	      <input name="txtifi" type="text" class="form-control" id="inputZip" placeholder="Código del Informe Final">
	    </div>-->
        <div class="form-group col-md-3">
            <label for="inputPassword">Código de Plan de Prácticas</label>
            <select name="txtpla" id="inputState" class="form-control">
                <?php foreach ($sel_Plan as $value) { ?>
                <option value="<?php echo $value->cod_plan; ?>">
                    <?php echo $value->cod_plan; ?>
                </option>
                <?php  } ?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <?php foreach ($datos_Practica as $value) { ?>
            <label for="inputZip">Código del Informe del Asesor</label>
            <input name="txtiav" type="text" class="form-control" id="inputZip" placeholder="Código del Informe del Asesor"
                value="<?php echo $value->cod_inf_ase; ?>">
        </div>


        <div class="form-group col-md-4">
            <label for="inputCity">Fecha de Inscripción</label>
            <input name="txtfec" type="text" class="form-control" id="inputCity" placeholder="Fecha de Inscripción"
                value="<?php echo $value->fecha_insc; ?>">
        </div>
        <?php  } ?>
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>
    <?php  } ?>
</form>