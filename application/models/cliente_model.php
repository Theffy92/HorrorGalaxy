<?php
class Cliente_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function guardar_cliente($apellido, $nombre, $mail, $telefono){
		$data = array(
			'apellido' => $apellido,
			'nombre' => $nombre,
			'email' => $mail,
			'telefono' => $telefono,
			'perfil_id'=> 2
		);
		$this->db->insert('personas', $data);
	}

	public function guardar_usuario($mail, $password, $id_persona){
		$data = array(
			'email' => $mail,
			'password' => base64_encode($password),
			'id_persona'=> $id_persona
		);
		$this->db->insert('usuario', $data);
	}
}