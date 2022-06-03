<div class="container">
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" style="text-align:center;">Listado de Usuarios</h1>
		</div>
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-md-12 mx-auto">
		<!--<div class="col-md-8 col-md-offset-2">-->
			<table id="mytable" class="table table-responsive table-sm table-bordered table-striped table-hover">
				<thead class="thead-dark">
					<th scope="col">Nombre</th>
					<th scope="col">Apellido</th>
					<th scope="col">Email</th>
					<th scope="col">Teléfono</th>
					<th scope="col">Editar</th>
					<th scope="col">Activar/Eliminar</th>
				</thead>
				<tbody>
				<?php foreach($usuarios as $row) {?> 
						<tr>
							<td> <?php echo $row->nombre; ?> </td>
							<td> <?php echo $row->apellido; ?> </td>
							<td> <?php echo $row->email; ?> </td>
							<td> <?php echo $row->telefono; ?> </td>
							<td> 
								<a class="btn btn-success" title="pulse para editar" href="<?php echo base_url("gestion_usuario_controller/editar_usuario/$row->id_usuario");?>" > 
									<i class="fas fa-edit"></i> 
								</a>
							</td> 
							<?php
							if ( ($row->estado_usuario) ==1 )
								{ ?>
									<td> <a class="btn btn-danger" title="pulse para eliminar" href="<?php echo base_url("gestion_usuario_controller/eliminar_usuario/$row->id_usuario");?>" >
										<i class="fas fa-trash-alt"></i></a></td>
								 <?php } 
								 else {?>
										
										<td> <a class="btn btn-success" title="pulse para activar" href="<?php echo base_url("gestion_usuario_controller/activar_usuario/$row->id_usuario");?>" > <i class="fas fa-check"></i></a></td>
									<?php } ?> 
								</tr>
							<?php }?> 
						</tbody>
					</table>
				</div>
			</div>
		</div>