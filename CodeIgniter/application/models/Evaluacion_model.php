<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluacion_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function obtener_reto($idequipo){
		$sql="SELECT * FROM Equipo WHERE ID_Equipo=$idequipo";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}


	public function obtener_equipos_reto($idreto){
		$this->db->where('ID_Reto',$idreto);
		$query = $this->db->get('Equipo');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}		


	public function obtener_alumnos_equipo($idequipo){
		$sql="SELECT * FROM Usuario u, Equipo_Usuario eu WHERE eu.ID_Usuario=u.ID_Usuario AND eu.ID_Equipo=$idequipo";

		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}	


	public function obtener_alumnos_evaluar($idreto,$idusuario){
		$sql="SELECT * FROM Equipo_Usuario eu, Equipo e WHERE eu.ID_Equipo=e.ID_Equipo AND eu.ID_Usuario=$idusuario AND e.ID_Reto=$idreto ";
		$query=$this->db->query($sql);
		foreach ($query->result() as $key) {
			$idequipo=$key->ID_Equipo;
		}
		
		$sql="SELECT * FROM Usuario u, Equipo_Usuario um, Equipo e WHERE um.ID_Usuario=u.ID_Usuario AND e.ID_Equipo=um.ID_Equipo AND um.ID_Equipo=$idequipo";
			$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}
 	


	public function datos_para_evaluar($idtusuario){
		$sql="SELECT * FROM Medicion m, Medicion_GupoCompetencia_Competencia mgc, Competencia c WHERE m.ID_TUsuario=$idtusuario AND mgc.ID_Medicion=m.ID_Medicion AND mgc.ID_Competencia=c.ID_Competencia";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}


	public function poner_nota($idreto,$idusuario,$mediciones,$evaluador){


		$sql="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '1', '$idusuario', '$evaluador', '1', '$mediciones[0]')";
		
		$sql1="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '1', '$idusuario', '$evaluador', '2', '$mediciones[1]')";
		$sql2="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '1', '$idusuario', '$evaluador', '3', '$mediciones[2]')";
		$sql3="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '1', '$idusuario', '$evaluador', '4', '$mediciones[3]')";
		$sql4="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '1', '$idusuario', '$evaluador', '9', '$mediciones[4]')";

		$this->db->query($sql);
		$query = $this->db->query($sql1);
		$query = $this->db->query($sql2);
		$query = $this->db->query($sql3);
		$query = $this->db->query($sql4);
		
		return "Valoracion realizada";

	}


	public function poner_nota_profe($idreto,$idusuario,$mediciones,$evaluador){


		$sql="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '3', '$idusuario', '$evaluador', '1', '$mediciones[0]')";
		
		$sql1="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '3', '$idusuario', '$evaluador', '2', '$mediciones[1]')";
		$sql2="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '3', '$idusuario', '$evaluador', '3', '$mediciones[2]')";
		$sql3="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '3', '$idusuario', '$evaluador', '4', '$mediciones[3]')";
		$sql4="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '3', '$idusuario', '$evaluador', '5', '$mediciones[4]')";
		$sql5="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '3', '$idusuario', '$evaluador', '6', '$mediciones[5]')";
		$sql6="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '3', '$idusuario', '$evaluador', '7', '$mediciones[6]')";
		$sql7="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '3', '$idusuario', '$evaluador', '8', '$mediciones[7]')";
		$sql8="INSERT INTO `Notas` (`ID_Nota`, `ID_Reto`, `ID_Medicion`, `ID_Usuario`, `ID_Evaluador`, `ID_Competencia`, `Nota`) VALUES (NULL, '$idreto', '3', '$idusuario', '$evaluador', '9', '$mediciones[8]')";


		$this->db->query($sql);
		$query = $this->db->query($sql1);
		$query = $this->db->query($sql2);
		$query = $this->db->query($sql3);
		$query = $this->db->query($sql4);
		$query = $this->db->query($sql5);
		$query = $this->db->query($sql6);
		$query = $this->db->query($sql7);
		$query = $this->db->query($sql8);
		
		return "Valoracion realizada";

	}



	public function obtener_retos_profe(){
		$sql="SELECT DISTINCT u.ID_Usuario, Nombre, Apellidos FROM Notas n,Usuario u WHERE u.ID_Usuario=n.ID_Usuario AND n.ID_Evaluador=".$this->session->userdata('ID_Usuario');
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}


}
 

?>