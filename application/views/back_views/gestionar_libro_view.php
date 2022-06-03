<div class="container">
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" style="text-align:center;">Listado de libros</h1>
		</div>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-md-12 mx-auto">
		<!--<div class="col-md-8 col-md-offset-2">-->
			<table id="mytable" class="table table-responsive table-sm table-bordered table-striped table-hover">
				<thead class="thead-dark">
					<th scope="col">Título</th>
					<!--<th scope="col">Descripción</th>-->
					<th scope="col">Autor</th>
					<th scope="col">Género</th>
					<th scope="col">ISBN</th>
					<th scope="col">Editorial</th>
					<th scope="col">Año Edición</th>
					<th scope="col">Idioma</th>
					<th scope="col">Precio</th>
					<th scope="col">Stock</th>
					<th scope="col">Editar</th>
					<th scope="col">Activar/Eliminar</th>
				</thead>
				<tbody>
				<?php foreach($libros as $row) {?> 
						<tr>
							<td> <?php echo $row->titulo; ?> </td>
							<!--<td> <?php echo $row->descripcion; ?> </td>-->
							<td> <?php echo $row->autor; ?> </td>
							<td> <?php echo $row->genero_descripcion; ?> </td>
							<td> <?php echo $row->isbn; ?> </td>
							<td> <?php echo $row->editorial; ?> </td>
							<td> <?php echo $row->anio_edicion; ?> </td>
							<td> <?php echo $row->idioma; ?> </td>
							<td> <?php echo $row->precio; ?> </td>
							<td> <?php echo $row->stock_libro; ?> </td>
							
							
							<td> 
								<a class="btn btn-success" title="pulse para editar" href="<?php echo base_url("libro_controller/editar_libro/$row->libro_id");?>" > 
									<i class="fas fa-edit"></i> 
								</a>
							</td> 
							<?php
							if ( ($row->estado_libro) ==1 )
								{ ?>
									<td> <a class="btn btn-danger" title="pulse para eliminar" href="<?php echo base_url("libro_controller/eliminar_libro/$row->libro_id");?>" >
										<i class="fas fa-trash-alt"></i></a></td>
								 <?php } 
								 else {?>
										
										<td> <a class="btn btn-success" title="pulse para activar" href="<?php echo base_url("libro_controller/activar_libro/$row->libro_id");?>" > <i class="fas fa-check"></i></a></td>
									<?php } ?> 
								</tr>
							<?php }?> 
						</tbody>
					</table>
				</div>
			</div>
		</div>