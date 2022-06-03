<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function login()
	{
		$data = array('titulo' => 'Ya podés loguearte');
		$this->load->view('plantillas/header_view');
		$this->load->view('plantillas/menu_user_views');
		$this->load->view('front_views/inicio_view');
		$this->load->view('plantillas/footer_view');
	}
	public function iniciar_sesion() {
		$this->form_validation->set_rules('mail', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_verificar_password');
		
		$this->form_validation->set_message('required', '<div class="text-danger">El campo %s es obligatorio</div>');
		if ($this->form_validation->run() == FALSE) {
			$data = array('titulo' => 'Error de formulario');
			$this->load->view('plantillas/header_view' ,$data);
			$this->load->view('plantillas/menu_user_views');
			$this->load->view('front_views/inicio_view');
			$this->load->view('plantillas/footer_view');
		} else {
			$this->usuario_logueado();
		}
	}
	function verificar_password($password) {
// verifica que el usuario exista
		$usuario = $this->input->post('mail');
		$pass = $this->input->post('password');
		$contrasenia = base64_encode($pass);
		$this->load->model('usuario_model');
		$usuario = $this->usuario_model->buscar_usuario($usuario, $contrasenia);
		if ($usuario) {
			$persona_id = $usuario ->id_persona;
			$persona = $this->usuario_model->buscar_persona($persona_id);
			$datos_usuario = array(
				'id_usuario' => $persona->id_persona,
				'nombre' => $persona->nombre,
				'apellido' => $persona->apellido,
				'perfil_id' => $persona->perfil_id,
				'login' => TRUE
			);
			$this->session->set_userdata($datos_usuario);
			return true;
		} else {
		
			$this->form_validation->set_message('verificar_password', '<div class="text-danger">Usuario o contraseña invalidos</div>');
			return false;
		}
	}
	public function usuario_logueado() {
		if ($this->session->userdata('login')){
			$data = array();
			$perfil_usuario = $this->session->userdata('perfil_id');
//SE VERIFICA EL PERFIL DEL USUARIO PARA REDIRECCIONAR A LA PAGINA CORRESPONDIENTE
			switch ($this->session->userdata('perfil_id')) {
				case '1':
				redirect('inicio_controller/admin');
				break;
				case '2':
				redirect('inicio_controller');
				break;
			}
		}else{

			$this->iniciar_sesion();
		}
	}

	public function cerrar_sesion() {
		$this->session->sess_destroy();
		redirect('inicio_controller');
	}

	
}