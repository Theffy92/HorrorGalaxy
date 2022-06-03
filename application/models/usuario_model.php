<?php
/**
* Class Usuario_model
*
* @package Models
* @author 
*/
class Usuario_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function buscar_usuario($usuario, $contrasenia)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('email', $usuario);
		$this->db->where('password', $contrasenia);
		$query = $this->db->get();
		$resultado = $query->row();
		return $resultado;
	}
	public function buscar_persona($id_persona){
		$this->db->select('*');
		$this->db->from('personas');
		$this->db->where('id_persona', $id_persona);
		$query = $this->db->get();
		$resultado = $query->row();
		return $resultado;
	}

	public function select_usuarios()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->join('personas', 'usuario.id_persona = personas.id_persona');
		$this->db->join('perfil', 'personas.perfil_id = perfil.perfil_id');
		$query = $this->db->get();
		return $query->result();
	}


	public function select_usuarios_id($id)
	{
		$this->db->select('*');
		$this->db->from('personas');
		$this->db->where('id_persona', $id);
		//esto agregué para probar


		$query = $this->db->get();
		return $query->result();
	}

	public function actualizar_usuario($data, $id)
	{
		
		$this->db->where('id_usuario', $id);
		$this->db->update('usuario', $data);
	}

	function set_usuarios($id,$data){
		
		$this->db->where('id_persona', $id);
		$query = $this->db->update('personas', $data);

		if($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function eliminar_usuario($data, $id)
	{
		$this->db->where('id_usuario', $id);
		$this->db->update('usuario', $data);
	}
}