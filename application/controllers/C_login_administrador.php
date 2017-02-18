<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login_administrador extends CI_Controller {

	 //*/
	// public function login()
	// {
	// 	//$this->load->helper('url');
	// 	$data  = array();
	// 	$data['error'] = $this->session->flashdata('error');
	// 	$this->load->view('login/v_login', $data);
		
	// }
	public function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{	
		switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$data['titulo'] = 'Login';
				$this->load->view('login/v_login_administrador',$data);
				break;
			case 'administrador':
				redirect(base_url().'index.php/c_administrador');
				break;
			default:		
				$data['titulo'] = 'Login';
				$this->load->view('login/v_login_administrador',$data);
				break;		
		}
	}

	public function new_user()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
            $this->form_validation->set_rules('usuario', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]');
            $this->form_validation->set_rules('contraseña', 'contraseña', 'required|trim|min_length[5]|max_length[150]');
 
            //lanzamos mensajes de error si es que los hay
            
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$usuario = $this->input->post('usuario');
				$contraseña = $this->input->post('contraseña'); //aca se encripta la clave
				$check_user = $this->m_login->login_administrador($usuario,$contraseña);
				if($check_user == TRUE)
				{
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'perfil' 	=> 		'administrador',
	                'id_usuario' 	=> 		$check_user->id,
	                'username' 		=> 		$check_user->usuario
            		);		
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		}else{
			redirect(base_url().'index.php/c_login_administrador');
		}
	}
	
	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}

	
	public function logout_ci()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}
