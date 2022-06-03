	</div>
	<!--Pie de página del sitio web en general-->
	<footer class="container-fluid mt-5 ">
		<div class="container ">
			<div class="row d-flex justify-content-between">
				<div class="col-6 col-md-3  d-flex align-items-center">
					<ul class="nav flex-column mr-auto d-none d-sm-none d-md-block">
						<li class="nav-item">
							<a class="nav-link active" href="<?php echo base_url('inicio_controller');?>" style="color:white;">Bienvenido</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('quienes_somos');?>" style="color:white;">Quiénes Somos</a>
						</li>
					</ul>	
				</div>
				<div class="col-md-3 d-flex justify-content-center ">
					<ul class="nav flex-column mr-auto d-none d-sm-none d-md-block">
						<li class="nav-item">
							<a class="nav-link active" href="<?php echo base_url('inicio_controller/contacto');?>" style="color:white;"><i class="fas fa-at"></i>Contactanos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('inicio_controller/terminos');?>" style="color:white;"><i class="far fa-file-alt"></i>Términos y Usos</a>
						</li>
					</ul>	
				</div>
				<?php if(!$this->session->userdata('login')) { ?>
				<div class="col-6 col-md-3 d-flex justify-content-center ">
					<ul class="nav flex-column mr-auto ">
						<li>
							<p style="color:white;">¿Aún no tenés una cuenta?</p>
						</li>
						<li class="nav-item" >
							<a class="nav-link" href="<?php echo base_url('cliente_controller/registrarse');?>" style="color:white;" title="pulsa para registrarte"><i class="fas fa-user-plus" ></i>Registrate</a>
						</li>
					</ul>
				</div>
				<?php }
				elseif ($this->session->userdata('perfil_id') == 2) { ?>
					<div class="col-6 col-md-3 d-flex justify-content-center  ">
					<ul class="nav flex-column mr-auto  d-none d-sm-none d-md-block">
						<!--<li class="nav-item">
							<a class="nav-link"  href=""><i class="far fa-user"></i>Welcome <?php echo $this->session->userdata('nombre'); ?></a>
							</li>-->
							<li class="nav-item ">
								<a class="nav-link" href="<?php echo base_url('comercializacion');?>" style="color:white;">Comercialización</a>
							</li>
						
					</ul>
				</div>
				<?php }?>
							
				<div class="col-6 col-md-3 d-flex justify-content-between">
					<div class="d-flex flex-column ml-auto">
						<h3 class="seguir">Seguínos</h3>
						<ul class="list-unstyled list-inline d-flex justify-content-between ">
							<li class="list-inline-item facebook">
								<a href="https://www.facebook.com/HorrorGalaxy" title="seguinos en facebook">
									<i class="fab fa-facebook-square fa-2x"></i>
								</a>
							</li>

							<li class="list-inline-item twitter">
								<a href="https://twitter.com/Theffy_R" title="seguinos en twitter">
									<i class="fab fa-twitter-square fa-2x"></i>
								</a>
							</li>

							<li class="list-inline-item instagram">
								<a href="https://www.instagram.com/theffy_reyes/" title="seguinos en instagram">
									<i class="fab fa-instagram fa-2x"></i>
								</a>
							</li>

							<li class="list-inline-item google">
								<a href="https://plus.google.com/u/0/109929622557107217733" title="seguinos en Google+">
									<i class="fab fa-google-plus-square fa-2x"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="contenedor container mt-0">
			<p class="copy display-7 m-0 text-center" style="color:white;">
				&copy; TheffyDev 2018- All Rights Reserved
			</p>
		</div>

		<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/popper.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"> </script>
		<script type="text/javascript">
			var mensaje = "!Bienvenido!", pausa = 150; 
			function inicio(){ 
				var i = 0;
				var m = mensaje.split(''); 
				var t = setInterval( 
					function(){ 
						if(i >= m.length-1)clearInterval(t); 
						document.getElementById('efecto').innerHTML+=m[i];
						i++; 
					}, pausa); 
			} 
			window.onload = inicio; 
		</script>

			<script>
			function limpiar_carito() {
				var result = confirm('Desea vaciar el carrito?');
				if(result) {
					window.location = "<?php echo base_url(); ?>carrito_controller/borrar/all";
				}else{
			return false; // cancela al acción
				}
			}
		</script>

		
	</footer>
</body>
</html>