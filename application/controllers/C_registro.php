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
	
	public function index($exito=FALSE, $hizo_post=FALSE)
	{	
		//busco todas las provjncias
		$data['exito']= $exito; 
		$data['hizo_post']=$hizo_post;
	    $data['provincias'] = $this->db->get("provincia")->result();
		 // en caso de que venga de una registracion que no se pudo hacer por algun campo
		if($this->input->post() && !$exito){
			//seteo los demas input segun lo que ingreso anteriormente
			$data['nombre'] = $this->input->post('nombre');
			$data['apellido']=$this->input->post('apellido');
			$data['nroMatricula'] = $this->input->post('nroMatricula');
			$data['dni'] = $this->input->post('DNI');
			$data['correo'] = $this->input->post('correo');
			$data['telefono'] =(integer)$this->input->post('telefono');
			$data['usuario'] = $this->input->post('usuario');
			$data['direccion'] = $this->input->post('direccion');

		

		}else{
			$data['nombre']='';
			$data['apellido']='';
			$data['dni']='';
			$data{'nroMatricula'}='';
			$data{'correo'}='';
			$data{'telefono'}='';
			$data{'direccion'}='';
			$data{'usuario'}='';
			$data{'contraseña'}='';
			$data{'repeContraseña'}='';


		}
		
		 
		$this->load->view('registro/v_registroEscribano',$data);
					
		
	}

	public function registro_esc()
	{			$hizo_post=TRUE;	

				 $this->load->helper(array('form', 'url'));

			    $this->form_validation->set_rules('nombre', 'nombre', 'required',array('required' => 'Debes ingresar una Nombre ') );

			    $this->form_validation->set_rules('apellido', 'apellido', 'required',array('required' => 'Debes ingresar un apellido ') );

			    $this->form_validation->set_rules('DNI', 'DNI', 'required|is_unique[usuarioescribano.dni]',array('required' => 'Debes ingresar DNI ','is_unique'=>'Ya existe un escribano con el DNI ingresado') );

			    $this->form_validation->set_rules('nroMatricula', 'nroMatricula', 'required|is_unique[usuarioescribano.matricula]',array('required' => 'Debes ingresar un Nro de Matricula ','is_unique'=>'Ya existe un escribano con el Nro de Matrícula') );

			    $this->form_validation->set_rules('correo', 'correo', 'required|is_unique[usuarioescribano.email]',array('required' => 'Debes ingresar un correo ','is_unique'=>'Ya existe un escribano con el Correo ingresado') );

			    $this->form_validation->set_rules('telefono', 'telefono', 'required',array('required' => 'Debes ingresar numero de teleéfono ') );

			    $this->form_validation->set_rules('provincia', 'provincia', 'required',array('required' => 'Debes seleccionar una Provincia ') );

			    $this->form_validation->set_rules('localidad', 'localidad', 'required',array('required' => 'Debes seleccionar una Localidad ') );

			    $this->form_validation->set_rules('direccion', 'direccion', 'required',array('required' => 'Debes ingresar una dirección ') );
			   

				 $this->form_validation->set_rules('usuario', 'usuario',  'required|is_unique[usuarioescribano.usuario]|min_length[6]',array('required' => 'Debes ingresar un nombre de Usuario ','is_unique'=>'Ya existe un escribano con el nombre de usuario ingresado','min_length'=> 'El nombre de usuario debe ser de al menos 6 digitos') );

			    $this->form_validation->set_rules('contraseña', 'contraseña', 'required|min_length[6]',array('required' => 'Debes ingresar una contraseña ','min_length'=> 'La contraseña debe ser de al menos 6 dígitos ') );
			      $this->form_validation->set_rules('repeContraseña', 'repeContraseña', 'required|matches[contraseña]',array('required' => 'Debes volver a ingresar la contraseña ','matches'=> 'Las dos contraseñas no coinciden ') );
		
		
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->index(FALSE,TRUE);
			}else{
				$datetime_variable = new DateTime();
				$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
				$datos_usuarios= array (
					'nomyap' => $this->input->post('nombre').' '.$this->input->post('apellido'),
					'matricula' => $this->input->post('nroMatricula'),
					'dni' => $this->input->post('DNI'),
					'email' => $this->input->post('correo'),
					//$departamento = $this->input->post('departamento');
					'idLocalidad' => $this->input->post('localidad'),
					'telefono' =>(integer) $this->input->post('telefono'),
					'usuario' => $this->input->post('usuario'),
					'contraseña' => sha1($this->input->post('contraseña')), 
					'direccion' =>$this->input->post('direccion'),
					'estadoAprobacion'=>'P',
					'motivoRechazo'=>'',
					'fechaReg'=>$datetime_formatted,
					'baja' => '0' );	
				
				
				$this->db->insert("usuarioescribano", $datos_usuarios);
				
				$data['provincias'] = $this->db->get("provincia")->result();
				$this->index(TRUE,TRUE);
			
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
		//Cargo de nuevo la vista del formulario, pero esta vez con el mensaje de exito
		
		
		}


		public function departamento()
	{
		$id_prov=$_POST["miprovincia"];
		
		//$departamentos=$this->db->get("departamento")->result();
	   	
	   	$departamentos=$this->db->get_where('departamento', array('idProvincia'=>$id_prov))->result();
	
		
		foreach ($departamentos as $d ) {
				
				echo"<option value='$d->idDepartamento'>$d->nombre</option>";
			
		}
	}

		public function mostrarLocalidad()
	{
		$id_prov=$_POST["miprovincia"];
	
		/*$this->db->select('SELECT L.idLocalidad, L.nombre FROM Departamento D JOIN Localidad L ON D.idDepartamento= L.idLocalidad WHERE D.idProvincia=$id_prov');
		$localidades = $this->db->get()->result();  
		//$departamentos=$this->db->get("departamento")->result();*/
		$localidades=array();
	   	$departamentos=$this->db->get_where('departamento', array('idProvincia'=>$id_prov))->result();
	   	foreach ($departamentos as $d ) {
	   		$loc=$this->db->get_where('localidad', array('idDepartamento'=>$d->idDepartamento))->result();
	   		$resg=$localidades;
	   		$localidades=array_merge($resg,$loc);
	   		
	   	}
	   	
		//en este caso quiero que en el value aparezca el id que esta en la tabla , porque este valor me va a servir para insertar en la tabla usuarioescribano
		foreach ($localidades as $l ) {
				
				echo"<option value='$l->idLocalidad'>$l->nombre</option>";
			
		}
	}


	}
	