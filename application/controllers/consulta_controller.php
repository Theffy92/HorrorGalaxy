<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta_controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
public function index()
	{
		$this->load->model('consulta_model'); 
		$data = array('titulo' => 'Listado de Consulta');
		$dat['consultas'] = $this->consulta_model->select_consultas();
		$this->load->view('plantillas/header_view',$data);
		$this->load->view('plantillas/menu_admin_view');
		$this->load->view('plantillas/sidenav_admin_view');
		$this->load->view('back_views/lista_consulta_view', $dat);
		$this->load->view('plantillas/footer_admin_view');
	}

	public function registrar_consulta()
	{
		//Reglas de validacion de los campos del registro de consulta
		$this->form_validation->set_rules('nombreconsulta', 'Nombre', 'required|alpha');
		$this->form_validation->set_rules('apellidoconsulta', 'Apellido', 'required|alpha');
		$this->form_validation->set_rules('mailconsulta', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('telefonoconsulta', 'Telefono', 'required|integer|min_length[10]');
		$this->form_validation->set_rules('consulta', 'Dejanos tus preguntas,dudas e inquietudes', 'required|alpha');

		//Mensajes de error
		$this->form_validation->set_message('valid_email', '<div class="text-danger">El campo %s debe ser un mail válido</div>');
		$this->form_validation->set_message('integer', '<div class="text-danger">El campo %s debe poseer solo numeros enteros</div>');
		$this->form_validation->set_message('required', '<div class="text-danger">El campo %s es obligatorio</div>');
		$this->form_validation->set_message('alpha', '<div class="text-danger">El campo %s sólo debe contener letras</div>');
		$this->form_validation->set_message('min_length', '<div class="text-danger">El campo %s debe contener como mínimo %d caracteres</div>');
		$this->form_validation->set_message('matches', '<div class="text-danger">Las contraseñas no coinciden</div>');

		if ($this->form_validation->run() == FALSE) {
			redirect('contacto');
		} else {
			$this->insertar_consulta();
		}
	}

	public function insertar_consulta()
	{

		$nombrec = $this->input->post('nombreconsulta');
		$apellidoc = $this->input->post('apellidoconsulta');
		$mailc = $this->input->post('mailconsulta');
		$telefonoc = $this->input->post('telefonoconsulta');
		$consulta = $this->input->post('consulta');

		$this->load->model('consulta_model');

		$this->consulta_model->guardar_consulta($apellidoc, $nombrec, $mailc, $telefonoc, $consulta);

		redirect('contacto');
	}

	public function leer_consulta($id=NULL)
	{
		$data = array(
					'leido'=> 1);

			$this->load->model('consulta_model');
			$this->consulta_model->actualizar_consulta($data, $id);
			redirect('consulta_controller');
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