<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_registro extends CI_Controller {

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
		 $data['provincias'] = $this->db->get("provincia")->result();
		$this->load->view('registro/v_registroEscribano',$data);
					
		
	}

	public function registro_esc()
	{
		
			/*if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				*/
				$datos_usuarios= array (
					'nomyap' => $this->input->post('nombre').$this->input->post('apellido'),
					'matricula' => $this->input->post('nro_matricula'),
					'dni' => $this->input->post('DNI'),
					'email' => $this->input->post('correo'),
					//$departamento = $this->input->post('departamento');
					'idLocalidad' => $this->input->post('Localidad'),
					'telefono' => $this->input->post('telefono'),
					'usuario' => $this->input->post('usuario'),
					'contraseña' => sha1($this->input->post('contraseña')), 
					//'repe_contraseña' => sha1($this->input->post('repe_contraseña')),
				);
				print_r($datos_usuarios);

				$this->db->insert("usuarioescribano", $datos_usuarios);
			/*}
				
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
		¨*/
		
		}


		public function departamento()
	{
		$id_prov=$_POST["miprovincia"];
		
		//$departamentos=$this->db->get("departamento")->result();
	   	
	   	$departamentos=$this->db->get_where('departamento', array('idProvincia'=>$id_prov))->result();
	
		$id_dep=0;
		foreach ($departamentos as $d ) {
				$id_dep+=1;
				echo"<option value='$id_dep'>$d->nombre</option>";
			
		}
	}

		public function localidad()
	{
		$id_dep=$_POST["midepartamento"];
		
		//$departamentos=$this->db->get("departamento")->result();
	   	
	   	$localidades=$this->db->get_where('localidad', array('idDepartamento'=>$id_dep))->result();
	
		//en este caso quiero que en el value aparezca el id que esta en la tabla , porque este valor me va a servir para insertar en la tabla usuarioescribano
		foreach ($localidades as $l ) {
				
				echo"<option value='$l->idLocalidad'>$l->nombre</option>";
			
		}
	}



	}
	