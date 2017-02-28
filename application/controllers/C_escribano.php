<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_escribano extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_escribano');
    }
	
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data['titulo'] = 'Bienvenido Escribano';		
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('home/escri',$data);
		$this->load->view('templates/pie',$data);
		//$this->CrearMinuta();
	}	
		
	public function CrearMinuta($exito=FALSE, $hizo_post=FALSE)
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}

        
		$data['departamentos'] = $this->M_escribano->getDepartamentos();
		$data['exito']= $exito; 
		$data['hizo_post']=$hizo_post;
		$data['titulo'] = 'Bienvenido Escribano';
		$data["provincias"] = $this->M_direccion->getProvincias();

		if($this->input->post() && !$exito){
			//seteo los demas input segun lo que ingreso anteriormente
			$data['circunscripcion'] = $this->input->post('circunscripcion');
			$data['seccion']=$this->input->post('seccion');
			$data['chacra'] = $this->input->post('chacra');
			$data['quinta'] = $this->input->post('quinta');
			$data['fraccion'] = $this->input->post('fraccion');
			$data['manzana'] =$this->input->post('manzana');
			$data['parcela'] = $this->input->post('parcela');
			$data['planoAprobado'] = $this->input->post('planoAprobado');			
			$data['fechaPlanoAprobado'] = $this->input->post('fechaPlanoAprobado');
			$data['tipoPropiedad'] = $this->input->post('tipoPropiedad');
			$data['tomo'] = $this->input->post('tomo');
			$data['folio'] = $this->input->post('folio');
			$data['finca'] = $this->input->post('finca');
			$data['año'] = $this->input->post('año');
			$data['localidad'] = $this->input->post('localidad');
			echo $data['localidad'] ;
			$data['descripcion'] = $this->input->post('descripcion');
			$data['nroMatriculaRPI'] = $this->input->post('nroMatriculaRPI');
			$data['fechaMatriculaRPI'] = $this->input->post('fechaMatriculaRPI');
		

		}else{
			$data['circunscripcion']='';
			$data['seccion']='';
			$data['chacra']='';
			$data{'quinta'}='';
			$data{'fraccion'}='';
			$data{'manzana'}='';
			$data{'parcela'}='';
			$data{'planoAprobado'}='';
			$data{'fechaPlanoAprobado'}='';
			$data{'tipoPropiedad'}='';
			$data{'tomo'}='';
			$data{'folio'}='';
			$data{'finca'}='';
			$data{'año'}='';
			$data{'localidad'}='';
			$data{'descripcion'}='';
			$data{'nroMatriculaRPI'}='';
			$data{'fechaMatriculaRPI'}='';

		}


		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/parcela',$data);
		$this->load->view('templates/pie',$data);
	}

	public function registro_parcela()	{

				$hizo_post=TRUE;	

				 $this->load->helper(array('form', 'url'));

				 $localidad = $this->input->post('localidad');

			    $this->form_validation->set_rules('circunscripcion', 'circunscripcion', 'required',array('required' => 'Debes ingresar una circunscripcion ') );

			    $this->form_validation->set_rules('seccion', 'seccion', 'required',array('required' => 'Debes ingresar una sección ') );

			    $this->form_validation->set_rules('chacra', 'chacra', 'required',array('required' => 'Debes ingresar una chacra ','is_unique'=>'Ya existe un escribano con el DNI ingresado') );

			    $this->form_validation->set_rules('quinta', 'quinta', 'required',array('required' => 'Debes ingresar una quinta ','is_unique'=>'Ya existe un escribano con el Nro de Matrícula') );

			    $this->form_validation->set_rules('fraccion', 'fraccion', 'required',array('required' => 'Debes ingresar una fracción ','is_unique'=>'Ya existe un escribano con el Correo ingresado') );

			    $this->form_validation->set_rules('manzana', 'manzana', 'required',array('required' => 'Debes ingresar una manzana ') );

			    $this->form_validation->set_rules('parcela', 'parcela', 'required',array('required' => 'Debes seleccionar una parcela ') );

			    $this->form_validation->set_rules('superficie', 'superficie', 'required',array('required' => 'Debes seleccionar una superficie') );

			    $this->form_validation->set_rules('partida', 'partida', 'required',array('required' => 'Debes ingresar una partida ') );
			   
				 $this->form_validation->set_rules('planoAprobado', 'planoAprobado',  'required',array('required' => 'Debes ingresar un plano aprobado','is_unique'=>'Ya existe un escribano con el nombre de usuario ingresado') );

			    $this->form_validation->set_rules('fechaPlanoAprobado', 'fechaPlanoAprobado', 'required',array('required' => 'Debes ingresar una fecha  ') );

				$this->form_validation->set_rules('tipoPropiedad', 'tipoPropiedad','required|callback_check_propiedad');

				$this->form_validation->set_message('check_propiedad', 'Debes seleccionar una Propiedad');

				$this->form_validation->set_rules('tomo', 'tomo', 'required',array('required' => 'Debes ingresar un tomo') );

				$this->form_validation->set_rules('folio', 'folio', 'required',array('required' => 'Debes ingresar un folio ') );

				$this->form_validation->set_rules('finca', 'finca', 'required',array('required' => 'Debes ingresar una finca ') );

				$this->form_validation->set_rules('año', 'año', 'required',array('required' => 'Debes ingresar un año ') );

				$this->form_validation->set_rules('localidad','localidad','required|callback_check_localidad');

  				$this->form_validation->set_message('check_localidad', 'Debes seleccionar una Localidad');

				$this->form_validation->set_rules('descripcion', 'descripcion', 'required',array('required' => 'Debes ingresar una descripcion ') );

				$this->form_validation->set_rules('nroMatriculaRPI', 'matricualRpi', 'required',array('required' => 'Debes ingresar una matricula ') );

				$this->form_validation->set_rules('fechaMatriculaRPI', 'fechaMatriculaRPI', 'required',array('required' => 'Debes ingresar una fecha ') );
		
		
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->CrearMinuta(FALSE,TRUE);
			}else{
				$sql = "SELECT idLocalidad FROM localidad WHERE nombre = ? ";
				$query = $this->db->query($sql, array($this->input->post('localidad')));
				
				$datos_parcela= array (
					'idLocalidad' => $query,
					'circunscripcion' => $this->input->post('circunscripcion'),
					'seccion' => $this->input->post('seccion'),
					'chacra' => $this->input->post('chacra'),
					'quinta' => $this->input->post('correo'),
					'fraccion' => $this->input->post('fraccion'),
					'manzana' => $this->input->post('manzana'),
					'parcela' => $this->input->post('parcela'),
					'superficie' => ($this->input->post('superficie')), 
					'partida' =>$this->input->post('partida'),					
					'tipoPropiedad' => $this->input->post('tipoPropiedad'),
					'planoAprobado' => $this->input->post('planoAprobado'),
					'fechaPlanoAprobado' => $this->input->post('fechaPlanoAprobado'),
					'descripcion' => $this->input->post('descripcion'),					
					'idMinuta' => 2,					
					'nroMatriculaRPI' => $this->input->post('nroMatriculaRPI'),
					'fechaMatriculaRPI' => $this->input->post('fechaMatriculaRPI'),
					'tomo' => $this->input->post('tomo'),
					'folio' => $this->input->post('folio'),
					'finca' => $this->input->post('finca'),
					'año' => $this->input->post('año'),		
				);
				
				$this->db->insert("parcela", $datos_parcela);
				$exito= TRUE; 
				$this->index($exito);
			
			}
		
		}

	function check_localidad($post_string){
		if($post_string==""){
  			return FALSE;}
  		else{
  	   return TRUE;
    }
   }

   function check_propiedad($post_string){
		if($post_string==""){
  			return FALSE;}
  		else{
  	   return TRUE;
    }
   }

    function cargarLocalidades(){
    	$id_departamento=$this->input->post('id_departamento');
   		echo json_encode($this->M_escribano->getLocalidades($id_departamento));
  
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

	public function registrarPropietario()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data['titulo'] = 'Bienvenido Escribano';
		$data['propietarios'] = 
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/propietario',$data);
		$this->load->view('templates/pie',$data);
	}

	public function registrarMinuta()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data['titulo'] = 'Bienvenido Escribano';
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/minuta',$data);
		$this->load->view('templates/pie',$data);
	}

	public function verMinutas()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data['titulo'] = 'Bienvenido Escribano';
		$data["minutas"] = $this->M_escribano->getMinutas();

		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/verMinutas',$data);
		$this->load->view('templates/pie',$data);
	}
	public function editarMinuta()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data['titulo'] = 'Bienvenido Escribano';
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/editarMinuta',$data);
		$this->load->view('templates/pie',$data);
	}
	public function verUnaMinuta($param="")
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data['titulo'] = 'Bienvenido Escribano';
		$data["minuta"] = $this->M_escribano->getUnaMinuta($param);
		$idEscribano = $data["minuta"][0]->idEscribano;
		$data["unEscribano"] = $this->M_escribano->getUnEscribano($idEscribano);
		$idMinuta = $data["minuta"][0]->idMinuta;
		$data["parcelas"] =$this->M_escribano->getParcelas($idMinuta);
		//var_dump($data["parcelas"]);
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/verUnaMinuta',$data);
		$this->load->view('templates/pie',$data);
	}
		public function verPropietarios($param="")
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data['titulo'] = 'Bienvenido Escribano';
		$data['propietarios'] = $this->M_escribano->getPropietarios($param);
		
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/verPropietarios',$data);
		$this->load->view('templates/pie',$data);
	}

	public function imprimirMinuta($param="")
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data['titulo'] = 'Bienvenido Escribano';
		$data["minuta"] = $this->M_escribano->getUnaMinuta($param);
		$idEscribano = $data["minuta"][0]->idEscribano;
		$data["unEscribano"] = $this->M_escribano->getUnEscribano($idEscribano);
		$idMinuta = $data["minuta"][0]->idMinuta;
		$data["parcelas"] =$this->M_escribano->getParcelas($idMinuta);
		//$this->load->view('templates/cabecera_escribano',$data);
		//$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/imprimirMinuta',$data);
		//$this->load->view('templates/pie',$data);
	}
}
