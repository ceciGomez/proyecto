<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login_operador extends CI_Controller {

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
				$this->load->view('login/v_login_operador',$data);
				break;
			case 'operador':
				redirect(base_url().'index.php/c_operador');
				break;
			default:		
				$data['titulo'] = 'Login';
				$this->load->view('login/v_login_operador',$data);
				break;		
		}
	}

	public function new_user()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
             $this->form_validation->set_rules('usuario', 'nombre de usuario', 'required|min_length[2]|max_length[150]',array('required' => 'Debes ingresar un nombre de Usuario ','min_length'=>'El usuario ingresado debe ser de al menos 2 digitos','max_length'=> 'El usuario ingresado debe ser de menos de 120 digitos'));
            $this->form_validation->set_rules('contraseña', 'contraseña', 'required|min_length[5]|max_length[150]',array('required' => 'Debes ingresar una Contraseña ','min_length'=>'La contraseña ingresada debe ser de al menos 2 digitos','max_length'=> 'La contraseña ingresada debe ser de menos de 120 digitos'));
 
 
            //lanzamos mensajes de error si es que los hay
            
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$usuario = $this->input->post('usuario');
				$contraseña = $this->input->post('contraseña'); //aca se encripta la clave
				$check_user = $this->m_login->login_operador($usuario,$contraseña);
				if($check_user == TRUE)
				{
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'perfil' 	=> 		'operador',
	                'id_usuario' 	=> 		$check_user->idUsuario,
	                'username' 		=> 		$check_user->usuario,
	                 'nomyap' 	=> 	$check_user->nomyap,
					'fechaReg' 	=> 	$check_user->fechaReg
            		);		
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		}else{
			redirect(base_url().'index.php/c_login_operador');
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
