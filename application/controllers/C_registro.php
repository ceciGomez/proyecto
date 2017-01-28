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
		 $data['provincias'] = $this->db->get("Provincia")->result();
		$this->load->view('registro/v_registroEscribano',$data);
					
		
	}

	public function registro_esc()
	{		
				 $this->load->helper(array('form', 'url'));

			    $this->form_validation->set_rules('nombre', 'nombre', 'required',array('required' => 'Debes ingresar una Nombre ') );

			    $this->form_validation->set_rules('apellido', 'apellido', 'required',array('required' => 'Debes ingresar un apellido ') );

			    $this->form_validation->set_rules('DNI', 'DNI', 'required|is_unique[UsuarioEscribano.dni]',array('required' => 'Debes ingresar DNI ','is_unique'=>'Ya existe un escribano con el DNI ingresado') );

			    $this->form_validation->set_rules('nroMatricula', 'nroMatricula', 'required|is_unique[UsuarioEscribano.matricula]',array('required' => 'Debes ingresar un Nro de Matricula ','is_unique'=>'Ya existe un escribano con el Nro de Matrícula's) );

			    $this->form_validation->set_rules('correo', 'correo', 'required|is_unique[UsuarioEscribano.email]',array('required' => 'Debes ingresar un correo ','is_unique'=>'Ya existe un escribano con el Correo ingresado') );

			    $this->form_validation->set_rules('telefono', 'telefono', 'required',array('required' => 'Debes ingresar numero de teleéfono ') );

			    $this->form_validation->set_rules('provincia', 'provincia', 'required',array('required' => 'Debes seleccionar una Provincia ') );

			    $this->form_validation->set_rules('localidad', 'localidad', 'required',array('required' => 'Debes seleccionar una Localidad ') );

			    $this->form_validation->set_rules('departamento', 'departamento', 'required',array('required' => 'Debes seleccionar un Departamento ') );

			    $this->form_validation->set_rules('direccion', 'direccion', 'required',array('required' => 'Debes ingresar una dirección ') );
			   
				 $this->form_validation->set_rules('usuario', 'usuario',  'required|is_unique[UsuarioEscribano.usuario]',array('required' => 'Debes ingresar un nombre de Usuario ','is_unique'=>'Ya existe un escribano con el nombre de usuario ingresado') );

			    $this->form_validation->set_rules('contraseña', 'contraseña', 'required',array('required' => 'Debes ingresar una contraseña ') );

				$this->form_validation->set_rules('repecontraseña', 'repecontraseña','required|matches[contraseña]',array('required' => 'Debes ingresar una contraseña ', 'matches'=>'La contraseña no coincide') );
		
		
			if($this->form_validation->run() == FALSE)
			{	
				$this->index();
			}else{
				
				$datos_usuarios= array (
					'nomyap' => $this->input->post('nombre').$this->input->post('apellido'),
					'matricula' => $this->input->post('nroMatricula'),
					'dni' => $this->input->post('DNI'),
					'email' => $this->input->post('correo'),
					//$departamento = $this->input->post('departamento');
					'idLocalidad' => $this->input->post('Localidad'),
					'telefono' => $this->input->post('telefono'),
					'usuario' => $this->input->post('usuario'),
					'contraseña' => sha1($this->input->post('contraseña')), 
					'estadoAprobacion'=>'p',
					'motivoRechazo'=>'',
					//'repe_contraseña' => sha1($this->input->post('repecontraseña')),
				);
				print_r($datos_usuarios);

				$this->db->insert("usuarioescribano", $datos_usuarios);
			}
			/*
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
	   	
	   	$departamentos=$this->db->get_where('Departamento', array('idProvincia'=>$id_prov))->result();
	
		
		foreach ($departamentos as $d ) {
				
				echo"<option value='$d->idDepartamento'>$d->nombre</option>";
			
		}
	}

		public function localidad()
	{
		$id_dep=$_POST["midepartamento"];
		
		//$departamentos=$this->db->get("departamento")->result();
	   	
	   	$localidades=$this->db->get_where('Localidad', array('idDepartamento'=>$id_dep))->result();
	
		//en este caso quiero que en el value aparezca el id que esta en la tabla , porque este valor me va a servir para insertar en la tabla usuarioescribano
		foreach ($localidades as $l ) {
				
				echo"<option value='$l->idLocalidad'>$l->nombre</option>";
			
		}
	}


	}
	