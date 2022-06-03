<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
public function index()
	{
		$data = array('titulo' => 'Ingresa');
		/*$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_user_views');
		/*$this->load->view('back_views/login_view');
		$this->load->view('plantillas/footer_view');*/
	}
	
	public function registrarse()
	{
		$data = array('titulo' => 'Registrate');
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('back_views/registro_user_view');
		$this->load->view('plantillas/footer_view');
	}

	public function registrar_cliente()
	{
		//Reglas de validacion de los campos del registro de usuario
		$this->form_validation->set_rules('apellido', 'Apellido', 'required|alpha');
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|alpha');
		$this->form_validation->set_rules('mail', 'Email', 'required|valid_email|is_unique[usuario.email]');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|integer|min_length[10]');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('passconf', 'Repetir Contraseña', 'trim|required|matches[password]');

		//Mensajes de error
		$this->form_validation->set_message('valid_email', '<div class="text-danger">El campo %s debe ser un mail válido</div>');
		$this->form_validation->set_message('integer', '<div class="text-danger">El campo %s debe poseer solo numeros enteros</div>');
		$this->form_validation->set_message('required', '<div class="text-danger">El campo %s es obligatorio</div>');
		$this->form_validation->set_message('alpha', '<div class="text-danger">El campo %s sólo debe contener letras</div>');
		$this->form_validation->set_message('min_length', '<div class="text-danger">El campo %s debe contener como mínimo %d caracteres</div>');
		$this->form_validation->set_message('matches', '<div class="text-danger">Las contraseñas no coinciden</div>');

		if ($this->form_validation->run() == FALSE) {
			$this->registrarse();
		} else {
			$this->insertar_cliente();
		}
	}

	public function insertar_cliente()
	{
		$apellido = $this->input->post('apellido');
		$nombre = $this->input->post('nombre');
		$mail = $this->input->post('mail');
		$telefono = $this->input->post('telefono');
		$password = $this->input->post('password');
		$passconf = $this->input->post('passconf');
		$this->load->model('cliente_model');


		$this->cliente_model->guardar_cliente($apellido, $nombre, $mail, $telefono);

		$id_persona = $this->db->insert_id();
		
		$this->cliente_model->guardar_usuario($mail, $password, $id_persona);

		redirect('usuario_controller/login');
	}
}


