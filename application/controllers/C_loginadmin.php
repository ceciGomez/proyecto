<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class C_loginadmin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	
	}
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login');
		}
		$data['titulo'] = 'Bienvenido Administrador';
		$this->load->view('templates/cabecera',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('home/admin',$data);
		$this->load->view('templates/pie',$data);
	}
}