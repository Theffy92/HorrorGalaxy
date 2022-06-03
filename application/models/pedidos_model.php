<?php

class Pedidos_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	public function guardar_orden_pedido($orden_pedido){
		$this->db->insert('orden_pedido', $orden_pedido);
// Retorna el último id_orden_pedido ingresado
		return $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	public function guardar_detalle_pedido($orden_detalle){
       
		$this->db->insert('orden_detalle', $orden_detalle);
		// $query = $this->db->query('SELECT MAX(orden_id) AS maximo FROM orden_pedido');
		// foreach ($query->result() as $row)
		// {
		// 	echo $row->maximo;die;
		// }
	}

	function get_all_sale()
	{
		$this->db->select('o.orden_id, o.orden_fecha, p.nombre, p.apellido');
        $this->db->from('personas AS p');
        $this->db->join('orden_pedido AS o', 'o.id_persona=p.id_persona');
		$query = $this->db->get();
			
		return $query;
    }
	
	function get_detail($id)
	{   
		$this->db->select('o.orden_id, o.orden_fecha, o.orden_total, p.nombre, p.apellido');
        $this->db->from('personas AS p');
        $this->db->join('orden_pedido AS o', 'o.id_persona=p.id_persona');
		$this->db->where('o.orden_id', $id);
		
		$query = $this->db->get();
			
		return $query->row();
    }
	
	function get_detail_order($id)
	{


		$this->db->select('o.orden_id, l.titulo, d.detalle_cantidad, d.detalle_precio');
        $this->db->from('orden_pedido AS o');
        $this->db->join('orden_detalle AS d', 'd.orden_id=o.orden_id');
        $this->db->join('libro AS l', 'd.libro_id=l.libro_id');
		$this->db->where('d.orden_id', $id);

		$query = $this->db->get();	
		return $query->result();
    }
    function select_details()
	{   
		$this->db->select('o.orden_id, o.orden_fecha, o.orden_total, p.nombre, p.apellido');
        $this->db->from('personas AS p');
        $this->db->join('orden_pedido AS o', 'o.id_persona=p.id_persona');
		
		$query = $this->db->get();
		return $query->result();
	}	
	
    public function paginas_mostrar($limit, $row){
    	$this->db->select('o.orden_id, o.orden_fecha, p.nombre, p.apellido');
        $this->db->from('personas AS p');
        $this->db->join('orden_pedido AS o', 'o.id_persona=p.id_persona');
        $this->db->limit($limit,$row);
		$query = $this->db->get();
    	return $query->result();
    	
    	/*$this->db->select('*');
    	$this->db->from('libro');
    	$this->db->limit($limit,$row);
    	$this->db->join('libro_categoria', 'libro_categoria.categoria_id = libro.libro_categoria');
    	$query = $this->db->get();
    	return $query->result();*/
	}
}