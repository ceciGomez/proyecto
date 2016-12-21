<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class C_loginop extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	
	}
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login');
		}
		$data['titulo'] = 'Bienvenido Escribano';
		$this->load->view('templates/cabecera',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('home/operador',$data);
		$this->load->view('templates/pie',$data);
	}
}