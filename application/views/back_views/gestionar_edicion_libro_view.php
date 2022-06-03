<div class="container" style="margin-top:100px;">

	<h1 class="display-5 text-center">Edición de libro</h1>
		<?php echo form_open_multipart("libro_controller/actualizar_libro/$libro_id", ['class' => 'w-75 mx-auto form-control', 'role' => 'form']); ?>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inpuName">Título</label>				
				<?php echo form_input(['name' => 'titulo', 'id' => 'titulo', 'class' => 'form-control','placeholder' => 'Ingrese título del libro',  'autofocus'=>'autofocus', 'value'=>($titulo)]); ?>
				<?php echo form_error('titulo'); ?>
			</div>
			<div class="form-group col-md-6">
				<label for="inputTel">Autor</label>
				<?php echo form_input(['name' => 'autor', 'id' => 'autor', 'class' => 'form-control','placeholder' => 'Ingrese Autor', 'required'=>'required', 'value'=>($autor)]); ?>
				<?php echo form_error('autor'); ?>
			</div>
			
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputDescripcion">Descripción</label>
				<?php echo form_textarea(['name' => 'descripcion', 'id' => 'descripcion', 'class' => 'form-control','placeholder' => 'Ingrese descripción', 'required'=>'required', 'value'=>($descripcion)]); ?>
				<?php echo form_error('descripcion'); ?>
				</div>
				<div class="form-group col-md-6">
					<div class="form-group col-md-6">
					<label for="genero_descripcion">Genero</label>

					<select name="genero" id="genero" class="form-control" required>
						<option value="0" selected disabled="">Seleccione genero</option>
					<?php foreach($generos as $row): ?>
						<?php if($row->genero_id == $genero) { ?>
							<option value="<?php echo $row->genero_id ?>" selected><?php echo $row->genero_descripcion ?></option>
						<?php } else { ?>
							<option value="<?php echo $row->genero_id ?>"><?php echo $row->genero_descripcion ?></option>
						<?php } ?>
					<?php endforeach; ?>
					</select>
					</div>
					<div class="form-group col-md-6">
					<label for="genero_descripcion">Categoría</label>

					<select name="categoria" id="categoria" class="form-control" required>
						<option value="0" selected disabled="">Seleccione categoria</option>
					<?php foreach($categorias as $row): ?>
						<?php if($row->categoria_id == $categoria) { ?>
							<option value="<?php echo $row->categoria_id ?>" selected><?php echo $row->categoria_descripcion ?></option>
						<?php } else { ?>
							<option value="<?php echo $row->categoria_id ?>"><?php echo $row->categoria_descripcion ?></option>
						<?php } ?>
					<?php endforeach; ?>
					</select>
					</div>
				</div>	
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inpuLastname">ISBN</label>
				<?php echo form_input(['name' => 'isbn', 'id' => 'isbn', 'class' => 'form-control','placeholder' => 'Ingrese isbn', 'required'=>'required', 'autofocus'=>'autofocus', 'value'=>($isbn)]); ?>
				<?php echo form_error('isbn'); ?>
			</div>	
			<div class="form-group col-md-6">
				<label for="inputEditorial">Editorial</label>
				<?php echo form_input(['name' => 'editorial', 'id' => 'editorial', 'class' => 'form-control','placeholder' => 'Ingrese editorial', 'required'=>'required', 'value'=>($editorial)]); ?>
				<?php echo form_error('editorial'); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="anioedicion">Año edicion</label>
				<?php echo form_input(['name' => 'anioedicion', 'id' => 'anioedicion', 'class' => 'form-control','placeholder' => 'Ingresar año de edición', 'required'=>'required', 'value'=>($anioedicion)]); ?>
				<?php echo form_error('anioedicion'); ?>
			</div>
			<div class="form-group col-md-6">
				<label for="precio">Precio</label>
				<?php echo form_input(['name' => 'precio', 'id' => 'precio', 'class' => 'form-control','placeholder' => 'Ingrese precio', 'required'=>'required', 'value'=>($precio)]); ?>
				<?php echo form_error('precio'); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputRePassword">Idioma</label>
				<?php echo form_input(['name' => 'idioma', 'id' => 'idioma', 'class' => 'form-control','placeholder' => 'Ingrese idioma', 'required'=>'required', 'value'=>($idioma)]); ?>
				<?php echo form_error('idioma'); ?>
			</div>
			<div class="form-group col-md-6">
				<label for="imagen">Imagen</label>
				<?php echo form_input(['name' => 'imagen', 'id' => 'imagen', 'type'=>'file', 'value'=>set_value($imagen)]); ?>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="stock">Stock</label>
				<?php echo form_input(['name' => 'stock', 'id' => 'stock', 'class' => 'form-control','placeholder' => 'Ingrese Stock', 'required'=>'required', 'value'=>($stock)]); ?>
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