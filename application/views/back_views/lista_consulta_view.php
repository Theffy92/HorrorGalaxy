<div class="container">
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" style="text-align:center;">Listado de Consultas</h1>
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
					<th scope="col">Consulta</th>
					<th scope="col">Leído</th>
					<!--<th scope="col">Activar/Eliminar</th>-->
				</thead>
				<tbody>
				<?php foreach($consultas as $row) {?> 
						<tr>
							<td> <?php echo $row->nombre_consulta; ?> </td>
							<td> <?php echo $row->apellido_consulta; ?> </td>
							<td> <?php echo $row->email_consulta; ?> </td>
							<td> <?php echo $row->telefono_consulta; ?> </td>
							<td> <?php echo $row->consulta_descripcion; ?> </td>
							<?php
							if ( ($row->leido) ==1 )
								{ ?>
									<td> <a class="btn btn-success" href="" > <i class="fas fa-check"></i></a></td>
									<!--<?php echo base_url("libro_controller/activar_libro/$row->consulta_id");?>"-->
								
								 <?php } 
								 else {?>
										
											<td> <a class="btn btn-danger" title="marcar como leído" href="<?php echo base_url("consulta_controller/leer_consulta/$row->consulta_id");?>" >
										No leído</a></td>
									<?php } ?> 
								</tr>
							<?php }?> 
						</tbody>
					</table>
				</div>
			</div>
		</div>