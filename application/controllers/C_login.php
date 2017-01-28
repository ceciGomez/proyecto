<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

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
				$this->load->view('login/v_login',$data);
				break;
			case 'administrador':
				redirect(base_url().'index.php/c_loginadmin');
				break;
			case 'escribano':
				redirect(base_url().'index.php/c_loginescri');
				break;	
			case 'operador':
				redirect(base_url().'index.php/c_loginop');
				break;
			default:		
				$data['titulo'] = 'Login';
				$this->load->view('login/v_login',$data);
				break;		
		}
	}

	public function new_user()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]');
 
            //lanzamos mensajes de error si es que los hay
            
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$username = $this->input->post('username');
				$password = sha1($this->input->post('password')); //aca se encripta la clave
				$check_user = $this->m_login->login_user($username,$password);
				if($check_user == TRUE)
				{
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'id_usuario' 	=> 		$check_user->id,
	                'perfil'		=>		$check_user->perfil,
	                'username' 		=> 		$check_user->username
            		);		
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		}else{
			redirect(base_url().'index.php/c_login');
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
