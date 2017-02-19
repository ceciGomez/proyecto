<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_escribano extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();
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
		$data['titulo'] = 'Bienvenido Escribano';
		$data["provincias"] = $this->M_direccion->getProvincias();

		if($this->input->post() && !$exito){
			//seteo los demas input segun lo que ingreso anteriormente
			$data['circunscripcion'] = $this->input->post('circunscripcion');
			$data['seccion']=$this->input->post('seccion');
			$data['chacra'] = $this->input->post('chacra');
			$data['quinta'] = $this->input->post('quinta');
			$data['fraccion'] = $this->input->post('fraccion');
			$data['manzana'] =(integer)$this->input->post('manzana');
			$data['parcela'] = $this->input->post('parcela');
			$data['planoAprobado'] = $this->input->post('planoAprobado');			
			$data['fechaPA'] = $this->input->post('fechaPA');
			$data['tipoPropiedad'] = $this->input->post('tipoPropiedad');
			$data['tomo'] = $this->input->post('tomo');
			$data['folio'] = $this->input->post('folio');
			$data['finca'] = $this->input->post('finca');
			$data['año'] = $this->input->post('año');
			$data['localidad'] = $this->input->post('localidad');
			$data['descripcionParcela'] = $this->input->post('descripcionParcela');
			$data['matriculaRpi'] = $this->input->post('matriculaRpi');
			$data['fechaM'] = $this->input->post('fechaM');
		

		}else{
			$data['circunscripcion']='';
			$data['seccion']='';
			$data['chacra']='';
			$data{'quinta'}='';
			$data{'fraccion'}='';
			$data{'manzana'}='';
			$data{'parcela'}='';
			$data{'planoAprobado'}='';
			$data{'fechaPA'}='';
			$data{'tipoPropiedad'}='';
			$data{'tomo'}='';
			$data{'folio'}='';
			$data{'finca'}='';
			$data{'año'}='';
			$data{'localidad'}='';
			$data{'descripcionParcela'}='';
			$data{'matriculaRpi'}='';
			$data{'fechaM'}='';

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

			    $this->form_validation->set_rules('quinta', 'quinta', 'required|is_unique[usuarioEscribano.matricula]',array('required' => 'Debes ingresar una quinta ','is_unique'=>'Ya existe un escribano con el Nro de Matrícula') );

			    $this->form_validation->set_rules('fraccion', 'fraccion', 'required|is_unique[usuarioEscribano.email]',array('required' => 'Debes ingresar una fracción ','is_unique'=>'Ya existe un escribano con el Correo ingresado') );

			    $this->form_validation->set_rules('manzana', 'manzana', 'required',array('required' => 'Debes ingresar una manzana ') );

			    $this->form_validation->set_rules('parcela', 'parcela', 'required',array('required' => 'Debes seleccionar una parcela ') );

			    $this->form_validation->set_rules('superficie', 'superficie', 'required',array('required' => 'Debes seleccionar una superficie') );

			    $this->form_validation->set_rules('partida', 'partida', 'required',array('required' => 'Debes ingresar una partida ') );
			   
				 $this->form_validation->set_rules('planoAprobado', 'planoAprobado',  'required|is_unique[usuarioEscribano.usuario]',array('required' => 'Debes ingresar un plano aprobado','is_unique'=>'Ya existe un escribano con el nombre de usuario ingresado') );

			    $this->form_validation->set_rules('fechaPA', 'fechaPA', 'required',array('required' => 'Debes ingresar una fecha  ') );

				$this->form_validation->set_rules('tipoPropiedad', 'tipoPropiedad','required',array('required' => 'Debes ingresar un tipo de propiedad ') );

				$this->form_validation->set_rules('tomo', 'tomo', 'required',array('required' => 'Debes ingresar un tomo') );

				$this->form_validation->set_rules('folio', 'folio', 'required',array('required' => 'Debes ingresar un folio ') );

				$this->form_validation->set_rules('finca', 'finca', 'required',array('required' => 'Debes ingresar una finca ') );

				$this->form_validation->set_rules('año', 'año', 'required',array('required' => 'Debes ingresar un año ') );

				$this->form_validation->set_rules('localidad', 'localidad', 'required|callback_select_validate');

				$this->form_validation->set_rules('descripcionParcela', 'descripcionParcela', 'required',array('required' => 'Debes ingresar una descripcion ') );

				$this->form_validation->set_rules('matriculaRpi', 'matricualRpi', 'required',array('required' => 'Debes ingresar una matricula ') );

				$this->form_validation->set_rules('fechaM', 'fechaM', 'required',array('required' => 'Debes ingresar una fecha ') );
		
		
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->CrearMinuta(FALSE,TRUE);
			}else{
				
				$datos_parcela= array (
					'circunscripcion' => $this->input->post('circunscripcion'),
					'seccion' => $this->input->post('seccion'),
					'chacra' => $this->input->post('chacra'),
					'quinta' => $this->input->post('correo'),
					'fraccion' => $this->input->post('fraccion'),
					'manzana' =>(integer) $this->input->post('manzana'),
					'parcela' => $this->input->post('parcela'),
					'superficie' => sha1($this->input->post('superficie')), 
					'partida' =>$this->input->post('partida'),
					'planoAprobado' => $this->input->post('planoAprobado'),
					'fechaPA' => $this->input->post('fechaPA'),
					'tipoPropiedad' => $this->input->post('tipoPropiedad'),
					'tomo' => $this->input->post('tomo'),
					'folio' => $this->input->post('folio'),
					'finca' => $this->input->post('finca'),
					'año' => $this->input->post('año'),
					'localidad' => $this->input->post('localidad'),
					'descripcionParcela' => $this->input->post('descripcionParcela'),
					'matriculaRpi' => $this->input->post('matriculaRpi'),
					'fechaM' => $this->input->post('fechaM'),
					''=>'',
				);
				
				$this->db->insert("parcela", $datos_parcela);
				$exito= TRUE; 
				$data['provincias'] = $this->db->get("Provincia")->result();
				$this->index($exito);
			
			}
		
		}

		function select_validate($abcd)
{
// 'none' is the first option that is default "-------Choose City-------"
if($localidad==""){
$this->form_validation->set_message('select_validate', 'Debes seleccionar una Localidad');
return false;
} }

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
		public function verPropietarios()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data['titulo'] = 'Bienvenido Escribano';
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
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/imprimirMinuta',$data);
		$this->load->view('templates/pie',$data);
	}
}
