<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_administrador extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }



	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		$data['titulo'] = 'Bienvenido Administrador';
		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('home/admin',$data);
		$this->load->view('templates/pie',$data);
	}
	
	public function verOperadores()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		$data['titulo'] = 'Bienvenido Administrador';
		

		$data["operadores"] = $this->M_administrador->getOperadores();

		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/verOperadores',$data);
		$this->load->view('templates/pie',$data);
	}
	
	public function verEscribanos()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		$data['titulo'] = 'Bienvenido Administrador';
		

		$data["escribanos"] = $this->M_administrador->getEscribanos();

		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/verEscribanos',$data);
		$this->load->view('templates/pie',$data);
	}


	public function editarOperador($param="")
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
	

		$data['titulo'] = 'Bienvenido Administrador';
		$data["operador"] = $this->M_administrador->getUnOperador($param);
		//var_dump($data["operador"]);
		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/editarOperador',$data);
		$this->load->view('templates/pie',$data);
	}

	public function actualizarOperador($param="")
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		
		$data["operador"] = $this->M_administrador->getUnOperador($param);
		$operadorAct= array(
			//Nombre del campo en la bd -----> valor del campo name en la vista
			'nomyap' => $this->input->post("nomyap"),
			'idUsuario' => $this->input->post("idUsuario") );

		$id=$this->input->post("idUsuario");
		$ctrl=$this->M_administrador->actualizarOperador($operadorAct,$id);

		$data['titulo'] = 'Bienvenido Administrador';
		

		//Si se inserto correcto la vble $ctrl devuelve true y redirije a la pagina con los mismos datos
		//deberia ir a la pagina de veroperador 
		if ($ctrl) {
			redirect('c_administrador/editarOperador/'.$id,'refresh');

		} else {
			//Si no se guardo correctamente entonces queda en la pagina para realizar los cambios
			redirect('','refresh');
		}
	}
	
	
}
