<!-- En esta vista se encuentra el formulario de inicio de sesión-->
<!--<div class="container" style="margin-top:100px;">
	<?php echo validation_errors(); ?>
	<h1 class="display-5 text-center">Iniciar Sesión</h2>
	<?php echo form_open('cliente_controller', ['class' => 'w-50 mx-auto form-control', 'role' => 'form']); ?>	
		<div class="form-group">
				<label for="inputEmail4">Email</label>
				<?php echo form_input(['name' => 'mail', 'id' => 'mail', 'type' => 'email', 'class' => 'form-control','placeholder' => 'Ingrese Email', 'required'=>'required', 'value'=>set_value('mail')]); ?>
		</div>
		<div class="form-group">
				<label for="inputPassword4">Contraseña</label>
				<?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control','placeholder' => 'Ingrese Contraseña', 'required'=>'required', 'value'=>set_value('password')]); ?>
		</div>
		<?php echo form_submit('Ingresar', 'Ingresar',"class='btn btn-success'"); ?>
		<?php echo form_close();?>
</div>-->

<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>