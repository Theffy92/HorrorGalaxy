<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libro_controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	
	public function index()
	{
		$this->load->model('libro_model'); 
		$dato['generos'] = $this->libro_model->select_categoria();
		$cat['categorias'] = $this->libro_model->select_categoria2();
		$data = array('titulo' => 'Agregar Libro');
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_admin_view');
		$this->load->view('plantillas/sidenav_admin_view');
		//$this->load->view('plantillas/navbar_admin_view');
		$this->load->view('back_views/agregar_libro_view', array_merge($dato,$cat));
		$this->load->view('plantillas/footer_admin_view');
	}

	public function registrar_libro()
	{
		//Reglas de validacion de los campos del registro de usuario
		 $this->form_validation->set_rules('titulo', 'Titulo', 'required'); 
		 $this->form_validation->set_rules('autor', 'Autor', 'required'); 
		 $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
		 $this->form_validation->set_rules('isbn', 'ISBN', 'required|integer'); 
		 $this->form_validation->set_rules('stock', 'Stock', 'required|integer'); 
		 $this->form_validation->set_rules('precio', 'Precio', 'required|decimal'); 
		 $this->form_validation->set_rules('genero', 'Seleccionar un genero', 'required|callback_select_validate');
		 $this->form_validation->set_rules('categoria', 'Seleccione categoria', 'callback_select_validate_cat');
		 $this->form_validation->set_rules('imagen', 'Seleccionar una imagen', 'callback_validar_imagen');
		 $this->form_validation->set_rules('editorial', 'Editorial', 'required');
		$this->form_validation->set_rules('anioedicion', 'Anioedicion', 'required|integer');
		$this->form_validation->set_rules('idioma', 'Idioma', 'required'); 
 		//mensajes de error
		 $this->form_validation->set_message('decimal', 'Debe ingresar valores con decimales');
		 $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
		 $this->form_validation->set_message('required', 'El campo %s es obligatorio'); 
		 if ($this->form_validation->run() == FALSE) {  $this->index(); }
		 else { $this->guardar_libro(); } 
	}

	function validar_imagen($imagen) { 
		//Verifica que se ingreso una imagen 
		$nombre_imagen = $_FILES['imagen']['name']; 
		//Obtiene el nombre de la imagen 
		if (empty($nombre_imagen)) {
			$this->form_validation->set_message('validar_imagen', 'Seleccionar una imagen'); return false; } else { return true; } 
		}

		function select_validate($genero) {
		 // verifica que se selecciono una categoria del libro 
			if($genero=="ninguno"){ 
				$this->form_validation->set_message('select_validate', 'Seleccione un genero'); 
				return false; } 
				else{ return true; }
			}

			function select_validate_cat($categoria) {
		 // verifica que se selecciono una categoria del libro 
			if($categoria=="ninguno"){ 
				$this->form_validation->set_message('select_validate_cat', 'Seleccione una categoria'); 
				return false; } 
				else{ return true; }
			}

	function guardar_libro() { 
		$config['upload_path'] = 'uploads/imagenes_libro';
		$config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG'; 
		$config['remove_spaces'] = TRUE; 
		$config['max_size'] = '1024'; 
		$this->load->library('upload', $config); 
		if (!$this->upload->do_upload('imagen')) { 
			echo "<script type=\"text/javascript\">alert('No se pudo cargar el archivo');</script>"; 
			$this->index(); }
			 else { $url = "uploads/imagenes_libro/".$_FILES['imagen']['name'];
			 	 $data = array( 
			 	'titulo' => $this->input->post('titulo'), 
			 	'autor' => $this->input->post('autor'), 
			 	'descripcion'=> $this->input->post('descripcion'), 
			 	'stock_libro' => $this->input->post('stock'), 
			 	'precio'=> $this->input->post('precio'), 
			 	'imagen' => $url,
			 	'categoria_id'=> $this->input->post('categoria'),
			 	'genero_id'=> $this->input->post('genero'),
			 	'isbn'=> $this->input->post('isbn'), 
			 	'idioma'=> $this->input->post('idioma'),
			 	'editorial'=> $this->input->post('editorial'),
			 	'anio_edicion'=> $this->input->post('anioedicion'),
			 	'estado_libro' => 1 );

			 	$this->load->model('libro_model'); 
			 	$this->libro_model->guardar_libro($data); redirect('libro_controller/gestionar_libro');
			}
		}

	public function gestionar_libro()
	{
		$this->load->model('libro_model');
		$data['libros'] = $this->libro_model->select_libros();
		$this->load->view('plantillas/header_view');
		$this->load->view('plantillas/menu_admin_view');
		$this->load->view('plantillas/sidenav_admin_view');
		$this->load->view('back_views/gestionar_libro_view', $data);
		$this->load->view('plantillas/footer_admin_view');

	}

	public function editar_libro($id=NULL) {
		$this->load->model('libro_model');
		$libro = $this->libro_model->select_libros_id($id);

		foreach ($libro as $row) {
			$data['libro_id'] = $row->libro_id;
			$data['titulo'] = $row->titulo;
			$data['descripcion'] = $row->descripcion;
			$data['autor'] = $row->autor;
			$data['categoria'] = $row->categoria_id;
			$data['genero'] = $row->genero_id;
			$data['isbn'] = $row->isbn;
			$data['editorial'] = $row->editorial;
			$data['anioedicion'] = $row->anio_edicion;
			$data['imagen'] = $row->imagen;
			$data['idioma'] = $row->idioma;
			$data['precio'] = $row->precio;
			$data['stock']= $row->stock_libro;	

		}
		//print_r($data['categoria']);
		//die;
		$cat['categorias'] = $this->libro_model->select_categoria2();
		$dato['generos'] = $this->libro_model->select_categoria();
		$this->load->view('plantillas/header_view');
		$this->load->view('plantillas/menu_admin_view');
		$this->load->view('plantillas/sidenav_admin_view');
		$this->load->view('back_views/gestionar_edicion_libro_view',array_merge($data, $dato, $cat));
		$this->load->view('plantillas/footer_admin_view');
	}

	public function actualizar_libro($id)
	{
		// VALIDAR LOS DATOS INGRESADOS
		//Reglas de validacion de los campos del registro de usuario
		 $this->form_validation->set_rules('titulo', 'Titulo', 'required'); 
		 $this->form_validation->set_rules('autor', 'Autor', 'required'); 
		 $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
		 $this->form_validation->set_rules('isbn', 'ISBN', 'required|integer'); 
		 $this->form_validation->set_rules('stock', 'Stock', 'required|integer'); 
		 $this->form_validation->set_rules('precio', 'Precio', 'required|decimal'); 
		 $this->form_validation->set_rules('genero', 'Seleccionar un genero', 'required|callback_select_validate');
		 $this->form_validation->set_rules('editorial', 'Editorial', 'required');
		$this->form_validation->set_rules('anioedicion', 'Anioedicion', 'required');
		$this->form_validation->set_rules('idioma', 'Idioma', 'required'); 
 		//mensajes de error
		 $this->form_validation->set_message('decimal', 'Debe ingresar valores con decimales'); 
		 $this->form_validation->set_message('integer', 'El campo %s debe poseer solo numeros enteros');
		 $this->form_validation->set_message('required', 'El campo %s es obligatorio'); 

		$data = array(
			'titulo' => $this->input->post('titulo'), 
		 	'autor' => $this->input->post('autor'), 
		 	'descripcion'=> $this->input->post('descripcion'), 
		 	'stock_libro' => $this->input->post('stock'), 
		 	'precio'=> $this->input->post('precio'),  
		 	'genero_id'=> $this->input->post('genero'),
		 	'isbn'=> $this->input->post('isbn'), 
		 	'idioma'=> $this->input->post('idioma'),
		 	'editorial'=> $this->input->post('editorial'),
		 	'anio_edicion'=> $this->input->post('anioedicion'),
		);

		if (!$this->form_validation->run())
		{
			//ARREGLAR!!
		$dato['generos'] = $this->libro_model->select_categoria();
		$this->load->view('plantillas/header_view');
		$this->load->view('plantillas/menu_admin_view');
		$this->load->view('plantillas/sidenav_admin_view');
		$this->load->view('back_views/gestionar_edicion_libro_view',array_merge($data, $dato));
		$this->load->view('plantillas/footer_admin_view');
		}
		else
		{
			$this->_image_modif();		
		}

	}

	function _image_modif()
	{
		//Cargo la libreria para subir archivos
		$this->load->library('upload');
		$this->load->model('libro_model');		

		// Obtengo el id del libro
		$id = $this->uri->segment(3);
        // Array de datos para obtener datos de libros sin la imagen 
		$data = array(
			'titulo' => $this->input->post('titulo'), 
		 	'autor' => $this->input->post('autor'), 
		 	'descripcion'=> $this->input->post('descripcion'), 
		 	'stock_libro' => $this->input->post('stock'), 
		 	'precio'=> $this->input->post('precio'),  
		 	'genero_id'=> $this->input->post('genero'),
		 	'isbn'=> $this->input->post('isbn'), 
		 	'idioma'=> $this->input->post('idioma'),
		 	'editorial'=> $this->input->post('editorial'),
		 	'anio_edicion'=> $this->input->post('anioedicion'),
		);

		// Si la iamgen esta vacia se asume que no se modifica
        if (!empty($_FILES['imagen']['name']))
		{            
                // Especifica la configuración para el archivo
                $config['upload_path'] = 'uploads/imagenes_libro';
                $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';

                $config['max_size'] = '2048';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';       
 
                // Inicializa la configuración para el archivo 
                $this->upload->initialize($config);
                 
                if ($this->upload->do_upload('imagen'))
                {
                	// Mueve archivo a la carpeta indicada en la variable $data
                    $file = $this->upload->data();
                    // Path donde guarda el archivo..
                    $url = "uploads/imagenes_libro/".$_FILES['imagen']['name'];
                 	// Agrego la imagen si se modifico.  
					$data['imagen'] = $url;
					// Actualiza datos del libro
					$this->libro_model->set_productos($id, $data);
					redirect('libro_controller/gestionar_libro');
                }
                else
                {
                	//Mensaje de error si no existe imagen correcta
                    $imageerrors = '<div class="alert alert-danger">El campo %s es incorrecta, extensión incorrecto o excede el tamaño permitido que es de: 2MB </div>';
                    $this->form_validation->set_message('_image_modif',$imageerrors );
					return false;
                } 
        } else {
        	
			$this->libro_model->set_productos($id, $data);
					redirect('libro_controller/gestionar_libro');
		}
    }

	public function eliminar_libro($id=NULL)
	{
		$data = array(
					'estado_libro'=> 0);

			$this->load->model('libro_model');
			$this->libro_model->actualizar_libro($data, $id);
			redirect('libro_controller/gestionar_libro');
	}

	public function activar_libro($id=NULL)
	{
		$data = array(
			'estado_libro'=> 1
		);
		$this->load->model('libro_model');
		$this->libro_model->actualizar_libro($data, $id);
		redirect('libro_controller/gestionar_libro');
	}
}
