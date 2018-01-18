<?php 
class Pdfs_model extends CI_Model
{
 function __construct()
 {
 parent::__construct();
 }

public function descarga_notas(){
  $sql="SELECT * FROM Competencia c,Notas n WHERE ID_Usuario='".$this->session->userdata('ID_Usuario')."' AND n.ID_Competencia=c.ID_Competencia";
  $query = $this->db->query($sql);
  if ($query->num_rows() > 0){
      return $query;
  }else{
      return false;
  }
}



public function descarga_notas_profe($usu){
  $sql="SELECT * FROM Competencia c,Notas n WHERE ID_Evaluador='".$this->session->userdata('ID_Usuario')."' AND n.ID_Competencia=c.ID_Competencia AND ID_Usuario=$usu";
  $query = $this->db->query($sql);
  if ($query->num_rows() > 0){
      return $query;
  }else{
      return false;
  }
}
   
}
/*pdf_model.php
 * el modelo
 */