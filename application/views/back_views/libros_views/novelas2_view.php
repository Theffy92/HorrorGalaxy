<div class="container p-0" id="products_e" align="center">
	 <h2 class="display-6 d-md-none text-center">Novelas</h2>
            <p class="display-4 d-none d-sm-none d-md-block text-center">Novelas</p>

	<div class="row">
		<?php
			// "$products" send from "shopping" controller,its stores all product which available in database. 
		foreach ($libro as $row) {?>
				
				<div class="col-6 col-md-3">
					<div class="thumbnail">
						<img class="img-thumb d-block w-100" src='<?php echo base_url("$row->imagen") ?>' alt="...">
						<div class="caption">
							<p><b>Autor: <em><?php echo ("$row->autor")?></em></b> </p>
							<h5><b>Género:</b><?php echo ("$row->genero_descripcion")?></h5>
							<h5><b>Stock:</b><?php echo ("$row->stock_libro")?></h5>
							<!--<p><?php echo ("$row->descripcion") ?></p>-->
							<p>
								<a class="btn btn-primary" data-toggle="collapse" href="#<?php echo $row->libro_id;?>" role="button" aria-expanded="false" aria-controls="id">
									ver descripción
								</a>
							</p>
							<div class="collapse" id="<?php echo $row->libro_id;?>">
								<div class="card card-body">
									<?php echo ("$row->descripcion") ?>
								</div>
							</div>
							<p><b>precio</b>:<big style="color:green">
								$<?php echo ("$row->precio") ?></big></p>
								<p><?php if ($this->session->userdata('login')) {
									echo form_open('carrito_controller/agregar_carrito/1');
									echo form_hidden('id', $row->libro_id);
									echo form_hidden('titulo', $row->titulo);
									echo form_hidden('precio', $row->precio);
									echo form_submit('comprar', 'Agregar al carrito',"class='btn btn-success'");
									echo form_close();
								} ?></p>
							</div>
						</div>
					</div>

				<?php }?>


</div>
