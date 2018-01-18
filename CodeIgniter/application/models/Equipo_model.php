<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipo_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function nuevo_equipo($datos){
		$datosBD = array(
			'COD_Equipo' => $datos['COD_Equipo'],
			'DESC_Equipo' => $datos['DESC_Equipo'],
			'ID_Reto'	=> $datos['ID_Reto'],

		);
		$this->db->insert('Equipo', $datosBD);
		redirect('Equipo');		

	}

	public function obtener_equipos(){

		$sql="SELECT e.ID_Equipo,ID_Reto,COD_Equipo,DESC_Equipo,c.DESC_Centro FROM Equipo e, Centro c,Usuario u, Equipo_Usuario eu WHERE e.ID_Equipo=eu.ID_Equipo AND eu.ID_Usuario=u.ID_Usuario AND u.ID_Centro=c.ID_Centro";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_equipos_vacio(){

		$sql="SELECT * FROM Equipo WHERE NOT ID_Equipo IN (SELECT ID_Equipo FROM Equipo_Usuario)";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_equipo($id){
		$where = $this->db->where('ID_Equipo',$id);
		$query = $this->db->get('Equipo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	

	public function actualizar_equipo($id,$datos){
		$datosBD = array(
			'COD_Equipo' => $datos['COD_Equipo'],
			'DESC_Equipo' => $datos['DESC_Equipo'],
		);
		$this->db->where('ID_Equipo',$id);
		$this->db->update('Equipo', $datosBD);
	}	

		public function borrar_Equipo($id){
		$this->db->where('ID_Equipo',$id);
		$this->db->delete('Equipo');
	}	
	




}


?>