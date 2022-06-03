<!-- En esta vista se encuentra el formulario para registrar un nuevo usuario-->
<div class="container" style="margin-top:100px;">

	<h1 class="display-5 text-center">Registro de Usuario</h1>
		<?php echo form_open('cliente_controller/registrar_cliente', ['class' => 'w-75 mx-auto form-control', 'role' => 'form']); ?>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inpuName">Nombre</label>
				<?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Ingrese Nombre', 'required'=>'required', 'value'=>set_value('nombre')]); ?>
				<?php echo form_error('nombre'); ?>
			</div>
			<div class="form-group col-md-6">
				<label for="inpuLastname">Apellido</label>
				<?php echo form_input(['name' => 'apellido', 'id' => 'apellido', 'class' => 'form-control','placeholder' => 'Ingrese Apellido', 'required'=>'required', 'autofocus'=>'autofocus', 'value'=>set_value('apellido')]); ?>
				<?php echo form_error('apellido'); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputEmail4">Email</label>
				<?php echo form_input(['name' => 'mail', 'id' => 'mail', 'type' => 'email', 'class' => 'form-control','placeholder' => 'Ingrese Email', 'required'=>'required', 'value'=>set_value('mail')]); ?>

				<?php echo form_error('mail'); ?>
			</div>

			
			<div class="form-group col-md-6">
				<label for="inputTel">Telefono</label>
				<?php echo form_input(['name' => 'telefono', 'id' => 'telefono', 'type' => 'text', 'class' => 'form-control','placeholder' => 'Ingrese Telefono', 'required'=>'required', 'value'=>set_value('telefono')]); ?>
				<?php echo form_error('telefono'); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputPassword4">Contraseña</label>
				<?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control','placeholder' => 'Ingrese Contraseña', 'required'=>'required', 'value'=>set_value('password')]); ?>
				<?php echo form_error('password'); ?>
			</div>	
			<div class="form-group col-md-6">
				<label for="inputRePassword">Repetir Contraseña</label>
				<?php echo form_input(['name' => 'passconf', 'id' => 'passconf', 'type' => 'password', 'class' => 'form-control','placeholder' => 'Repita Contraseña', 'required'=>'required', 'value'=>set_value('passconf')]); ?>
				<?php echo form_error('passconf'); ?>
			</div>
		</div>
		<!--<div class="form-group form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1"> <a class="nav-link" href="<?php echo base_url('inicio_controller/terminos');?>" style="color:black;">Acepto Términos y Usos</a></label>
		</div>-->
		<?php echo form_submit('Registrarme', 'Registrarme',"class='btn btn-success'"); ?>
		<?php echo form_close();?>
	</div>