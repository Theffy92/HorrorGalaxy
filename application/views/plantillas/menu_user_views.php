<!--Menú de navegación normal -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
	<a class="navbar-brand" href="<?php echo base_url('inicio_controller');?>">
		<img class="img-responsive"  src="<?php echo base_url('assets/img/isologo5.png');?>" alt="isologo" widht="50" height="50"> 

	</a>
	<?php if($this->session->userdata('perfil_id') == 2) { ?>
	<h5 style="color:white;" class="d-none d-sm-none d-md-block"><i class="far fa-user"></i>Welcome <?php echo $this->session->userdata('nombre');?></h5><?php }?>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">

		<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-book"></i>Libros
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php echo base_url('inicio_controller/libros/1');?>">Novelas</a>
								<a class="dropdown-item" href="<?php echo base_url('inicio_controller/libros/2');?>">Cómics</a>
							</div>
						</li>
						<li class="nav-item d-md-none">
							<a class="nav-link " href="<?php echo base_url('inicio_controller');?>" >Bienvenido</a>
						</li>
						<li class="nav-item d-md-none">
							<a class="nav-link" href="<?php echo base_url('quienes_somos');?>">Quiénes Somos</a>
						</li>
						<li class="nav-item d-md-none">
							<a class="nav-link" href="<?php echo base_url('inicio_controller/contacto');?>"><i class="fas fa-at"></i>Contactanos</a>
						</li>
						<li class="nav-item d-md-none">
							<a class="nav-link" href="<?php echo base_url('inicio_controller/terminos');?>" ><i class="far fa-file-alt"></i>Términos y Usos</a>
						</li>
						<?php if(!$this->session->userdata('login')) { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('comercializacion');?>">Comercialización</a>
						</li>
						<li class="nav-item">
							<!--LLAMA A MODAL DE LOGIN-->
							<a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="<?php echo base_url('usuario_controller');?>"><i class="fas fa-sign-in-alt"></i>Login</a>
						</li>
						<?php } 
						elseif ($this->session->userdata('perfil_id') == 2) { ?>
							<!--<li class="nav-item">
							<a class="nav-link"  href=""><i class="far fa-user"></i>Welcome <?php echo $this->session->userdata('nombre'); ?></a>
							</li>-->
							<li class="nav-item d-md-none">
								<a class="nav-link" href="<?php echo base_url('comercializacion');?>">Comercialización</a>
							</li>
						
							<li>
							<a class="nav-link"  href="<?php echo base_url('carrito_controller');?>"><i class="fas fa-shopping-cart"></i>Mi Carrito</a>
						</li>
						<li>
								<a class="nav-link"  href="<?php echo base_url('usuario_controller/cerrar_sesion');?>"><i class="fas fa-sign-out-alt"></i>Cerrar Sesion</a>
							</li>
						<?php }?>	

					</ul>
				</div>
			</nav>
			<!--Modal del LOGIN!!-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title mx-auto" id="exampleModalLabel">Iniciar Sesión</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php echo validation_errors(); ?>
							<!--<h1 class="display-5 text-center">Iniciar Sesión</h2>-->
								<?php echo form_open('usuario_controller/iniciar_sesion', ['class' => ' mx-auto form-control', 'role' => 'form']); ?>	
								<div class="form-group">
									<label for="inputEmail4">Email</label>
									<?php echo form_input(['name' => 'mail', 'id' => 'mail', 'type' => 'email', 'class' => 'form-control','placeholder' => 'Ingrese Email', 'value'=>set_value('mail')]); ?>
								</div>
								<div class="form-group">
									<label for="inputPassword4">Contraseña</label>
									<?php echo form_input(['name' => 'password', 'id' => 'password', 'type' => 'password', 'class' => 'form-control','placeholder' => 'Ingrese Contraseña', 'value'=>set_value('password')]); ?>
								</div>
								<?php echo form_submit('Ingresar', 'Ingresar',"class='btn btn-success'"); ?>
								<?php echo form_close();?>
							</div>
							<div class="modal-footer">
								<ul class="nav flex-column mx-auto">
									<li>
										<p style="color:black;"><b>¿Aún no tenés una cuenta?</b></p>
									</li>
									<li class="nav-item" >
										<a class="nav-link" href="<?php echo base_url('cliente_controller/registrarse');?>" style="color:black;"><i class="fas fa-user-plus" ></i><b>Registrate</b></a>
									</li>
								</ul>	
							</div>
					</div>
				</div>
			</div>
</header>

