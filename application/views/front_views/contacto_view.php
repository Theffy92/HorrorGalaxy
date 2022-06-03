<div class="container-fluid">
	<section class="row">
		<article class="col-md-8 mt-3">
			<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.8060418698765!2d-58.82953268540163!3d-27.475297123517986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b619078c1bb%3A0x40fc889725a96264!2sRivadavia+1900%2C+W3400AGI+Corrientes!5e0!3m2!1ses-419!2sar!4v1523673342492" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> 
		</article>
		<aside class="col-md-4 d-flex align-items-center mt-3">
			<div class="container">
				<p>
					<i class="fas fa-female fa-2x"></i>
					<strong>
						Reyes Elena Estefania
					</strong>
				</p>
				<p>
					<strong>
						Razon Social: HorrorGalaxy SRL
					</strong>
				</p>
				<p><i class="fab fa-whatsapp-square fa-2x"></i><strong> 
					377-7777777 
				</strong>                    
			</p>
			<p>
				<i class="far fa-envelope fa-2x"></i>
				<strong>horrorgalaxy@gmail.com</strong>
			</p>
			<p>
				<i class="fas fa-address-card fa-2x"></i>
				<strong>Rivadavia 1900</strong>
			</p>
		</div>
	</aside>
</section>
<section class="container mt-2">
	<h1 class="display-4 text-center">Contacto</h1>
	<?php echo form_open('consulta_controller/registrar_consulta', ['class' => 'w-75 mx-auto form-control','style' => 'background-color:rgba(156, 156, 156, 1);' , 'role' => 'form']); ?>
	<!--<form class="w-75 mx-auto form-control" style="background-color:rgba(156, 156, 156, 1);  ">-->
				<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inpuName">Nombre</label>
				<?php echo form_input(['name' => 'nombreconsulta', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Ingrese Nombre', 'required'=>'required', 'value'=>set_value('nombreconsulta')]); ?>
				<?php echo form_error('nombreconsulta'); ?>
			</div>
			<div class="form-group col-md-6">
				<label for="inpuLastname">Apellido</label>
				<?php echo form_input(['name' => 'apellidoconsulta', 'id' => 'apellido', 'class' => 'form-control','placeholder' => 'Ingrese Apellido', 'required'=>'required', 'autofocus'=>'autofocus', 'value'=>set_value('apellidoconsulta')]); ?>
				<?php echo form_error('apellidoconsulta'); ?>
			</div>
		</div>
		<!--<div class="form-row">
			<div class="form-group col-md-6"><br>
				<label for="inputNombre4">Nombre</label>
				<input type="email" class="form-control" id="inputNombre4" placeholder="Nombre">
			</div>
			<div class="form-group col-md-6"><br>
				<label for="inputApellido2">Apellido</label>
				<input type="text" class="form-control" id="inputApellido2" placeholder="Apellido">
			</div>
		</div>-->
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputEmail4">Email</label>
				<?php echo form_input(['name' => 'mailconsulta', 'id' => 'mail', 'type' => 'email', 'class' => 'form-control','placeholder' => 'Ingrese Email', 'required'=>'required', 'value'=>set_value('mailconsulta')]); ?>

				<?php echo form_error('mailconsulta'); ?>
			</div>

			
			<div class="form-group col-md-6">
				<label for="inputTel">Telefono</label>
				<?php echo form_input(['name' => 'telefonoconsulta', 'id' => 'telefono', 'type' => 'text', 'class' => 'form-control','placeholder' => 'Ingrese Telefono', 'required'=>'required', 'value'=>set_value('telefonoconsulta')]); ?>
				<?php echo form_error('telefonoconsulta'); ?>
			</div>
		</div>
		<!--<div class="form-row">
			<div class="form-group col-md-6"><br>
				<label for="inputEmail4">Email</label>
				<input type="email" class="form-control" id="inputEmail4" placeholder="Email">
			</div>
			<div class="form-group col-md-6"><br>
				<label for="inputAddress2">Telefono</label>
				<input type="text" class="form-control" id="inputTelefono2" placeholder="Telefono">
			</div>
		</div>-->

		<div class="form-group">
			<label for="exampleFormControlTextarea1">Dejanos tus preguntas,dudas e inquietudes</label>
			<?php echo form_textarea(['name' => 'consulta', 'id' => 'consulta', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Mi consulta es ...', 'value' =>set_value('consulta')]); ?>
			<!--<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>-->
		</div>
		<div class="form-group">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="gridCheck">
				<label class="form-check-label" for="gridCheck">
					Suscribirme
				</label>
			</div>
		</div><br><br>
		<div class="container text-center">
			<button type="submit" class="btn btn-outline-dark">Enviar</button>
		</div> 
	</form>
</section>
</div>