<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_escribano extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
	
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
		$data['titulo'] = 'Bienvenido Escribano';
		$data['minutasRechazadas'] = $this->M_escribano->getMinutasRechazadas( $this->session->userdata('idEscribano'));
		$data['cantM_rechazadas'] = $this->M_escribano->getCantMinutasRechazadas( $this->session->userdata('idEscribano'));
	//	                      var_dump($minutasRechazadas);

		//var_dump($this->session->userdata('usuario'));
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
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
        
		$data['arraydepartamentos'] = $this->M_escribano->getDepartamentos();
		$data['exito']= $exito; 
		$data['hizo_post']=$hizo_post;
		$data['titulo'] = 'Bienvenido Escribano';

		if($this->input->post() && !$exito){
			//seteo los demas input segun lo que ingreso anteriormente
			$data['circunscripcion'] = $this->input->post('circunscripcion');
			$data['seccion']=$this->input->post('seccion');
			$data['chacra'] = $this->input->post('chacra');
			$data['quinta'] = $this->input->post('quinta');
			$data['fraccion'] = $this->input->post('fraccion');
			$data['manzana'] =$this->input->post('manzana');
			$data['parcela'] = $this->input->post('parcela');
			$data['partida'] = $this->input->post('partida');
			$data['planoAprobado'] = $this->input->post('planoAprobado');			
			$data['fechaPlanoAprobado'] = $this->input->post('fechaPlanoAprobado');
			$data['tipoPropiedad'] = $this->input->post('tipoPropiedad');
			$data['tomo'] = $this->input->post('tomo');
			$data['folio'] = $this->input->post('folio');
			$data['finca'] = $this->input->post('finca');
			$data['año'] = $this->input->post('año');
			$data['localidades'] = $this->input->post('localidades');
			$data['departamentos'] = $this->M_escribano->getNombreDepartamento($this->input->post('departamentos'));
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
			$data{'partida'}='';
			$data{'planoAprobado'}='';
			$data{'fechaPlanoAprobado'}='';
			$data{'tipoPropiedad'}='';
			$data{'tomo'}='';
			$data{'folio'}='';
			$data{'finca'}='';
			$data{'año'}='';
			$data{'localidades'}='';
			$data{'departamentos'}='';
			$data{'descripcion'}='';
			$data{'nroMatriculaRPI'}='';
			$data{'fechaMatriculaRPI'}='';

		}


		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/parcela',$data);
		$this->load->view('templates/pie',$data);
	}

	public function datos_relacion1(){

		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();

		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/datos_relacion',$data);
		$this->load->view('templates/pie',$data);
	}
	
	public function registro_parcela()	{

				$hizo_post=TRUE;

			    $this->load->helper(array('form', 'url'));
                 //set_reules(nombre del campo, mensaje a mostrar, reglas de validacion)
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

				$this->form_validation->set_rules('departamentos','departamentos','required|callback_check_departamento');

  				$this->form_validation->set_message('check_departamento', 'Debes seleccionar un departamento');

				$this->form_validation->set_rules('localidades','localidades','required|callback_check_localidad');

  				$this->form_validation->set_message('check_localidad', 'Debes seleccionar una localidad');

				$this->form_validation->set_rules('descripcion', 'descripcion', 'required',array('required' => 'Debes ingresar una descripcion ') );

				$this->form_validation->set_rules('nroMatriculaRPI', 'matricualRpi', 'required',array('required' => 'Debes ingresar una matricula ') );

				$this->form_validation->set_rules('fechaMatriculaRPI', 'fechaMatriculaRPI', 'required',array('required' => 'Debes ingresar una fecha ') );
		
		
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->CrearMinuta(FALSE,TRUE);

			}else{
				/*$sql = "SELECT idLocalidad FROM localidad WHERE nombre = ? ";
				$query = $this->db->query($sql, array($this->input->post('localidad')));*/
				
				$datos_parcela= array (
					'circunscripcion' => $this->input->post('circunscripcion'),
					'seccion' => $this->input->post('seccion'),
					'chacra' => $this->input->post('chacra'),
					'quinta' => $this->input->post('correo'),
					'fraccion' => $this->input->post('fraccion'),
					'manzana' => $this->input->post('manzana'),
					'parcela' => $this->input->post('parcela'),
					'superficie' => $this->input->post('superficie'), 
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

				$this->session->set_userdata($datos_parcela);
				$this->datos_relacion(FALSE,FALSE);
				
				/*$this->db->insert("parcela", $datos_parcela);
				$exito= TRUE; 
				$this->index($exito);*/
			
			}
		
		}

     public function datos_relacion($exito=FALSE, $hizo_post=FALSE){

			if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}

        
				$data['exito']= $exito; 
				$data['hizo_post']=$hizo_post;

		if($this->input->post() && !$exito){
			//seteo los demas input segun lo que ingreso anteriormente
			$data['circunscripcion'] = $this->input->post('circunscripcion');
			$data['porcentaje_condominio']=$this->input->post('porcentaje_condominio');
			$data['chacra'] = $this->input->post('chacra');
			$data['quinta'] = $this->input->post('quinta');
			$data['fraccion'] = $this->input->post('fraccion');
			$data['manzana'] =$this->input->post('manzana');
			$data['parcela'] = $this->input->post('parcela');
			$data['planoAprobado'] = $this->input->post('planoAprobado');			
			$data['fechaPlanoAprobado'] = $this->input->post('fechaPlanoAprobado');
			
		

		}else{
			$data['circunscripcion']='';
			$data['porcentaje_condominio']='';
			$data['chacra']='';
			$data{'quinta'}='';
			$data{'fraccion'}='';
			$data{'manzana'}='';
			$data{'parcela'}='';
			$data{'planoAprobado'}='';
			$data{'fechaPlanoAprobado'}='';
			

		}

		
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/datos_relacion',$data);
		$this->load->view('templates/pie',$data);

	}

     public function registro_ph(){

				$hizo_post=TRUE;

				 $this->load->helper(array('form', 'url'));
                 //set_reules(nombre del campo, mensaje a mostrar, reglas de validacion)
			    $this->form_validation->set_rules('fecha_escritura', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar un porcentaje ') );
			    $this->form_validation->set_rules('porcentaje_condominio', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar un porcentaje ') );
			    $this->form_validation->set_rules('nro_ucuf', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar un porcentaje ') );
			    $this->form_validation->set_rules('tipo_ucuf', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar un porcentaje ') );
			    $this->form_validation->set_rules('plano_aprobado', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar un porcentaje ') );
			    $this->form_validation->set_rules('fecha_plano_aprobado', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar un porcentaje ') );
			    $this->form_validation->set_rules('porcentaje_ucuf', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar un porcentaje ') );
			    $this->form_validation->set_rules('poligonos', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar un porcentaje ') );

			   
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->datos_relacion(FALSE,TRUE);

			}

     }

    //verifica que haya seleccionado alguna localidad
	function check_localidad($post_string){		

		if($post_string==""){
  			return FALSE;}
  		else{
  	   return TRUE;
    }
   }
  
    //verifica que haya seleccionado algun departamento
   function check_departamento($post_string){
		if($post_string==""){
  			return FALSE;}
  		else{
  	   return TRUE;
    }
   }

  
    //verifica que haya seleccionado algun tipo de propiedad
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

		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
        

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
		
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
        



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
		$data["minutas"] = $this->M_escribano->getMinutasPorFecha($this->session->userdata('idEscribano'));
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
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
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
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
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
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
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
		$data['titulo'] = 'Bienvenido Escribano';
		$data['propietariosAd'] = $this->M_escribano->getPropietarios_porMinuta_Ad($param);
		$data['propietariosTr'] = $this->M_escribano->getPropietarios_porMinuta_Tr($param);
		//var_dump($data['propietarios']);
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
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
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

	public function nuevoPedido($exito=FALSE, $hizo_post=FALSE){
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
	
		$data['titulo'] = 'Bienvenido escribano';

		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();

		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/nuevoPedido',$data);
		$this->load->view('templates/pie',$data);

	}
	public function crearPedido($exito=FALSE, $hizo_post=FALSE){
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
	
		$data['titulo'] = 'Bienvenido escribano';
		$descripcion=$_POST['pedido'];
		$idEscribano=$_POST['idEscribano'];
			$datetime_variable = new DateTime();
			$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
			$datos_usuarios= array (
			'idEscribano' => $idEscribano,
			'descripcion' => $descripcion,	
			'fechaPedido' =>$datetime_formatted,	
			'estadoPedido' =>'P'  );	
			$this->db->insert("pedidos", $datos_usuarios);

		


	}
	 public function verPedidos()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_escribano_login');
		}
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
		$idEscribano=$this->session->userdata('idEscribano');
		$this->db->select('*');
		$this->db->from('pedidos');
		$this->db->join('usuariosys', 'usuariosys.idUsuario = pedidos.idUsuario','left');

		$this->db->where('idEscribano', $idEscribano);

		
		
		$pedidos= $this->db->get()->result();
	
		$data['pedidos']=$pedidos;


		$data['titulo'] = 'Bienvenido Escribano';
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/verPedidos',$data);
		$this->load->view('templates/pie',$data);
	}


	public function buscar_min_a_x_id(){
			if ($_POST["idMinuta"]==null) {
				$idMinuta="";
			}else
			{
				$idMinuta=$_POST["idMinuta"];
			};
			$noti_min=array("idMinuta"=>$idMinuta,"estado"=>"A");
		   $this->session->set_flashdata('noti_min',$noti_min); 
		    redirect(base_url().'index.php/c_escribano/verMinutas');
	}

	public function buscar_min_r_x_id(){
			if ($_POST["idMinuta"]==null) {
				$idMinuta="";
			}else
			{
				$idMinuta=$_POST["idMinuta"];
			};
			$noti_min=array("idMinuta"=>$idMinuta,"estado"=>"R");
		   $this->session->set_flashdata('noti_min',$noti_min); 
		    redirect(base_url().'index.php/c_escribano/verMinutas');
	}

		public function buscar_si(){
			if ($_POST["idPedido"]==null) {
				$idPedido="";
			}else
			{
				$idPedido=$_POST["idPedido"];
			};
			$noti_si=array("idPedido"=>$idPedido,"estadoPedido"=>"C");
		   $this->session->set_flashdata('noti_si',$noti_si); 
		    redirect(base_url().'index.php/c_escribano/verPedidos');
	}



	public function notificaciones_ma(){
		$idEscribano=$this->session->userdata('idEscribano');
						$this->db->from('estadominuta');
                         $this->db->where('estadoMinuta', "A"); 
                          $this->db->where('minuta.idEscribano', $idEscribano); 
                         $this->db->join('minuta', 'estadominuta.idMinuta = minuta.idMinuta','left');
                          $this->db->order_by('idEstadoMinuta', 'DESC');
                         $this->db->limit(10);

                  return( $this->db->get()->result()); 

	}

	public function notificaciones_mr(){
				$idEscribano=$this->session->userdata('idEscribano');

						$this->db->from('estadominuta');
                         $this->db->where('estadoMinuta', "R"); 
                         $this->db->where('minuta.idEscribano', $idEscribano); 
                         $this->db->join('minuta', 'estadominuta.idMinuta = minuta.idMinuta','left');
                         $this->db->order_by('idEstadoMinuta', 'DESC');
                          $this->db->limit(10);
                        return( $this->db->get()->result()); 

	}
		public function notificaciones_si(){
					$idEscribano=$this->session->userdata('idEscribano');

						$this->db->from('pedidos');
                         $this->db->where('estadoPedido', "C"); 
                        $this->db->where('idEscribano', $idEscribano); 
                        $this->db->order_by('idPedido', 'DESC');
                        $this->db->limit(10);
                        return( $this->db->get()->result()); 

	}

}
