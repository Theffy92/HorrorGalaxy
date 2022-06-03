<!--Menú de navegación normal -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
	<a class="navbar-brand" href="<?php echo base_url('inicio_controller/admin');?>"> ADMIN
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="far fa-user"></i><?php echo $this->session->userdata('nombre'); ?>
							</a>
							<div class="dropdown-menu " aria-labelledby="navbarDropdown">
								<a class="dropdown-item d-md-none" href="<?php echo base_url('usuario_controller/cerrar_sesion');?>"><i class="fas fa-sign-out-alt"></i>salir</a>
								<a class="dropdown-item" href="<?php echo base_url('gestion_usuario_controller/editar_usuario/').$this->session->userdata('id_usuario');?>" class="list-group-item" data-parent="#menu1"><i class="fa fa-cogs" aria-hidden="true"></i>Editar Perfil</a>
							</div>
						</li>
						<li class="nav-item d-none d-sm-none d-md-block">
							<a class="nav-link" href="<?php echo base_url('usuario_controller/cerrar_sesion');?>"><i class="fas fa-sign-out-alt"></i>salir</a>
						</li>
						<li class="nav-item d-md-none">
							<a class="nav-link" href="<?php echo base_url('ventas');?>"><i class="fas fa-shopping-bag"></i>Ventas</a>
						</li>
						<li class="nav-item dropdown d-md-none">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-users" aria-hidden="true"></i>Gestion Usuarios
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php echo base_url('gestion_usuario_controller/add_usuario');?>"><i class="fa fa-user-plus" aria-hidden="true"></i>Agregar Usuario</a>
								<a class="dropdown-item" href="<?php echo base_url('gestion_usuario_controller/gestionar_usuario');?>"><i class="fa fa-cogs" aria-hidden="true"></i>Modificar Usuario</a>
							</div>
						</li>
						<li class="nav-item dropdown d-md-none">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-book"></i>Gestion libros
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php echo base_url('libro_controller');?>"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar libro</a>
								<a class="dropdown-item" href="<?php echo base_url('libro_controller/gestionar_libro');?>"><i class="fa fa-cogs" aria-hidden="true"></i>Modificar libro</a>
							</div>
						</li>
						<li class="nav-item d-md-none">
							<a class="nav-link" href="<?php echo base_url('consulta_controller');?>"><i class="fas fa-question"></i>Consultas</a>
						</li>

					</ul>
				</div>

			</nav>
