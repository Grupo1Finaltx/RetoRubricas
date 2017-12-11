<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_curso($datos){
		$datosBD = array(
			'COD_Curso' => $datos['COD_Curso'],
		);
		$this->db->insert('Curso', $datosBD);
	}

	public function obtener_cursos(){
		$query = $this->db->get('Curso');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_curso($id){
		$where = $this->db->where('ID_Curso',$id);
		$query = $this->db->get('Curso');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_curso($id,$datos){
		$datosBD = array(
			'COD_Curso' => $datos['COD_Curso'],
		);
		$this->db->where('ID_Curso',$id);
		$this->db->update('Curso', $datosBD);
	}	

		public function borrar_curso($id){
		$this->db->where('ID_Curso',$id);
		$this->db->delete('Curso');
	}	
}


?>