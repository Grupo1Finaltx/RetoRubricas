<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario_model extends CI_Model{

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



	public function obtener_usuarios(){
		$sql="SELECT * FROM Usuario u, TUsuario tu, Centro c WHERE u.ID_TUsuario=tu.ID_TUsuario AND u.ID_Centro=c.ID_Centro";
		$query = $this->db->query($sql);
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



	public function obtener_usuario($id){
		$where = $this->db->where('ID_Usuario',$id);
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

	public function usuarios_csv($datos){
		$sql="INSERT INTO Usuario(ID_Centro, ID_TUsuario, User, Password, Nombre, Apellidos, Email, Dni) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')";
		$this->db->query($sql);
			 	//configuracion para gmail
		 $configGmail = array(
		 'protocol' => 'smtp',
		 'smtp_host' => 'ssl://smtp.gmail.com',
		 'smtp_port' => 465,
		 'smtp_user' => 'grupo1finaltx@gmail.com',
		 'smtp_pass' => '123456789Aa',
		 'mailtype' => 'html',
		 'charset' => 'utf-8',
		 'newline' => "\r\n"
		 );    
		 
		 //cargamos la configuración para enviar con gmail
		 $this->email->initialize($configGmail);
		 
		 $this->email->from('grupo1finaltx@gmail.com');
		 $this->email->to('david.izkara@gmail.com');
		 $this->email->subject('Registro DIL');
		 $this->email->message('<h2>Hola '.$datos[4].'</h2><br><p>Has sido registrado en nuestro sistema para evaluar los retos. Tus credenciales de acceso son:</p><p>Usuario: '.$datos[2].'</p><p>Contraseña: 12345abc</p>');
		 $this->email->send();
	}



	public function nuevo_usuario($datos){

		$this->db->insert('Usuario',$datos);
	 	//configuracion para gmail
		 $configGmail = array(
		 'protocol' => 'smtp',
		 'smtp_host' => 'ssl://smtp.gmail.com',
		 'smtp_port' => 465,
		 'smtp_user' => 'grupo1finaltx@gmail.com',
		 'smtp_pass' => '123456789Aa',
		 'mailtype' => 'html',
		 'charset' => 'utf-8',
		 'newline' => "\r\n"
		 );    
		 
		 //cargamos la configuración para enviar con gmail
		 $this->email->initialize($configGmail);
		 
		 $this->email->from('grupo1finaltx@gmail.com');
		 $this->email->to('david.izkara@gmail.com');
		 $this->email->subject('Registro DIL');
		 $this->email->message('<h2>Hola '.$datos['Nombre'].'</h2><br><p>Has sido registrado en nuestro sistema para evaluar los retos. Tus credenciales de acceso son:</p><p>Usuario: '.$datos['User'].'</p><p>Contraseña: 12345abc</p>');
		 $this->email->send();
	}

//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------


	public function borrar_usuario($id){
		$this->db->where('ID_Usuario',$id);
		$this->db->delete('Usuario');
	}	


//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------


	public function actualizar_usuario($id,$datos){

		$this->db->where('ID_Usuario',$id);
		$this->db->update('Usuario', $datos);
	}	



//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------







	public function obtener_usuario_centro($id){

		$sql="SELECT * FROM Usuario u, TUsuario tu, Centro c WHERE u.ID_TUsuario=tu.ID_TUsuario AND u.ID_Centro=c.ID_Centro AND u.ID_Centro=$id";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}




	public function modificar_pass($usu,$pass){
		$sql="UPDATE Usuario SET Password='".$pass."' WHERE ID_Usuario=$usu";
        $this->db->query($sql);
        if ($this->session->userdata('ID_TUsuario')=='3') {
        	 redirect('Index/alumno');
        }

        if ($this->session->userdata('ID_TUsuario')=='2') {
        	 redirect('Index/profesor');
        }

       
	}





}



?>