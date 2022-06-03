<div class="container" style="margin-top:100px;">

	<h1 class="display-5 text-center">Edición de Usuario</h1>
	<?php echo form_open('gestion_usuario_controller/actualizar_usuario/', ['class' => 'w-75 mx-auto form-control', 'role' => 'form']); ?>
		<div class="form-row">
			<div class="form-group col-md-6">

				<?php echo form_input(['name' => 'id', 'id' => 'id', 'class' => 'form-control','placeholder','hidden' => 'Ingrese Nombre', 'required'=>'required', 'value'=>($id_persona)]); ?>
				
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inpuName">Nombre</label>
				<?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Ingrese Nombre', 'required'=>'required', 'value'=>($nombre)]); ?>
				<?php echo form_error('nombre'); ?>
			</div>
			<div class="form-group col-md-6">
				<label for="inpuLastname">Apellido</label>
				<?php echo form_input(['name' => 'apellido', 'id' => 'apellido', 'class' => 'form-control','placeholder' => 'Ingrese Apellido', 'required'=>'required', 'autofocus'=>'autofocus','value'=>($apellido)]); ?>
				<?php echo form_error('apellido'); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputEmail4">Email</label>
				<?php echo form_input(['name' => 'mail', 'id' => 'mail', 'type' => 'email', 'class' => 'form-control','placeholder' => 'Ingrese Email', 'required'=>'required', 'value'=>($mail)]); ?>
				<?php echo form_error('mail'); ?>
			</div>
			<div class="form-group col-md-6">
				<label for="inputTel">Telefono</label>
				<?php echo form_input(['name' => 'telefono', 'id' => 'telefono', 'type' => 'text', 'class' => 'form-control','placeholder' => 'Ingrese Telefono', 'required'=>'required', 'value'=>($telefono)]); ?>
				<?php echo form_error('telefono'); ?>
			</div>
		</div>
		<div style="margin-top:10px" class="form-group">
			<!-- Button -->
			<div class="col-sm-12 controls">
				<?php echo form_submit('Modificar', 'Modificar',"class='btn btn-success'"); ?>
			</div>
			<?php echo form_close();?>
		</div>
	</div>