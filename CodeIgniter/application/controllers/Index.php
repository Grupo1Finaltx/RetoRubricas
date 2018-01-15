<?php

//FUNCION DE ESTE CONTROLADOR
/*
	- Cargar la pagina principal.
	- Controlar el login del usuario.

*/


defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');	
		$this->load->model('Index_model');	
	}
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------

	public function index()
	{		
		$this->load->view('head');
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------

	// obtiene del formulario de login los valores
	// llama a Index_model a la funcion comprobar_login
	// si la consulta es erronea(devuelve false)...
	// sino  empieza la sesion, empezamos a comparar el tipo de usuario y creamos su variable de sesion
	// que es un array con todos sus datos.
	public function comprobar_login(){
		$datos = array(
			'User' => $this->input->post('User'),
			'Password' => $this->input->post('Password'),
		);
		$datos['usuariologueado']=$this->Index_model->comprobar_login($datos);
		$datos['datos_usuariologueado']=$this->Index_model->obtener_datos_logueado($datos);

		if ($datos['usuariologueado']==false) {

		}
		else{
			session_name("usuariologueado");
			session_start();

			foreach ($datos['datos_usuariologueado']->result() as $usuario) {
			$usuario_array = array(
				'ID_Usuario' => $usuario->ID_Usuario,
				'User' => $usuario->User,
				'Apellidos' => $usuario->Apellidos,
				'DESC_Centro' => $usuario->DESC_Centro,
				'DESC_TUsuario' => $usuario->DESC_TUsuario,
				'Nombre' => $usuario->Nombre,
				'Email' => $usuario->Email,
				'Dni' => $usuario->Dni,
				
			);
				$_SESSION['usuario']=$usuario_array;


				if ($usuario->DESC_TUsuario =="Administrador") {
					redirect('Index/admin');
				}
				if ($usuario->DESC_TUsuario =="Profesor") {
					redirect('Index/profesor');

				}
				if ($usuario->DESC_TUsuario =="Alumno") {
					redirect('Index/alumno');

				}
				if ($usuario->DESC_TUsuario =="") {

					redirect('Index/admincentro');

				}
			}
		
		}
	}



//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------



	public function alumno(){
		session_name("usuariologueado");
		session_start();
		$this->load->view('head');

		$select['retos_usuario']=$this->Index_model->obtener_retos_alumno($_SESSION['usuario']);
		$select['notas']=$this->Index_model->obtener_notas($_SESSION['usuario']['ID_Usuario']);
		$this->load->view('vistas_logueado/alumno/alumno_header');
		$this->load->view('vistas_logueado/alumno/alumno_vista',$select);
		$this->load->view('vistas_logueado/control_usuario_logueado');
		$this->load->view('footer');
	}



	public function admin(){
		session_name("usuariologueado");
		session_start();
		$this->load->view('head');
		$this->load->view('vistas_logueado/admin/admin_header');
		$this->load->view('vistas_logueado/ruta');
		$this->load->view('vistas_logueado/admin/navegacion_admin');
		$this->load->view('vistas_logueado/admin/admin_vista');
		$this->load->view('vistas_logueado/control_usuario_logueado');
		$this->load->view('footer');
	}

	public function admincentro(){
		session_name("usuariologueado");
		session_start();
		$this->load->view('head');
		$this->load->view('vistas_logueado/admin_centro/admin_centro_vista');
		$this->load->view('vistas_logueado/control_usuario_logueado');
		$this->load->view('footer');
	}


	public function profesor(){
		session_name("usuariologueado");
		session_start();
		$datos['retos']=$this->Index_model->obtener_retos_profesor($_SESSION['usuario']);
		$this->load->view('head');
		$this->load->view('vistas_logueado/profesor/profesor_header');
		$this->load->view('vistas_logueado/profesor/profesor_vista',$datos);
		$this->load->view('vistas_logueado/control_usuario_logueado');
		$this->load->view('footer');
	}
	
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------


	// Destruye la sesion cuando se haga click en cerrar sesion
	public function cerrar_sesion(){
		session_name("usuariologueado");
		session_start();
		session_destroy();
		redirect('Index');

	}


//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------
//----------------------------------------------------------------------------

	public function usuario_json(){
 		$user=$this->input->post('User');
 		$usuario=$this->Index_model->usuario_json($user);
		//echo json_encode($usuario->result());
		foreach ($usuario->result() as $key) {
			echo json_encode($key->User);
		}


	}

}