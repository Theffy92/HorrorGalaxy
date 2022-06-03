<!--Slide que muestra graficamente de que trata el sitio-->
<div class="container-fluid p-0">
	<div id="carouselExampleIndicators" class="carousel slide d-none d-sm-block" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
			<!--<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>-->
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="<?php echo base_url('assets/img/Slide/slide1.jpg'); ?>" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url('assets/img/Slide/slideking.jpg'); ?>" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url('assets/img/Slide/slidelibros.jpg'); ?>" alt="Third slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="<?php echo base_url('assets/img/Slide/slidecomics.jpg'); ?>" alt="Fourth slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div> 
<div class="welcome container text-justify">
	<!--Informacion general del sitio web y lo que vende-->
	<h1 class="text-center my-4" id="efecto" style="font-style: italic;"></h1>
	<section class="row text-justify" >
		<article>
			<h2 class="text-center">Horror Galaxy- Bookstore online</h2>
			<p class="text-justify">           
				Encontrá en nuestra página los mejores libros de géneros del terror, suspense y gótico. Los libros que desees los podrás obtener aquí y te acompañaran todas tus noches antes de ir a dormir.
			</p>  
		</article>
		<div class="container d-none d-sm-none d-md-block">
			<div class="row">
				<div class="col-md-4"> 
					<img class="img-responsive"  src="<?php echo base_url('assets/img/escribiendo.jpg');?>" alt="isologo" style="height:225px; width:100%; display:block;">
				</div>
				<div class="col-md-4 my-3 my-sm-0"> 
					<img class="img-responsive"  src="<?php echo base_url('assets/img/imagen-de-casa-embrujada1.jpg');?>" alt="isologo" style="height:225px; width:100%; display:block;">
				</div>
				<div class="col-md-4"> 
					<img class="img-responsive"  src="<?php echo base_url('assets/img/sotano_terror_large.jpg');?>" alt="isologo" style="height:225px; width:100%; display:block;">
				</div>  
			</div>
		</div>       
		<br>
		<p class="d-none d-sm-none d-md-block text-justify">
			También contamos con nuestra sección de cómics y mangas, para disfrutar de una lectura ilustrada, increíble y que permita hacer volar tu imaginación.
			No te pierdas el mejor terror en tinta.
			Comics de horror los hubo siempre y curiosamente esta forma tuvo sus etapas, como le sucedio al cine o a la literatura. Estuvo lo mas clasico: Vampiros, momias, muertos vivientes, hechiceros para pasar a temitas mas turbios, con Hellblazer o Preacher hasta culminar en el boom zombi y post-apocaliptico que vivimos hoy.
		</p>                        
	</section>
			<div class="text-center" >
				
				<h1 class="titulo">
					Libros más vendidos
				</h1>
			</div>
			<section class="row">
				<?php
			foreach ($novela as $row) {?>
				<div class="col-6 col-md-3">
					<div class="thumbnail">
						<img class="img-thumb d-block w-100" src='<?php echo base_url("$row->imagen") ?>' alt="...">
						<div class="caption">
							<p><b>Autor: <em><?php echo ("$row->autor")?></em></b> </p>
							<h5><b>Género:</b><?php echo ("$row->genero_descripcion")?></h5>
							<h5><b>Stock:</b><?php echo ("$row->stock_libro")?></h5>
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
									echo form_open('carrito_controller/agregar_inicio_carrito/1');
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
	</section>
			<div class="text-center d-none d-sm-none d-md-block" >			
				<h1 class="titulo">
					Cómics más vendidos
				</h1>
			</div>
	<section class="row">
		<?php
			// "$products" send from "shopping" controller,its stores all product which available in database. 
		foreach ($comic as $row) {?>
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
									echo form_open('carrito_controller/agregar_inicio_carrito/2');
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
	</section>
</div>
