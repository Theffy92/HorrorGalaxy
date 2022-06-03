<div class="col-md-9">
	<a class="btn btn-dark" href="<?php echo base_url("ventas_controller");?>">Atrás</a>
	<h1 class="page-header" style="text-align:center;">Detalle de compra</h1>
			<div class="user-dashboard">
				<div class="col-md-12 well" style="background-color: rgb(147, 147, 152); border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; margin-bottom: 5px">
					<div class="col-md-6">
						<label>N°: <?php echo $cabecera->orden_id ?></label>	
					</div>
					<div class="col-md-6" align="right">
						<label for="">Fecha: <?php echo $cabecera->orden_fecha ?></label>	
					</div>
					
					<div class="col-md-12" style="margin-top: 20px;">
						<label>Cliente: <?php echo $cabecera->apellido ?></label>	
						<label><?php echo $cabecera->nombre ?></label>	
					</div>						
				</div>

				<div class="col-md-12 well" style="background-color: rgb(210, 210, 218); border-radius: 0px; margin-bottom: 5px">
					<div class="table-responsive">
						<table class="table table-stripped">
							<thead class="thead-dark">
								<tr>
									<th>Código</th>
									<th>Cantidad</th>
									<th>Título</th>
									<th>Precio</th>
								</tr>
							</thead>

							<tbody>
							<?php $total = 0;?>
							<?php foreach ($detalle as $fila) {?>
									<tr>
										<td><?php echo $fila->orden_id?></td>
										<td><?php echo $fila->detalle_cantidad?></td>
										<td><?php echo $fila->titulo?></td>
										<td>$<?php echo number_format($fila->detalle_precio, 2, ",", ".");
											?></td>
									</tr>
							<?php
								}?>
							</tbody>
						 </table>
					</div>
				</div>
				
				<div class="col-md-12 well" style="background-color: rgb(147, 147, 152); border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; ">
					<h1 align="right">Total: $<?php echo number_format($cabecera->orden_total, 2, ",", ".")?></h1>					
				</div>
			</div>
		</div>
	</div>