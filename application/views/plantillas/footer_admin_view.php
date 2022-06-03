
</main>
</div>

</div>
	<!--Pie de página del sitio web en general-->
	<footer class="container-fluid mt-5 ">

		<div class="contenedor container mt-0">
			<p class="copy display-7 m-0 text-center" style="color:white;">
				&copy; TheffyDev 2018- All Rights Reserved
			</p>
		</div>

		<script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/popper.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"> </script>
		<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
		<!-- Core plugin JavaScript-->
		<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js'); ?>"></script>
		<!-- Custom scripts for all pages-->
		<script src="<?php echo base_url('assets/js/sb-admin.min.js'); ?>"></script>
		<!-- Custom scripts for this page-->
		<!-- Toggle between fixed and static navbar-->
		<script>
			$('#toggleNavPosition').click(function() {
				$('body').toggleClass('fixed-nav');
				$('nav').toggleClass('fixed-top static-top');
			});

		</script>
		<!-- Toggle between dark and light navbar-->
		<script>
			$('#toggleNavColor').click(function() {
				$('nav').toggleClass('navbar-dark navbar-light');
				$('nav').toggleClass('bg-dark bg-light');
				$('body').toggleClass('bg-dark bg-light');
			});

		</script>
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

		
	</footer>
</body>
</html>