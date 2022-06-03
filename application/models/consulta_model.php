<?php
class Consulta_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function guardar_consulta($apellidoc, $nombrec, $mailc, $telefonoc, $consulta){
		$data = array(
			'nombre_consulta' => $nombrec,
			'apellido_consulta' => $apellidoc,
			'email_consulta' => $mailc,
			'telefono_consulta' => $telefonoc,
			'consulta_descripcion' => $consulta
		);
		$this->db->insert('consultas', $data);
	}

	public function select_consultas()
	{
		$this->db->select('*');
		$this->db->from('consultas');
		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_consulta($data, $id)
	{
		$this->db->where('consulta_id', $id);
		$this->db->update('consultas', $data);
	}
}