<?php

class Ventas_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	

	function get_mas_vendidos()
	{
		$this->db->select('*');
		$this->db->from('libro AS l');
		$this->db->join('categoria', 'l.categoria_id = categoria.categoria_id');
		$this->db->join('genero', 'l.genero_id  = genero.genero_id ');
		$this->db->join('orden_detalle AS d', 'd.libro_id=l.libro_id');
		$this->db->join('orden_pedido AS p', 'p.orden_id=d.orden_id');
		$this->db->where('l.categoria_id =', 1);
		$this->db->group_by('d.libro_id');
		$this->db->order_by('SUM(d.detalle_cantidad) DESC');
		$this->db->limit(4);
		
		$query = $this->db->get();
		return $query->result(); 
	}

	function get_mas_vendidos_comics()
	{
		$this->db->select('*');
		$this->db->from('libro AS l');
		$this->db->join('categoria', 'l.categoria_id = categoria.categoria_id');
		$this->db->join('genero', 'l.genero_id  = genero.genero_id ');
		$this->db->join('orden_detalle AS d', 'd.libro_id=l.libro_id');
		$this->db->join('orden_pedido AS p', 'p.orden_id=d.orden_id');
		$this->db->where('l.categoria_id =', 2);
		$this->db->group_by('d.libro_id');
		$this->db->order_by('SUM(d.detalle_cantidad) DESC');
		$this->db->limit(4);
		
		$query = $this->db->get();
		return $query->result(); 
	}
	
}

