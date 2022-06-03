<?php /**
* Class Carrito_controler
* @package Controllers
* @author Prof. Alfonzo, pedro
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Carrito_controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function index() {
		$datas = array('titulo' => 'Carrito');
		if (!$this->cart->contents()){
			$data['message'] = 'El carrito está vacío!';
		}else{
			$data['message'] = '';
		}
		$this->load->view('plantillas/header_view', $datas);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('carrito/carrito_view', $data);
		$this->load->view('plantillas/footer_view');
	}
	public function realizar_pedido(){
		$datas = array('titulo' => 'Resumen de pedido');
		$data['message'] = '';
		$this->load->view('plantillas/header_view', $datas);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('carrito/comprar_carrito_view', $data);
		$this->load->view('plantillas/footer_view');
	}

	public function agregar_carrito($categoria)
	{
		$this->load->model('libro_model');
		$query =$this->libro_model->select_libro_genero($categoria);
		$dat = array('titulo' => 'libros');
		$dato = array (
	    	'libro'=> $query,);
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('titulo'),
			'price'=> $this->input->post('precio'),
			'qty' => 1
		);
		$this->cart->insert($data);
		if ($categoria==1) {
		$this->load->view('plantillas/header_view',$dat);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('back_views/libros_views/novelas2_view', $dato);
		$this->load->view('plantillas/footer_view');}
		else{
		$this->load->view('plantillas/header_view',$dat);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('back_views/libros_views/comics_view', $dato);
		$this->load->view('plantillas/footer_view');
		}
	}

	public function agregar_inicio_carrito($categoria)
	{
		$this->load->model('libro_model');
		$this->load->model('ventas_model');
		$novela= $this->ventas_model->get_mas_vendidos();
		$comic =$this->ventas_model->get_mas_vendidos_comics();
		$dato = array (
	    	'novela'=> $novela,
	    	'comic'=> $comic,);
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('titulo'),
			'price'=> $this->input->post('precio'),
			'qty' => 1
		);
		$datas = array('titulo' => 'Principal');
		$this->cart->insert($data);
		$this->load->view('plantillas/header_view',$datas);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('front_views/inicio_view', $dato);
		$this->load->view('plantillas/footer_view');
		$this->load->model('libro_model');
	}

	function borrar ($id) {
		if ($id=="all"){
			$this->cart->destroy();
		}else{
			$data = array(
				'rowid' => $id,
				'qty' => 0
			);
			$this->cart->update($data);
		}
		redirect('carrito_controller');
	}
}