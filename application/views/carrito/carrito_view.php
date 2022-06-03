<div class="container-fluid" style="height:500px;">
	<h1 class="text-center mx-auto mt-5" style="margin-top: 300px;">Carrito de compras</h1>
	<!--<div class="row d-flex justify-content-between">
				<div class="col-6 col-md-3 d-flex justify-content-center ">
					<ul class="nav flex-column mr-auto ">
						<li>
						<a href="<?php echo base_url('inicio_controller/libros/1'); ?>" class="btn btn-link"
							role="button" style="color:black;"><b>Volver a Novelas</b></a>
						</li>
						<li>
							<a href="<?php echo base_url('inicio_controller/libros/2'); ?>" class="btn btn-link" role="button" style="color:black;"><b>Volver a Cómics</b></a>
							</li>
						</li>
					</ul>	
				</div>
				</div>-->
			<div class="row mx-auto w-75 mt-5">
						<h2 class="text-center" style="margin-left: 35%; "><?php echo $message ?></h2>
						<table id="mytable" class="table table-responsive table-bordred table-striped">
							<?php if ($cart = $this->cart->contents()): ?>
								<thead class="thead-dark">
									<td>Nº item</td>
									<td>Nombre</td>
									<td>Precio</td>
									<td>Cantidad</td>
									<td>Subtotal</td>
									<td>Acción</td>
								</thead>
								<tbody>
									<?php
									$i = 1;
									foreach ($cart as $item):?>
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
											<td>
												<?php echo anchor('carrito_controller/borrar/'.$item['rowid'],'Eliminar'); ?>
											</td>
										</tr>
									<?php endforeach; ?>
									<tr>
										<td>Total Compra:$<?php echo number_format($this->cart->total(),2); ?></td>
										<td><button type="button" class="btn btn-success" onclick="limpiar_carito()">Vaciar
										carrito</button></td>	
										<td><a href="<?php echo base_url('carrito_controller/realizar_pedido'); ?>" class="btn btn-success"
											role="button">Ordenar pedido</a></td>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
						</div>
