<?php
class Libro_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	public function guardar_libro($data){
		$this->db->insert('libro', $data);
	}

	public function select_categoria(){
		$query = $this->db->get('genero');
		return $query->result();
	}

	public function select_categoria2(){
		$query = $this->db->get('categoria');
		return $query->result();
	}

	public function select_libros()
	{
		$this->db->select('*');
		$this->db->from('libro');
		$this->db->join('categoria', 'libro.categoria_id = categoria.categoria_id');
		$this->db->join('genero', 'libro.genero_id = genero.genero_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function select_libro_genero($categoria)
	{
		$this->db->select('*');
		$this->db->from('libro');
		$this->db->where('stock_libro >', 0);
		$this->db->where('estado_libro =', 1);
		$this->db->where('libro.categoria_id',$categoria);
		$this->db->join('categoria', 'libro.categoria_id = categoria.categoria_id');
		$this->db->join('genero', 'libro.genero_id  = genero.genero_id ');
		
		$query = $this->db->get();
		return $query->result();
	}
	public function select_libros_id($id)
	{
		$this->db->select('*');
		$this->db->from('libro');
		$this->db->where('libro_id', $id);
		//esto agregué para probar
		$this->db->join('categoria', 'libro.categoria_id = categoria.categoria_id');
		$this->db->join('genero', 'libro.genero_id  = genero.genero_id ');
		$query = $this->db->get();
		return $query->result();
	}

	public function select_descripcion($id)
	{
		$this->db->select('descripcion');
		$this->db->from('libro');
		$this->db->where('libro_id', $id);
		//esto agregué para probar
		$this->db->join('categoria', 'libro.categoria_id = categoria.categoria_id');
		$this->db->join('genero', 'libro.genero_id  = genero.genero_id ');
		$query = $this->db->get();
		return $query->result();
	}
	public function actualizar_libro($data, $id)
	{
		$this->db->where('libro_id', $id);
		$this->db->update('libro', $data);
	}

    function set_productos($id, $data){
        $this->db->where('libro_id', $id);
        
        $query = $this->db->update('libro', $data);

        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function modify_stock($id, $data)
    {
        $this->db->where('libro_id',$id);
        $query = $this->db->update('libro', $data);
        if($query){
            return true;
        }else{
            return false;
        }
    }

	public function eliminar_libro($data, $id)
	{
		$this->db->where('libro_id', $id);
		$this->db->update('libro', $data);
	}

	public function paginas_mostrar_novela($limit, $row){
		$this->db->select('*');
		$this->db->from('libro');
		$this->db->where('categoria_descripcion =', 'novela');
		$this->db->limit($limit,$row);
		$this->db->join('categoria', 'libro.categoria_id = categoria.categoria_id');
		$this->db->join('genero', 'libro.genero_id  = genero.genero_id ');
		$query = $this->db->get();
		return $query->result();
	}
}