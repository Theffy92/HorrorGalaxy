<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas_controller extends CI_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model('libro_model');
		$this->load->model('pedidos_model');
		$this->load->model('ventas_model');
    }

	function index()
	{$dat = array('titulo' => 'Pedidos');
		if ($this->session->userdata('login') && $this->session->userdata('perfil_id') == 1) 
		{
			$this->load->library('pagination'); //Se carga la librería de paginación
			$config['base_url'] = base_url().'ventas';
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
			$config['total_rows'] = count ($this->pedidos_model->select_details());
			$config['per_page'] = 3; //Número de registros a mostrar
			$config['num_links'] = 3; //Número de links a mostrar
			$config["uri_segment"] =2;//el segmento de la paginación
			$this->pagination->initialize($config);
			$page=$this->uri->segment(2);
			$limit= 3;
			$data['ventas'] = $this->pedidos_model->paginas_mostrar($limit, $page);
			$this->load->view('plantillas/header_view', $dat);
			$this->load->view('plantillas/menu_admin_view');
			$this->load->view('plantillas/sidenav_admin_view');
			$this->load->view('back_views/lista_ventas_view', $data);
			$this->load->view('plantillas/footer_admin_view');
			/*$this->load->view('plantillas/header_view');
			$this->load->view('plantillas/menu_admin_view');
			$this->load->view('plantillas/sidenav_admin_view');
			
			$query = $this->pedidos_model->get_all_sale();

			$data = array
				(
					
					'ventas' => $query
				);
			
			$this->load->view('back_views/lista_ventas_view', $data);
			$this->load->view('plantillas/footer_admin_view');*/
		}
		else
		{			
			redirect('login');
		}
	}
	
	function detalles ()
	{
		if ($this->session->userdata('login') && $this->session->userdata('perfil_id') == 1) 
		{
			$this->load->view('plantillas/header_view');
			$this->load->view('plantillas/menu_admin_view');
			$this->load->view('plantillas/sidenav_admin_view');
			$query = $this->pedidos_model->get_detail($this->uri->segment(3));
			$order = $this->pedidos_model->get_detail_order($this->uri->segment(3));
			

			$data = array
				(
					'cabecera' => $query,
					'detalle' => $order
				);
			
			$this->load->view('back_views/detalle_venta_view', $data);
			$this->load->view('plantillas/footer_admin_view');
		}
		else
		{			
			redirect('login');
		}
	}

	function mas_vendidos($categoria){
		$vendidos= $this->libro_model->get_mas_vendidos();
		$query =$this->libro_model->select_libro_genero($categoria);
		$dato = array (
	    	'libro'=> $query,);
		if ($categoria==1) {
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('back_views/libros_views/novelas2_view', $dato);
		$this->load->view('plantillas/footer_view');}
		else{
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('back_views/libros_views/comics_view', $dato);
		$this->load->view('plantillas/footer_view');
		}

	}
}