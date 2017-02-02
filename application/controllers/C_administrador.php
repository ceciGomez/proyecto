<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_administrador extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();
    }
	
	
	public function verOperadores()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login');
		}
		$data['titulo'] = 'Bienvenido Administrador';
		$this->load->model('M_administrador');
		

		$data["operadores"] = $this->M_administrador->getOperadores();

		$this->load->view('templates/cabecera',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/verOperadores',$data);
		$this->load->view('templates/pie',$data);
	}
	
	public function verEscribanos()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login');
		}
		$data['titulo'] = 'Bienvenido Administrador';
		$this->load->model('M_administrador');
		

		$data["escribanos"] = $this->M_administrador->getEscribanos();

		$this->load->view('templates/cabecera',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/verEscribanos',$data);
		$this->load->view('templates/pie',$data);
	}
}
