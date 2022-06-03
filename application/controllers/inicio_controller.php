<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio_controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('libro_model');
	}
	public function index()
	{
		$this->load->model('ventas_model');
		$novela= $this->ventas_model->get_mas_vendidos();
		$comic =$this->ventas_model->get_mas_vendidos_comics();
		$dato = array (
			'novela'=> $novela,
			'comic'=> $comic,);
		$data = array('titulo' => 'Principal');
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('front_views/inicio_view', $dato);
		$this->load->view('plantillas/footer_view');
	}

	public function admin()
	{
		$data = array('titulo' => 'Administracion');
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_admin_view');
		$this->load->view('plantillas/sidenav_admin_view');
		$this->load->view('back_views/admin_principal_view');
		$this->load->view('plantillas/footer_admin_view');
	}


	public function quienessomos()
	{
		$data = array('titulo' => 'nosotros');
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('front_views/quienessomos_view');
		$this->load->view('plantillas/footer_view');
	}

	public function comercializacion()
	{
		$data = array('titulo' => 'Comercializacion');
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('front_views/comercializacion_view');
		$this->load->view('plantillas/footer_view');
	}

	public function contacto()
	{
		$data = array('titulo' => 'Contacto');
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('front_views/contacto_view');
		$this->load->view('plantillas/footer_view');
	}

	public function terminos()
	{
		$data = array('titulo' => 'Terminos');
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('front_views/terminos_view');
		$this->load->view('plantillas/footer_view');
	}

	public function libros($categoria){
/*$this->load->library('pagination'); //Se carga la librería de paginación
		$config['base_url'] = base_url().'inicio_controler/libros/';
		$config['first_link'] = 'Primero';
		$config['prev_link'] = 'Anterior';
		$config['last_link'] = 'Último';
		$config['next_link'] = 'Siguiente';
//integratción con bootstrap
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '<span></span></span></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['total_rows'] = count ($this->libro_model->select_libros());
		$config['per_page'] = 3; //Número de registros a mostrar
		$config['num_links'] = 3; //Número de links a mostrar
		$config["uri_segment"] = 3;//el segmento de la paginación
		$this->pagination->initialize($config);
		$page=$this->uri->segment(3);
		$data['libro'] = $this->libro_model->paginas_mostrar_novela(3, $page);
		$this->load->view('plantillas/header_view');
		$this->load->view('plantillas/menu_user_views');*/

		$query =$this->libro_model->select_libro_genero($categoria);
		$id = $this->libro_model->select_descripcion('libro_id');
		$data = array('titulo' => 'libros');
		$dato = array (
			'libro'=> $query,);
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_user_views');
		if ($categoria==1) {
			$this->load->view('back_views/libros_views/novelas2_view', $dato);
		}
		else{
		$this->load->view('back_views/libros_views/comics_view', $dato);
		}

		$this->load->view('plantillas/footer_view');
	}

}