<div class="container" >

	<h1 class="display-5 text-center">Nuevo libro</h1>
		<?php echo form_open_multipart('libro_controller/registrar_libro', ['class' => 'w-75 mx-auto form-control', 'role' => 'form']); ?>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inpuName">Título</label>				
				<?php echo form_input(['name' => 'titulo', 'id' => 'titulo', 'class' => 'form-control','placeholder' => 'Ingrese título del libro', 'required'=>'required', 'autofocus'=>'autofocus', 'value'=>set_value('titulo')]); ?>
				<?php echo form_error('titulo'); ?>
			</div>
			<div class="form-group col-md-6">
				<label for="inputTel">Autor</label>
				<?php echo form_input(['name' => 'autor', 'id' => 'autor', 'class' => 'form-control','placeholder' => 'Ingrese Autor', 'required'=>'required', 'value'=>set_value('autor')]); ?>
				<?php echo form_error('autor'); ?>
			</div>
			
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputDescripcion">Descripción</label>
				<?php echo form_textarea(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control','placeholder' => 'Ingrese descripción', 'required'=>'required', 'value'=>set_value('descripcion')]); ?>
				<?php echo form_error('descripcion'); ?>
				</div>
				<div class="form-group col-md-6">
					<div class="form-group col-md-6">
					<label for="genero_descripcion">Genero</label>
					<?php
					$lista['-1'] = 'Seleccione genero';
					foreach ($generos as $row) {
						$lista[$row->genero_id] = $row->genero_descripcion;
					}
					echo form_dropdown('genero', $lista,'class="form-control"');
					?>
					</div>
					<div class="form-group col-md-6">
					<label for="categoria_descripcion">Categoría</label>
					<?php
					$listar['-1'] = 'Seleccione categoria';
					foreach ($categorias as $row) {
						$listar[$row->categoria_id] = $row->categoria_descripcion;
					}
					echo form_dropdown('categoria', $listar,'class="form-control"');
					?>
					</div>
				</div>		
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inpuLastname">ISBN</label>
				<?php echo form_input(['name' => 'isbn', 'id' => 'isbn', 'class' => 'form-control','placeholder' => 'Ingrese isbn', 'required'=>'required', 'autofocus'=>'autofocus', 'value'=>set_value('isbn')]); ?>
				<?php echo form_error('isbn'); ?>
			</div>	
			<div class="form-group col-md-6">
				<label for="inputEditorial">Editorial</label>
				<?php echo form_input(['name' => 'editorial', 'id' => 'editorial', 'class' => 'form-control','placeholder' => 'Ingrese editorial', 'required'=>'required', 'value'=>set_value('editorial')]); ?>
				<?php echo form_error('editorial'); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="anioedicion">Año edicion</label>
				<?php echo form_input(['name' => 'anioedicion', 'id' => 'anioedicion', 'class' => 'form-control','placeholder' => 'Ingresar año de edición', 'required'=>'required', 'value'=>set_value('anioedicion')]); ?>
				<?php echo form_error('anioedicion'); ?>
			</div>
			<div class="form-group col-md-6">
				<label for="precio">Precio</label>
				<?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control','placeholder' => 'Ingrese precio', 'required'=>'required', 'value'=>set_value('precio')]); ?>
				<?php echo form_error('precio'); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputRePassword">Idioma</label>
				<?php echo form_input(['name' => 'idioma', 'id' => 'idioma', 'class' => 'form-control','placeholder' => 'Ingrese idioma', 'required'=>'required', 'value'=>set_value('idioma')]); ?>
				<?php echo form_error('idioma'); ?>
			</div>
			<div class="form-group col-md-6">
				<label for="imagen">Imagen</label>
				<?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type'=>'file', 'value'=>set_value('imagen')]); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="stock">Stock</label>
				<?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control','placeholder' => 'Ingrese Stock', 'required'=>'required', 'value'=>set_value('stock')]); ?>
			</div>

		</div>

		<?php echo form_submit('Registrarme', 'Agregar',"class='btn btn-success'"); ?>
		<?php echo form_close();?>
	</div>