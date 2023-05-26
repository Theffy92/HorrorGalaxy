<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Pedidos_controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('pedidos_model');
		$this->load->model('usuario_model');
		$this->load->model('libro_model');
	}
	public function guardar_pedido()
	{
		
		$orden_pedido = array(
			'id_persona' => $this->session->userdata('id_usuario'),
			'orden_fecha' => date('Y-m-d'),
			'orden_total' => $this->cart->total()
		);
		$id_orden = $this->pedidos_model->guardar_orden_pedido($orden_pedido);
		if ($cart = $this->cart->contents()){
			foreach ($cart as $item){
				$orden_detalle = array(
					'orden_id' => $id_orden,
					'libro_id' => $item['id'],
					'detalle_cantidad' => $item['qty'],
					'detalle_precio' => $item['price'],
				);
				$stock = $this->libro_model->get_stock('libro_id');
				$stock = $stock - $item['qty'];
				/*$stock= $item['stock'] - $item['qty'];*/
				$data= array('stock_libro' => $stock);
				$this->libro_model->set_productos($item['id'], $data);
				$this->pedidos_model->guardar_detalle_pedido($orden_detalle);
			}	
		}
		/*if ($cart = $this->cart->contents()){
			foreach ($cart as $item){
					$id = $item['id'];
					$data = array('stock_libro'=>($item['stock_libro'] - $item['qty']));

					$this->libro_model->set_productos($id, $data);
			}
		}*/
		
		$this->cart->destroy();

		$this->load->view('plantillas/header_view');
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('front_views/pedido_success_view.php');
		$this->load->view('plantillas/footer_view.php');

	}
}
