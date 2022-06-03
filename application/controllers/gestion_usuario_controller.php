	<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Gestion_usuario_controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function gestionar_usuario()
	{
		$this->load->model('usuario_model');
		$data['usuarios'] = $this->usuario_model->select_usuarios();
		$this->load->view('plantillas/header_view');
		$this->load->view('plantillas/menu_admin_view');
		$this->load->view('plantillas/sidenav_admin_view');
		$this->load->view('back_views/gestionar_usuario_view', $data);
		$this->load->view('plantillas/footer_admin_view');

	}

    public function add_usuario()
	{

		$this->load->view('plantillas/header_view');
		$this->load->view('plantillas/menu_admin_view');
		$this->load->view('plantillas/sidenav_admin_view');
		$this->load->view('back_views/registro_user_view');
		$this->load->view('plantillas/footer_admin_view');

	}

	public function editar_usuario($id=NULL) {
		
		$this->load->model('usuario_model');
		$usuarios = $this->usuario_model->select_usuarios_id($id);

		foreach ($usuarios as $row) {
			$data['id_persona'] = $row->id_persona;
			$data['nombre'] = $row->nombre;
			$data['apellido'] = $row->apellido;
			$data['mail'] = $row->email;
			$data['telefono'] = $row->telefono;

		}

		//print_r($data['id_usuario']);
		//die;
		$this->load->view('plantillas/header_view');
		$this->load->view('plantillas/menu_admin_view');
		$this->load->view('plantillas/sidenav_admin_view');
		$this->load->view('back_views/gestionar_edicion_usuario_view', $data);
		$this->load->view('plantillas/footer_admin_view');
	}

	/*public function actualizar_usuario($id)
	{
		$this->load->model('usuario_model');
		$id = $this->uri->segment(3);
		// VALIDAR LOS DATOS INGRESADOS
		//Reglas de validacion de los campos del registro de usuario
		 $this->form_validation->set_rules('nombre', 'Nombre', 'required'); 
		 $this->form_validation->set_rules('apellido', 'Apellido', 'required'); 
		 $this->form_validation->set_rules('mail', 'Email', 'required');
		 $this->form_validation->set_rules('telefono', 'Telefono', 'required'); ; 
 		//mensajes de error
		 $this->form_validation->set_message('required', 'El campo %s es obligatorio'); 

		/*$data = array(
			'nombre' => $this->input->post('nombre'), 
		 	'apellido' => $this->input->post('apellido'), 
		 	'email'=> $this->input->post('mail'), 
		 	'telefono' => $this->input->post('telefono'), 
		);


		if (!$this->form_validation->run())
		{
			//ARREGLAR!!
		$dato= array('titulo' => 'Error de formulario');
		$this->load->view('plantillas/header_view', $dato);
		$this->load->view('plantillas/menu_admin_view');
		$this->load->view('back_views/gestionar_edicion_libro_view',$data);
		$this->load->view('plantillas/footer_admin_view');
		}
		else
		{

			$this->usuario_model->actualizar_usuario( $id);
			redirect('gestion_usuario_controller/gestionar_usuario');	
		}


	}*/

	public function actualizar_usuario()
	{
		// VALIDAR LOS DATOS INGRESADOS
		//Reglas de validacion de los campos del registro de usuario
		$id=$this->input->post('id');
        
		 $this->form_validation->set_rules('nombre', 'Nombre', 'required'); 
		 $this->form_validation->set_rules('apellido', 'Apellido', 'required'); 
		 $this->form_validation->set_rules('mail', 'Email', 'required');
		 $this->form_validation->set_rules('telefono', 'Telefono', 'required'); ; 
 		//mensajes de error
		 $this->form_validation->set_message('required', 'El campo %s es obligatorio'); 
		$data = array(

			'nombre' => $this->input->post('nombre'), 
		 	'apellido' => $this->input->post('apellido'), 
		 	'email'=> $this->input->post('mail'), 
		 	'telefono' => $this->input->post('telefono'), 
		);
		
		
		$this->load->model('usuario_model');
		$this->usuario_model->set_usuarios($id,$data);
		if ($this->session->userdata('perfil_id') == 1){
		redirect('inicio_controller/admin');
		}
		else{
			redirect('inicio_controller');
		}
	}

	public function eliminar_usuario($id=NULL)
	{ 
		$data = array(
					'estado_usuario'=> 0);

			$this->load->model('usuario_model');
			$this->usuario_model->actualizar_usuario($data, $id);
			redirect('gestion_usuario_controller/gestionar_usuario');
	}

	public function activar_usuario($id=NULL)
	{
		$data = array(
			'estado_usuario'=> 1
		);
		$this->load->model('usuario_model');
		$this->usuario_model->actualizar_usuario($data, $id);
		redirect('gestion_usuario_controller/gestionar_usuario');
	}
}