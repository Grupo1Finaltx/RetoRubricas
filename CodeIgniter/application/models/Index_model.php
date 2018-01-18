<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_model extends CI_Model{

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


	public function comprobar_login($datos){

		$sql = "SELECT * FROM Usuario WHERE User = ? AND Password = ? ";
		$query=$this->db->query($sql, array($datos['User'],$datos['Password']));


		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	public function obtener_datos_logueado($datos){
		$sql="SELECT ID_Usuario, User, Password, Nombre, Apellidos, Email, Dni, DESC_Centro,t.ID_TUsuario, DESC_TUsuario FROM Usuario u,Centro c, TUsuario t WHERE u.ID_Centro=c.ID_Centro AND u.ID_TUsuario=t.ID_TUsuario AND User='".$datos['User']."'";
		$query=$this->db->query($sql);
				if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}



//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------

	public function obtener_retos_alumno(){
		$sql = "SELECT DISTINCT r.ID_Reto,COD_Reto, DESC_Reto from Usuario u, Reto r, Equipo e, Equipo_Usuario eu WHERE r.ID_Reto=e.ID_Reto AND e.ID_Equipo=eu.ID_Equipo AND eu.ID_Usuario=u.ID_Usuario AND u.User= '".$this->session->userdata('User')."'";
		$query=$this->db->query($sql);

		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}



	public function usuario_json($user){
		$this->db->where('User',$user);
		$query = $this->db->get('Usuario');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------

	public function obtener_retos_profesor(){
		$sql = "SELECT DISTINCT * FROM Reto_Modulo rm,Reto r,  Modulo m, Ciclo c WHERE ID_UAdmin='".$this->session->userdata('ID_Usuario')."' AND r.ID_Reto=rm.ID_Reto AND rm.ID_Modulo=m.ID_Modulo AND c.ID_Ciclo=m.ID_Ciclo";
		$query=$this->db->query($sql);

		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}


//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------

	public function obtener_notas(){
		$this->db->where('ID_Usuario',$this->session->userdata('ID_Usuario'));
		$query = $this->db->get('Notas');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}


	public function comprobar_correo($correo){
		$sql="SELECT * FROM Usuario WHERE Email=$correo";
		$query = $this->db->get('Notas');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return "vacio";
		}
	}



}
?>