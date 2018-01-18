<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario_modulo_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}


//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------



	public function obtener_usuarios_modulo(){
		$sql="SELECT * FROM Usuario u, Modulo m, Usuario_Modulo um WHERE u.ID_Usuario=um.ID_Usuario AND m.ID_Modulo=um.ID_Modulo";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_modulos_centro($id){
		$sql="SELECT DISTINCT m.ID_Modulo,COD_Ciclo, DESC_Centro,DESC_Modulo FROM Modulo m, Ciclo ci, Centro ce, Usuario u WHERE m.ID_Ciclo=ci.ID_Ciclo AND ci.ID_Centro=ce.ID_Centro AND ce.ID_Centro=u.ID_Centro AND u.ID_Usuario=$id";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}


	public function nuevo_usuario_modulo($datos){
		$this->db->insert('Usuario_Modulo',$datos);
	}


	public function borrar_usuario_modulo($id){
		$this->db->where('ID_Usuario_Modulo',$id);
		$this->db->delete('Usuario_Modulo');
	}

}



?>