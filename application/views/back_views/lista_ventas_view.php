	<div class="container-fluid">
		<h1 class="page-header" style="text-align:center;">Listado de pedidos</h1>
		<div clas="row w-75">
		<table class=" table table-responsive  table-bordered  table-hover">
			<thead class="thead-dark">
				<th scope="col">N° factura</th>
				<th scope="col">Fecha</th>
				<th scope="col">Cliente</th>
				<th scope="col"></th>
			</thead>
			<tbody>
				<?php foreach ($ventas as $row) {?>

					<tr>	 
						<td><?php echo $row->orden_id; ?></td>
						<td><?php echo $row->orden_fecha;?></td>
						<td><?php echo $row->apellido; echo ' '; echo $row->nombre;?></td>
						<td><a class="btn btn-success" href="<?php echo base_url("ventas_controller/detalles/$row->orden_id");?>">Detalles</a></td>
					</tr>
					<?php 
				}?>
			</tbody>
		</table>
		</div>
		<?php echo $this->pagination->create_links() ?>
	</div>
