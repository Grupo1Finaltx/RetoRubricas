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
	}

	public function index()
	{		
		$this->load->view('index');
	}


}