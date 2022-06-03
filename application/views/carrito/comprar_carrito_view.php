<div class="container-fluid ">
	<h1 class="text-center mt-3" >Resumen del pedido</h1>
	<h5 class="text-center d-none d-sm-none d-md-block">Nombre del cliente:<?php echo $this->session->userdata('apellido');echo' ';echo $this->session->userdata('nombre');?></h5>
			<div class="row mx-auto w-50 mt-5">
						<h2 class="text-center"><?php echo $message ?></h2>
						<table id="mytable" class="table table-responsive table-bordred table-striped">
							<?php if ($cart = $this->cart->contents()): ?>
								<thead>
									<td>Nº item</td>
									<td>Nombre</td>
									<td>Precio</td>
									<td>Cantidad</td>
									<td>Subtotal</td>
									<!--<td>Acción</td>-->
								</thead>
								<tbody>
									<?php
									$total=0;
									$i = 1;
									foreach ($cart as $item){?>
										<tr>
											<td>
												<?php echo $i++; ?>
											</td>
											<td>
												<?php echo $item['name']; ?>
											</td>
											<td>
												$ <?php echo $this->cart->format_number($item['price'],2); ?>
											</td>
											<td>
												<?php echo $item['qty']; ?>
											</td>
											<td>
												$ <?php echo $this->cart->format_number($item['subtotal'],2); ?>
											</td>
											<!--<td>
												<?php echo anchor('carrito_controller/borrar/'.$item['rowid'],'Eliminar'); ?>
											</td>-->
										</tr>
									<?php } ?>
									<tr>
										<td>Total Compra:$<?php echo number_format($this->cart->total(),2); ?></td>
										<!--<td><button type="button" class="btn btn-success" onclick="limpiar_carito()">Vaciar
										carrito</button></td>-->
										<td><a href="<?php echo base_url('carrito_controller'); ?>" class="btn btn-success"
											role="button">Volver al carrito</a></td>
											<td><a href="<?php echo base_url('pedidos_controller/guardar_pedido'); ?>" class="btn btn-success"
											role="button">Confirmar pedido</a></td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						
</div>