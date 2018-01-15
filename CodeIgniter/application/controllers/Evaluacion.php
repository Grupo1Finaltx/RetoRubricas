<?php

//FUNCION DE ESTE CONTROLADOR
/*
	- Cargar la pagina principal.
	- Controlar el login del usuario.

*/


defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluacion extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');	
		$this->load->library('email');
		$this->load->helper('email');
		$this->load->model('Evaluacion_model');	
	}
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------

	public function index()
	{	
			session_name("usuariologueado");
			session_start();
		$idreto= $this->input->post('ID_Reto');
		$datos['equipos']=$this->Evaluacion_model->obtener_equipos_reto($idreto);
		$this->load->view('head');
		$this->load->view('vistas_logueado/profesor/profesor_header.php');
		$this->load->view('vistas_logueado/profesor/profesor_evaluacion.php',$datos);
		$this->load->view('vistas_logueado/control_usuario_logueado.php',$datos);
		$this->load->view('footer');
	}
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------

	public function alumnos_grupo_json(){

		$idgrupo=$this->input->post('ID_Equipo');
		$datos=$this->Evaluacion_model->obtener_alumnos_equipo($idgrupo);

 		echo json_encode($datos->result());
	}

	/*public function eval_alumno(){
		$this->load->view('head');
		$this->load->view('vistas_logueado/profesor/profesor_header.php');
		$this->load->view('vistas_logueado/profesor/profesor_evaluando.php');
		$this->load->view('footer');
	}*/

//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------


	
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------

	public function evaluar(){
		session_name("usuariologueado");
		session_start();
		$idreto=$this->input->post('ID_Reto');
		$idusuario=$this->uri->segment(3);

		$datos['alumnos']=$this->Evaluacion_model->obtener_alumnos_evaluar($idreto,$idusuario);
		$this->load->view('head');
		$this->load->view('vistas_logueado/alumno/alumno_header');
		$this->load->view('vistas_logueado/alumno/evaluando',$datos);
		$this->load->view('vistas_logueado/control_usuario_logueado');
		$this->load->view('footer');
	}


//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------

	public function datos_para_evaluar(){
		$idtusuario=$this->input->post('ID_TUsuario');
		$competencias=$this->Evaluacion_model->datos_para_evaluar($idtusuario);

 			echo json_encode($competencias->result());
	}


	public function obtener_notas(){
				$idreto=$this->input->post('ID_Reto');
				$idusuario=$this->input->post('ID_Usuario');
				$mediciones=$this->input->post('Nota');
				$evaluador=$this->input->post('ID_Evaluador');
				$vuelta=$this->Evaluacion_model->poner_nota($idreto,$idusuario,$mediciones,$evaluador);
 			echo json_encode($vuelta);
	}





public function email(){
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
 $this->email->subject('Desde codeigniter');
 $this->email->message('<h2>Email enviado con codeigniter haciendo uso del smtp de gmail comparte y dale a laik</h2>');
 $this->email->send();
 return "correo enviado";
}

}