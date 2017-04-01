<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_escribano extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_escribano');
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
		$idEscri = $this->session->userdata('idEscribano');
		$unEscribano=$this->M_escribano->getUnEscribano(10);
		$data['escribano']=$unEscribano;
		//var_dump($this->session->userdata('usuario'));
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('home/escri',$data);
		$this->load->view('templates/pie',$data);
		
		}	
		
	public function crearParcela($exito=FALSE, $hizo_post=FALSE, $otra_Parcela=FALSE)
	{
  					

		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}

		if($otra_Parcela == TRUE){
			$this->session->set_userdata('otraParcela',TRUE);
    			$this->session->set_userdata('otroPh',FALSE);
		}else{
			$this->session->set_userdata('otraParcela',FALSE);
			$this->session->set_userdata('otroPh',FALSE);
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
			$data['superficie'] = $this->input->post('superficie'); 
		

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
			$data['superficie'] ="";

		}


		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/parcela',$data);
		$this->load->view('templates/pie',$data);
	}

	
	public function registrarParcela()	{

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
				
				$this->crearParcela(FALSE,TRUE, FALSE);

			}else{
				
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
					'nroMatriculaRPI' => $this->input->post('nroMatriculaRPI'),
					'fechaMatriculaRPI' => $this->input->post('fechaMatriculaRPI'),
					'departamentos' => $this->input->post('departamentos'),
					'localidades' => $this->input->post('localidades'),
					'tomo' => $this->input->post('tomo'),
					'folio' => $this->input->post('folio'),
					'finca' => $this->input->post('finca'),
					'año' => $this->input->post('año'),		
				);

				$this->session->set_userdata($datos_parcela);
				$this->crearRelacion(FALSE,FALSE);
				
						
			}
		 }
		

     public function crearRelacion($exito=FALSE, $hizo_post=FALSE, $otro_ph=FALSE){

			if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}

         /*Variables para evitar que inserte una minuta y parcela cuando quiere agregar otro ph*/
		if($otro_ph==TRUE){
			$this->session->set_userdata('otroPh',TRUE);
    		$this->session->set_userdata('otraParcela',TRUE);
		}

        		$data["notificaciones_ma"]=$this->notificaciones_ma();
				$data["notificaciones_mr"]=$this->notificaciones_mr();
				$data["notificaciones_si"]=$this->notificaciones_si();
				$data['exito']= $exito; 
				$data['hizo_post']=$hizo_post;

		if($this->input->post() && !$exito){
			//seteo los demas input segun lo que ingreso anteriormente
			$data['ph'] = $this->input->post('ph');
			$data['fecha_escritura'] = $this->input->post('fecha_escritura');
			$data['nro_ucuf'] = $this->input->post('nro_ucuf');
			$data['tipo_ucuf'] = $this->input->post('tipo_ucuf');
			$data['plano_aprobado'] = $this->input->post('plano_aprobado');
			$data['fecha_plano_aprobado'] =$this->input->post('fecha_plano_aprobado');
			$data['porcentaje_ucuf'] = $this->input->post('porcentaje_ucuf');
			$data['poligonos'] = $this->input->post('poligonos');					
		

		}else{

			$data['ph']='';
			$data['fecha_escritura']='';
			$data['nro_ucuf']='';
			$data['tipo_ucuf']='';
			$data['plano_aprobado']='';
			$data['fecha_plano_aprobado']='';
			$data['porcentaje_ucuf']='';
			$data['poligonos']='';		

		}
		
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/relacion',$data);
		$this->load->view('templates/pie',$data);

	}

     public function registrarRelacion(){

				$hizo_post=TRUE;

				 $this->load->helper(array('form', 'url'));
                 //set_reules(nombre del campo, mensaje a mostrar, reglas de validacion)
                 if($this->input->post('ph')=='noph'){
			    $this->form_validation->set_rules('fecha_escritura', 'fecha_escritura', 'required',array('required' => 'Debes ingresar una fecha de escritura') );
			    }else{
 			    $this->form_validation->set_rules('fecha_escritura', 'fecha_escritura', 'required',array('required' => 'Debes ingresar una fecha de escritura') );
			    $this->form_validation->set_rules('nro_ucuf', 'nro_ucuf', 'required',array('required' => 'Debes ingresar un número ') );
				$this->form_validation->set_rules('tipo_ucuf', 'tipo_ucuf','required|callback_check_tipoucuf');
				$this->form_validation->set_message('check_tipoucuf', 'Debes seleccionar un tipo');
			    $this->form_validation->set_rules('plano_aprobado', 'plano_aprobado', 'required',array('required' => 'Debes ingresar un nro de plano ') );
			    $this->form_validation->set_rules('fecha_plano_aprobado', 'fecha_plano_aprobado', 'required',array('required' => 'Debes ingresar una fecha ') );
			    $this->form_validation->set_rules('porcentaje_ucuf', 'porcentaje_ucuf', 'required',array('required' => 'Debes ingresar un porcentaje ') );
			    $this->form_validation->set_rules('poligonos', 'poligonos', 'required',array('required' => 'Debes ingresar un poligono ') );}

			   
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->crearRelacion(FALSE,TRUE);

			} else{
                  
				$datos_ph= array (
					'ph' => $this->input->post('ph'),
					'fecha_escritura' => $this->input->post('fecha_escritura'),
					'nro_ucuf' => $this->input->post('nro_ucuf'),
					'tipo_ucuf' => $this->input->post('tipo_ucuf'),
					'plano_aprobado' => $this->input->post('plano_aprobado'),
					'fecha_plano_aprobado' => $this->input->post('fecha_plano_aprobado'),
					'porcentaje_ucuf' => $this->input->post('porcentaje_ucuf'),
					'poligonos' => $this->input->post('poligonos'), 

				);

				 	$array = array();
					$this->session->set_userdata('datos_ph',$array); 
					$ph_anterior =  $this->session->userdata('datos_ph');
					array_push($ph_anterior, $datos_ph);
					$this->session->set_userdata('datos_ph', $ph_anterior);
				 /*
				 if($this->session->userdata('datos_ph')) {
				 	$ph_anterior =  $this->session->userdata('datos_ph');
					array_push($ph_anterior, $datos_ph);
					$this->session->set_userdata('propietario', $ph_anterior);
				 }else { 
				 	$array = array();
					$this->session->set_userdata('datos_ph',$array); 
					$ph_anterior =  $this->session->userdata('datos_ph');
					array_push($ph_anterior, $datos_ph);
					$this->session->set_userdata('datos_ph', $ph_anterior);
					}
					*/
					redirect(base_url().'index.php/c_escribano/crearPropietario',FALSE,FALSE);
							
			}

     }


	public function crearPropietario($exito=FALSE, $hizo_post=FALSE)
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}

		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
		$data['arraydepartamentos'] = $this->M_escribano->getDepartamentos();
		$data["personas"] = $this->M_escribano->getPersonas();
		$data['exito']= $exito; 
		$data['hizo_post']=$hizo_post;
		$data['titulo'] = 'Bienvenido Escribano';
		
         var_dump($this->input->post('idPersonaSelect'));
         if ($this->input->post('idPersonaSelect')==NULL) {
         	$this->session->set_userdata('idPersonaSelect', $this->input->post('idPersonaSelect'));
         }else{

         	$this->session->set_userdata('idPersonaSelect', NULL);

        }
			if($this->input->post() && !$exito){
			//seteo los demas input segun lo que ingreso anteriormente
			$data['propietario'] = $this->input->post('propietario');	
			$data['porcentaje_condominio'] = $this->input->post('porcentaje_condominio');
			$data['tipo_propietario'] = $this->input->post('tipo_propietario');
			$data['empresa'] = $this->input->post('empresa');
			$data['nombreyapellido'] = $this->input->post('nombreyapellido');
			$data['sexo_combobox']=$this->input->post('sexo_combobox');
			$data['dni']=$this->input->post('dni');
			$data['cuit'] = $this->input->post('cuit');
			$data['cuil'] = $this->input->post('cuil');
			$data['conyuge'] = $this->input->post('conyuge');
			$data['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
			$data['direccion'] =$this->input->post('direccion');
			$data['departamentos'] = $this->input->post('departamentos');
			$data['localidades'] = $this->input->post('localidades');			


		}else{

			$data['propietario']='';
			$data['tipo_propietario']='';
			$data['porcentaje_condominio']='';
			$data['tipo_propietario']='';
			$data['empresa']='';
			$data['nombreyapellido']='';
			$data['sexo_combobox']='';
			$data['dni']='';
			$data['cuit']='';
			$data['cuil']='';
			$data['conyuge']='';
			$data['fecha_nacimiento']='';
			$data['direccion']='';
			$data['departamentos']='';
			$data['localidades']='';
			

		}
		
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/propietario',$data);
		$this->load->view('templates/pie',$data);

	}

	 public function registrarPropietario(){

				$hizo_post=TRUE;

				 $this->load->helper(array('form', 'url'));
                 //set_reules(nombre del campo, mensaje a mostrar, reglas de validacion)
                 if($this->input->post('propietario')=='P'){
			   		 $this->form_validation->set_rules('porcentaje_condominio', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar porcentaje de codominio') );
			  	    $this->form_validation->set_rules('nombreyapellido', 'nombreyapellido', 'required',array('required' => 'Debes ingresar una fecha de escritura') );
			  	    $this->form_validation->set_rules('tipo_propietario', 'tipo_propietario', 'required',array('required' => 'Debes ingresar un nombre y apellido')) ;
			  	    $this->form_validation->set_rules('sexo_combobox', 'sexo_combobox', 'required',array('required' => 'Debes seleccionar tipo de sexo ') );
					$this->form_validation->set_rules('dni', 'dni','required',array('required' => 'Debes ingresar un dni ') );
					/*$this->form_validation->set_rules('conyuge', 'conyuge','required',array('required' => 'Debes ingresar un conyuge ') );*/
					$this->form_validation->set_rules('direccion', 'direccion','required',array('required' => 'Debes ingresar una direccion ') );
			   		$this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required',array('required' => 'Debes ingresar una fecha ') );
			   		$this->form_validation->set_rules('departamentos','departamentos','required|callback_check_departamento');
  					$this->form_validation->set_message('check_departamento', 'Debes seleccionar un departamento');
					$this->form_validation->set_rules('localidades','localidades','required|callback_check_localidad');
  					$this->form_validation->set_message('check_localidad', 'Debes seleccionar una localidad');    }
  				else{
  					 $this->form_validation->set_rules('porcentaje_condominio', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar porcentaje de codominio') );
  					$this->form_validation->set_rules('tipo_propietario', 'tipo_propietario', 'required',array('required' => 'Debes ingresar un nombre y apellido'));
 			   		$this->form_validation->set_rules('nombreyapellido', 'nombreyapellido', 'required',array('required' => 'Debes ingresar un nombre y apellido') );
			   		$this->form_validation->set_rules('cuit', 'cuit', 'required',array('required' => 'Debes ingresar un cuit ') );
					$this->form_validation->set_rules('direccion', 'direccion','required',array('required' => 'Debes ingresar una direccion ') );
			   		$this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required',array('required' => 'Debes ingresar una fecha ') );
			   		$this->form_validation->set_rules('departamentos','departamentos','required|callback_check_departamento');
  					$this->form_validation->set_message('check_departamento', 'Debes seleccionar un departamento');
					$this->form_validation->set_rules('localidades','localidades','required|callback_check_localidad');
  					$this->form_validation->set_message('check_localidad', 'Debes seleccionar una localidad');
			    }

			 
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->crearPropietario(FALSE,TRUE);

			} else{

                /*si es empresa tomo el cuil*/   
               if($this->input->post('propietario')=='P')   { 
				$datos_propietario= array (
					'propietario' => $this->input->post('propietario'),
					'tipo_propietario' => $this->input->post('tipo_propietario'),
					'porcentaje_condominio' => $this->input->post('porcentaje_condominio'),
					'nombreyapellido' => $this->input->post('nombreyapellido'),
					'sexo_combobox' => $this->input->post('sexo_combobox'),
					'dni' => $this->input->post('dni'),
					'cuit_cuil' => $this->input->post('cuil'),
					'direccion' => $this->input->post('direccion'),
					'conyuge' => $this->input->post('conyuge'),
					'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
					'localidad' => $this->input->post('localidades'),	);
			    }else{
			    		$datos_propietario= array (
			    	'propietario' => $this->input->post('propietario'),		
			    	'tipo_propietario' => $this->input->post('tipo_propietario'),
					'porcentaje_condominio' => $this->input->post('porcentaje_condominio'),
					'nombreyapellido' => $this->input->post('nombreyapellido'),
					'sexo_combobox' => $this->input->post('sexo_combobox'),
					'dni' => $this->input->post('dni'),
					'cuit_cuil' => $this->input->post('cuit'),
					'direccion' => $this->input->post('direccion'),
					'conyuge' => $this->input->post('conyuge'),
					'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
					'localidad' => $this->input->post('localidades'),	);
				}
				 /*$this->session->set_userdata($datos_propietario);*/

				 if($this->session->userdata('propietario')&&(!$this->session->userdata('propietario')=='')) {
				 
					$propietario_anterior =  $this->session->userdata('propietario');
					array_push($propietario_anterior, $datos_propietario);
					$this->session->set_userdata('propietario', $propietario_anterior);
				 }else { 
				 	$array = array();
					$this->session->set_userdata('propietario',$array); 
					$propietario_anterior =  $this->session->userdata('propietario');
					array_push($propietario_anterior, $datos_propietario);
					$this->session->set_userdata('propietario', $propietario_anterior);
					
					}		

					/*verifica si presionó boton agregar propietario o guardar*/ 
					if($this->input->post('minuta') == "agregar") { 
    						$this->crearPropietario(FALSE,FALSE);

					} else {
   					    $this->M_escribano->insertarMinuta();
   						$this->finMinutas();
					}        					

			}

     }

    function finMinutas(){
    	$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
    	$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/finMinuta',$data);
		$this->load->view('templates/pie',$data);

}

function checkPost(){
    
		if($this->input->post('finminuta') == "agregarph") { 
    			$this->session->unset_userdata('datos_ph');
    			$this->session->unset_userdata('propietario');
    			
    			$this->crearRelacion(FALSE, TRUE, TRUE);
    		}else{
    			$this->session->unset_userdata('datos_parcela');
    			$this->session->unset_userdata('datos_ph');
    			$this->session->unset_userdata('propietario');
    		
               $this->crearParcela(FALSE, TRUE, TRUE);
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

   function check_tipoucuf($post_string){
		if($post_string=="Seleccionar"){
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

			redirect(base_url().'index.php/c_escribano/verPedidos');
		


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
	
	
		$data['pedidos']=$this->M_escribano->getPedidos($idEscribano);


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

	 public function buscarParcelas()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
		$idEscribano=$this->session->userdata('idEscribano');
		$this->db->select('minuta.fechaIngresoSys,minuta.idMinuta,relacion.fechaEscritura,relacion.nroUfUc,relacion.tipoUfUc,parcela.circunscripcion,parcela.seccion,parcela.chacra,parcela.quinta,parcela.fraccion,parcela.manzana,parcela.parcela,parcela.planoAprobado,parcela.nroMatriculaRPI,parcela.idLocalidad,parcela.idParcela');
		$this->db->from('parcela');
		$this->db->join('minuta', 'parcela.idMinuta = minuta.idMinuta','left');
		$this->db->join('relacion', 'relacion.idParcela=parcela.idParcela');
		$this->db->where('idEscribano', $idEscribano);

		$parcelas= $this->db->get()->result();
	
		$data['parcelas']=$parcelas;


		$data['titulo'] = 'Bienvenido Escribano';
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/buscarParcelas',$data);
		$this->load->view('templates/pie',$data);
	}

	public function buscar_min_id(){
			if ($_POST["idMinuta"]==null) {
				$idMinuta="";

			}else
			{
				$idMinuta=$_POST["idMinuta"];

			};
			$noti_min=array("idMinuta"=>$idMinuta);
		   $this->session->set_flashdata('noti_min',$noti_min); 
		    redirect(base_url().'index.php/c_escribano/verMinutas');
	}

	public function detalles_parcela(){
			$idParcela=$_POST["idParcela"];
			$parcela=$this->db->get_where('parcela', array('idParcela'=>$idParcela))->row();
			$date=new DateTime($parcela->fechaPlanoAprobado);
            $date_formated=$date->format('d/m/Y ');
			$fecha_planoAprobado=$date_formated;

			$date2=new DateTime($parcela->fechaMatriculaRPI);
            $date_formated2=$date->format('d/m/Y ');
            $fecha_matriculaRPI=$date_formated;
			 echo " 
			 	<tr>
			 		<th> Circunscripcion</th><td>$parcela->circunscripcion </td>
			 	</tr>
			 	<tr>
					<th> Sección</th><td>$parcela->seccion </td>
				</tr>
				<tr>
			 		<th> Chacra</th><td>$parcela->chacra </td>
			 	</tr>
			 	<tr>
			 		<th> Quinta</th><td>$parcela->quinta </td>
			 	</tr>
			 	<tr>
			 		<th> Fracción</th><td>$parcela->fraccion </td>
			 	</tr>
			 	<tr>
			 		<th> Manzana</th><td>$parcela->manzana </td>
			 	</tr>
			 	<tr>
			 		<th> Parcela</th><td>$parcela->parcela </td>
			 	</tr>
			 	<tr>
			 		<th> Superficie</th><td>$parcela->superficie </td>
			 	</tr>
			 	<tr>
			 		<th> Partida</th><td>$parcela->partida </td>
			 	</tr>
			 	<tr>
			 		<th> Tipo de Propiedad</th><td>$parcela->tipoPropiedad </td>
			 	 </tr>
			 	 	<tr>
			 		<th> Plano Aprobado</th><td>$parcela->planoAprobado</td>
			 	 </tr>	   
			 	 	<tr>
			 		<th> Fecha Plano Aprobado</th><td>$fecha_planoAprobado </td>
			 	 </tr>	
			 	 <tr>
			 		<th> Descripción</th><td>$parcela->descripcion</td>
			 	 </tr>	  
			 	 <tr>
			 		<th> Nro de Matrícula RPI</th><td>$parcela->nroMatriculaRPI</td>
			 	 </tr>	  
			 	  <tr>
			 		<th> Fecha Matrícula RPI</th><td>$fecha_matriculaRPI</td>
			 	 </tr>	 
			 	 <tr>
			 		<th> Tomo</th><td>$parcela->tomo</td>
			 	 </tr>
			 	 <tr>
			 		<th> Folio</th><td>$parcela->folio</td>
			 	 </tr> 
			 	 <tr>
			 		<th>Finca</th><td>$parcela->finca</td>
			 	 </tr>
			 	 <tr>
			 		<th> Año</th><td>$parcela->año</td>
			 	 </tr>
                         "; 
                         }

    public function verPerfil()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		//muestra las notificaciones
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();


		$idEscribano =  $this->session->userdata('idEscribano');
		$data['unEscribano'] = $this->M_escribano->getUnEscribano($idEscribano);
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/perfil_escribano',$data);
		$this->load->view('templates/pie',$data);
	}
	public function editarEscribano($idUsuario="",$exito=FALSE, $hizo_post=FALSE)
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
		$data['exito']= $exito; 
		$data['hizo_post']=$hizo_post;

		//muestra las notificaciones
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();

		$data['titulo'] = 'Bienvenido Escribano';
		$idEscribano = $this->session->userdata('idEscribano');
		$data["unEscribano"] =  $this->M_escribano->getUnEscribano($idEscribano);
		//var_dump($data["operador"]);
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/perfil_escribano',$data);
		$this->load->view('templates/pie',$data);
	}

	public function actualizarEscribano()
	{

		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
		$data['titulo'] = 'Bienvenido Escribano';
		$idUsuario = $this->session->userdata('idEscribano');
		$hizo_post=TRUE;	

		$this->load->helper(array('form', 'url'));

	    $this->form_validation->set_rules('nomyap', 'nomyap', 'required',array('required' => 'Debes ingresar un Nombre y Apellido ') );


	    $this->form_validation->set_rules('dni', 'dni', 'required',array('required' => 'Debes ingresar DNI '));


	    $this->form_validation->set_rules('email', 'email', 'required',array('required' => 'Debes ingresar un correo ') );

	    $this->form_validation->set_rules('telefono', 'telefono', 'required',array('required' => 'Debes ingresar numero de teleéfono ') );

	  
	    $this->form_validation->set_rules('direccion', 'direccion', 'required',array('required' => 'Debes ingresar una dirección ') );

	    $this->form_validation->set_rules('matricula', 'matricula', 'required',array('required' => 'Debes ingresar una matricula ') );
	   

		$this->form_validation->set_rules('usuario', 'usuario',  'required|min_length[6]',array('required' => 'Debes ingresar un nombre de Usuario ','min_length'=> 'El nombre de usuario debe ser de al menos 6 digitos') );
		$checked = $this->input->post('cambiar_pass');
		if ($checked == 1) {
			# code...
			$this->form_validation->set_rules('contraseña', 'contraseña', 'required|min_length[6]',array('required' => 'Debes ingresar una contraseña ','min_length'=> 'La contraseña debe ser de al menos 6 dígitos ') );

		    $this->form_validation->set_rules('repeContraseña', 'repeContraseña', 'required|matches[contraseña]',array('required' => 'Debes volver a ingresar la contraseña ','matches'=> 'Las dos contraseñas no coinciden ') );

		}
		
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->editarEscribano($idUsuario,FALSE,TRUE);
			}else{
			//actualizo
				if ($checked == 1) {
						$contraseña = $this->input->post('contraseña');
						$escriAct= array(
							//Nombre del campo en la bd -----> valor del campo name en la vista
							'nomyap' => $this->input->post("nomyap"),
							'usuario' => $this->input->post("usuario"),	
							'dni' => $this->input->post("dni"),	
							'telefono' => $this->input->post("telefono"),
							'direccion' => $this->input->post("direccion"),	
							//'idLocalidad' => $this->input->post('localidad'),	
							'email' => $this->input->post('email'),
							'matricula' => $this->input->post('matricula'),
							'contraseña' => sha1($contraseña)
							
							);
					} else {
						$escriAct= array(
						//Nombre del campo en la bd -----> valor del campo name en la vista
							'nomyap' => $this->input->post("nomyap"),
							'usuario' => $this->input->post("usuario"),	
							'dni' => $this->input->post("dni"),	
							'telefono' => $this->input->post("telefono"),
							'direccion' => $this->input->post("direccion"),	
							//'idLocalidad' => $this->input->post('localidad'),	
							'email' => $this->input->post('email'),
							'matricula' => $this->input->post('matricula')
						);
					}	
			
				
				$ctrl=$this->M_escribano->actualizarEscribano($escriAct,$idUsuario);
				$this->editarEscribano($idUsuario,TRUE,TRUE);
			}
	
	}

	public function obtenerDepartamento_x_idLoc(){
		$idLocalidad=$_POST["idLocalidad"];
		$this->db->select('*');
		$this->db->from('departamento');
		$this->db->join('localidad', 'localidad.idDepartamento = departamento.idDepartamento');
		$this->db->where('localidad.idLocalidad', $idLocalidad);	
			echo $this->db->get()->row()->idDepartamento;
	}


		public function mostrarLocalidad()
	{
		$id_dep=$_POST["midepartamento"];
		
		$this->db->select('localidad.idLocalidad, localidad.nombre');
		$this->db->from('localidad');
		$this->db->where('localidad.idDepartamento', $id_dep);	
		

		$localidades=$this->db->get()->result();
	   		echo"<option value=''>Seleccione una localidad</option>";
		//en este caso quiero que en el value aparezca el id que esta en la tabla , porque este valor me va a servir para insertar en la tabla usuarioescribano
		foreach ($localidades as $l ) {
				
			echo"<option value='$l->idLocalidad' >$l->nombre</option>";
			
		}
	}

	function sacarPropietario(){
		$posicion=$_POST['posicion'];
		$nuevosPropietarios=$this->session->userdata('propietario');
		unset($nuevosPropietarios[$posicion]);
		$this->session->set_userdata('propietario', $nuevosPropietarios);
	redirect(base_url().'index.php/c_escribano/crearPropietario');	

	}


//Para editar la minuta rechazada

  	public function editarMinuta($idMinuta)
	{if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}
	
		//muestra las notificaciones
		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();

		$data['titulo'] = 'Bienvenido Escribano';
		
		$data['idMinutaEditar']=$idMinuta;
		$this->session->set_userdata('idMinutaEditar',$idMinuta);
		
		$data['fechaInscMinuta']=$this->M_escribano->getfechaInscMinuta($idMinuta);
		$data['motivoRechazo']=$this->M_escribano->getMinutaxId($idMinuta)->motivoRechazo;
		

		$data['parcelas']=$this->db->get_where('parcela', array('idMinuta'=>$idMinuta))->result();
		
		//var_dump($data["operador"]);
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/editarMinuta',$data);
		$this->load->view('templates/pie',$data);
	
	
		



	}

		public function editarParcela($idParcela,$exito=FALSE, $hizo_post=FALSE)
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

		if($this->input->post() && !$exito ){
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
			$data['superficie'] = $this->input->post('superficie'); 
		

		}else{
			$parcela=$this->db->get_where('parcela', array('idParcela'=>$idParcela))->row();
			$data['circunscripcion']=$parcela->circunscripcion;
			$data['seccion']=$parcela->seccion;
			$data['chacra']=$parcela->chacra;
			$data{'quinta'}=$parcela->quinta;
			$data{'fraccion'}=$parcela->fraccion;
			$data{'manzana'}=$parcela->manzana;
			$data{'parcela'}=$parcela->parcela;
			$data{'partida'}=$parcela->partida;
			$data{'planoAprobado'}=$parcela->planoAprobado;
			    $date=new DateTime($parcela->fechaPlanoAprobado);
                      $fecha_planoAprobado=$date->format('d/m/Y ');
                
			$data{'fechaPlanoAprobado'}=$fecha_planoAprobado;
			$data{'tipoPropiedad'}=$parcela->tipoPropiedad;
			$data{'tomo'}=$parcela->tomo;
			$data{'folio'}=$parcela->folio;
			$data{'finca'}=$parcela->finca;
			$data{'año'}=$parcela->año;
			$data{'localidades'}=$parcela->idLocalidad;
				 $localidad=$this->db->get_where('localidad', array('idLocalidad'=>$parcela->idLocalidad))->row();
			$data{'departamentos'}=$localidad->idDepartamento;;
			$data{'descripcion'}=$parcela->descripcion;
			$data{'nroMatriculaRPI'}=$parcela->nroMatriculaRPI;
			   $date=new DateTime($parcela->fechaMatriculaRPI);
                      $fecha_matriculaRPI=$date->format('d/m/Y ');
                     
			$data{'fechaMatriculaRPI'}=$fecha_matriculaRPI;
			$data['superficie'] =$parcela->superficie;
			$data['localidadPost']=$parcela->idLocalidad;
				$this->session->set_userdata('idParcelaEditar',$idParcela);
		
		}


		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/editarParcela',$data);
		$this->load->view('templates/pie',$data);
	}

	
	public function modificarParcela()	{
		$idParcela=$this->session->userdata('idParcelaEditar');
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
				
				$this->editarParcela($idParcela,FALSE,TRUE, FALSE);

			}else{

					$date1=str_replace('/','-',$this->input->post('fechaMatriculaRPI'));
				$date1=new DateTime($date1);
               $fechaMatriculaRPI=$date1->format('Y-m-d ');

            
				$date2=str_replace('/','-',$this->input->post('fechaPlanoAprobado'));
				$date2=new DateTime($date2);
               $fechaPlanoAprobado=$date2->format('Y-m-d ');
      




				$datos_parcela= array (
					'circunscripcion' => $this->input->post('circunscripcion'),
					'seccion' => $this->input->post('seccion'),
					'chacra' => $this->input->post('chacra'),
					'quinta' => $this->input->post('quinta'),
					'fraccion' => $this->input->post('fraccion'),
					'manzana' => $this->input->post('manzana'),
					'parcela' => $this->input->post('parcela'),
					'superficie' => $this->input->post('superficie'), 
					'partida' =>$this->input->post('partida'),					
					'tipoPropiedad' => $this->input->post('tipoPropiedad'),
					'planoAprobado' => $this->input->post('planoAprobado'),
					'fechaPlanoAprobado' => $fechaPlanoAprobado,
					'descripcion' => $this->input->post('descripcion'),					
					'idMinuta' => 	$this->session->userdata('idMinutaEditar'),		
					'nroMatriculaRPI' => $this->input->post('nroMatriculaRPI'),
					'fechaMatriculaRPI' => $fechaMatriculaRPI,
					'idLocalidad' => $this->input->post('localidades'),
					'tomo' => $this->input->post('tomo'),
					'folio' => $this->input->post('folio'),
					'finca' => $this->input->post('finca'),
					'año' => $this->input->post('año'),		
				);

				
				$this->db->where('idParcela', $idParcela);
				$this->db->update('parcela', $datos_parcela);
				
				$this->editarMinuta($this->session->userdata('idMinutaEditar'));
						
			}
		 }


	     public function editarPH($idRelacion,$exito=FALSE, $hizo_post=FALSE){

			if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}

         /*Variables para evitar que inserte una minuta y parcela cuando quiere agregar otro ph*/
		

        		$data["notificaciones_ma"]=$this->notificaciones_ma();
				$data["notificaciones_mr"]=$this->notificaciones_mr();
				$data["notificaciones_si"]=$this->notificaciones_si();
				$data['exito']= $exito; 
				$data['hizo_post']=$hizo_post;

		if($this->input->post() && !$exito){
			//seteo los demas input segun lo que ingreso anteriormente
			$data['ph'] = $this->input->post('ph');
			$data['fecha_escritura'] = $this->input->post('fecha_escritura');
			$data['nro_ucuf'] = $this->input->post('nro_ucuf');
			$data['tipo_ucuf'] = $this->input->post('tipo_ucuf');
			$data['plano_aprobado'] = $this->input->post('plano_aprobado');
			$data['fecha_plano_aprobado'] =$this->input->post('fecha_plano_aprobado');
			$data['porcentaje_ucuf'] = $this->input->post('porcentaje_ucuf');
			$data['poligonos'] = $this->input->post('poligonos');					
		

		}else{
		$relacion=$this->db->get_where('relacion', array('idRelacion'=>$idRelacion))->row();
			if($relacion->poligonos==null){
				$data['ph']='noph';
				$fechaPlanoAprobado='';
			}else {
				$data['ph']='ph';
				$date=new DateTime($relacion->fechaPlanoAprobado);
               $fechaPlanoAprobado=$date->format('d/m/Y ');

			};
			$date=new DateTime($relacion->fechaEscritura);
               $fechaEscritura=$date->format('d/m/Y ');
			$data['fecha_escritura']=$fechaEscritura;
			$data['nro_ucuf']= $relacion->nroUfUc;
			$data['tipo_ucuf']=$relacion->tipoUfUc;
			 
			$data['plano_aprobado']= $relacion->planoAprobado;
			
			$data['fecha_plano_aprobado']= $fechaPlanoAprobado;
			$data['porcentaje_ucuf']= $relacion->porcentajeUfUc;
			$data['poligonos']=$relacion->poligonos;		
			$this->session->set_userdata('idParcelaEditar',$relacion->idParcela);
			$this->session->set_userdata('idRelacionEditar',$relacion->idRelacion);

		}
		
		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/editarRelacion',$data);
		$this->load->view('templates/pie',$data);

	}

     public function modificarPH(){
     		$idRelacion=$this->session->userdata('idRelacionEditar');
				$hizo_post=TRUE;

				 $this->load->helper(array('form', 'url'));
                 //set_reules(nombre del campo, mensaje a mostrar, reglas de validacion)
                 if($this->input->post('ph')=='noph'){
			    $this->form_validation->set_rules('fecha_escritura', 'fecha_escritura', 'required',array('required' => 'Debes ingresar una fecha de escritura') );
			    }else{
 			    $this->form_validation->set_rules('fecha_escritura', 'fecha_escritura', 'required',array('required' => 'Debes ingresar una fecha de escritura') );
			    $this->form_validation->set_rules('nro_ucuf', 'nro_ucuf', 'required',array('required' => 'Debes ingresar un número ') );
				$this->form_validation->set_rules('tipo_ucuf', 'tipo_ucuf','required|callback_check_tipoucuf');
				$this->form_validation->set_message('check_tipoucuf', 'Debes seleccionar un tipo');
			    $this->form_validation->set_rules('plano_aprobado', 'plano_aprobado', 'required',array('required' => 'Debes ingresar un nro de plano ') );
			    $this->form_validation->set_rules('fecha_plano_aprobado', 'fecha_plano_aprobado', 'required',array('required' => 'Debes ingresar una fecha ') );
			    $this->form_validation->set_rules('porcentaje_ucuf', 'porcentaje_ucuf', 'required',array('required' => 'Debes ingresar un porcentaje ') );
			    $this->form_validation->set_rules('poligonos', 'poligonos', 'required',array('required' => 'Debes ingresar un poligono ') );}

			   
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->editarPH(FALSE,TRUE);

			} else{
                  
			$date1=str_replace('/','-',$this->input->post('fecha_escritura'));
				$date1=new DateTime($date1);
               $fechaEscritura=$date1->format('Y-m-d ');

            
				$date2=str_replace('/','-',$this->input->post('fecha_plano_aprobado'));
				$date2=new DateTime($date2);
               $fechaPlanoAprobado=$date2->format('Y-m-d ');
      
				$datos_ph= array (
					'fechaEscritura' => $fechaEscritura,
					'nroUfUc' => $this->input->post('nro_ucuf'),
					'tipoUfUc' => $this->input->post('tipo_ucuf'),
					'planoAprobado' => $this->input->post('plano_aprobado'),
					'fechaPlanoAprobado' => $fechaPlanoAprobado,
					'porcentajeUfUc' => $this->input->post('porcentaje_ucuf'),
					'poligonos' => $this->input->post('poligonos'), 


				);
				 	
						$this->db->where('idRelacion', $idRelacion);
						$this->db->update('relacion', $datos_ph);

					$this->editarMinuta($this->session->userdata('idMinutaEditar'));	
			}

     }	

	public function editarPropietario($idPropietario,$exito=FALSE, $hizo_post=FALSE)
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'escribano')
		{
			redirect(base_url().'index.php/c_login_escribano');
		}

		$data["notificaciones_ma"]=$this->notificaciones_ma();
		$data["notificaciones_mr"]=$this->notificaciones_mr();
		$data["notificaciones_si"]=$this->notificaciones_si();
		$data['arraydepartamentos'] = $this->M_escribano->getDepartamentos();
		$data["personas"] = $this->M_escribano->getPersonas();
		$data['exito']= $exito; 
		$data['hizo_post']=$hizo_post;
		$data['titulo'] = 'Bienvenido Escribano';
		

			if($this->input->post() && !$exito){
			//seteo los demas input segun lo que ingreso anteriormente
			$data['propietario'] = $this->input->post('propietario');	
			$data['porcentaje_condominio'] = $this->input->post('porcentaje_condominio');
			$data['tipo_propietario'] = $this->input->post('tipo_propietario');
			$data['empresa'] = $this->input->post('empresa');
			$data['nombreyapellido'] = $this->input->post('nombreyapellido');
			$data['sexo_combobox']=$this->input->post('sexo_combobox');
			$data['dni']=$this->input->post('dni');
			$data['cuit'] = $this->input->post('cuit');
			$data['cuil'] = $this->input->post('cuil');
			$data['conyuge'] = $this->input->post('conyuge');
			$data['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
			$data['direccion'] =$this->input->post('direccion');
			$data['departamentos'] = $this->input->post('departamentos');
			$data['localidades'] = $this->input->post('localidades');			


		}else{
				$propietario=$this->db->get_where('propietario', array('id'=>$idPropietario))->row();
				$persona=$this->db->get_where('persona', array('idPersona'=>$propietario->idPersona))->row();
			$data['propietario']=$persona->empresa;
			$data['tipo_propietario']=$propietario->tipoPropietario;
			$data['porcentaje_condominio']=$propietario->porcentajeCondominio;
			$data['nombreyapellido']=$persona->apynom;
				$data['sexo_combobox']='';
			$data['dni']=$persona->dni;
			if (	$data['propietario']=$persona->empresa=='O') {
				$data['cuit']=$persona->cuitCuil;
				$data['cuil']='';
			}else{
					$data['cuil']=$persona->cuitCuil;
					$data['cuit']='';}

			
			$data['conyuge']=$persona->conyuge;
			$date=new DateTime($persona->fechaNac);
              $fechaNac=$date->format('d/m/Y ');
			$data['fecha_nacimiento']=$fechaNac;
			$data['direccion']=$persona->direccion;
				 $localidad=$this->db->get_where('localidad', array('idLocalidad'=>$persona->idLocalidad))->row();

			$data['departamentos']= $localidad->idDepartamento;
			$data['localidades']=$persona->idLocalidad;
			
			$this->session->set_userdata('idPropietarioEditar',$propietario->id);
				$this->session->set_userdata('idPersonaEditar',$persona->idPersona);

		}

		$this->load->view('templates/cabecera_escribano',$data);
		$this->load->view('templates/escri_menu',$data);
		$this->load->view('escribano/editarPropietario',$data);
		$this->load->view('templates/pie',$data);

	}

	 public function modificarPropietario(){
	 	$idPropietario=$this->session->userdata('idPropietarioEditar');
	 		$idPersona=$this->session->userdata('idPersonaEditar');
				$hizo_post=TRUE;

				 $this->load->helper(array('form', 'url'));
                 //set_reules(nombre del campo, mensaje a mostrar, reglas de validacion)
                 if($this->input->post('propietario')=='P'){
			   		 $this->form_validation->set_rules('porcentaje_condominio', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar porcentaje de codominio') );
			  	    $this->form_validation->set_rules('nombreyapellido', 'nombreyapellido', 'required',array('required' => 'Debes ingresar una fecha de escritura') );
			  	    $this->form_validation->set_rules('tipo_propietario', 'tipo_propietario', 'required') ;
			  	    $this->form_validation->set_rules('sexo_combobox', 'sexo_combobox', 'required',array('required' => 'Debes seleccionar tipo de sexo ') );
					$this->form_validation->set_rules('dni', 'dni','required',array('required' => 'Debes ingresar un dni ') );
					/*$this->form_validation->set_rules('conyuge', 'conyuge','required',array('required' => 'Debes ingresar un conyuge ') );*/
					$this->form_validation->set_rules('direccion', 'direccion','required',array('required' => 'Debes ingresar una direccion ') );
			   		$this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required',array('required' => 'Debes ingresar una fecha ') );
			   		$this->form_validation->set_rules('departamentos','departamentos','required|callback_check_departamento');
  					$this->form_validation->set_message('check_departamento', 'Debes seleccionar un departamento');
					$this->form_validation->set_rules('localidades','localidades','required|callback_check_localidad');
  					$this->form_validation->set_message('check_localidad', 'Debes seleccionar una localidad');    }
  				else{
  					 $this->form_validation->set_rules('porcentaje_condominio', 'porcentaje_condominio', 'required',array('required' => 'Debes ingresar porcentaje de codominio') );
  					$this->form_validation->set_rules('tipo_propietario', 'tipo_propietario', 'required');
 			   		$this->form_validation->set_rules('nombreyapellido', 'nombreyapellido', 'required',array('required' => 'Debes ingresar un nombre y apellido') );
			   		$this->form_validation->set_rules('cuit', 'cuit', 'required',array('required' => 'Debes ingresar un cuit ') );
					$this->form_validation->set_rules('direccion', 'direccion','required',array('required' => 'Debes ingresar una direccion ') );
			   		$this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required',array('required' => 'Debes ingresar una fecha ') );
			   		$this->form_validation->set_rules('departamentos','departamentos','required|callback_check_departamento');
  					$this->form_validation->set_message('check_departamento', 'Debes seleccionar un departamento');
					$this->form_validation->set_rules('localidades','localidades','required|callback_check_localidad');
  					$this->form_validation->set_message('check_localidad', 'Debes seleccionar una localidad');
			    }

			   
			if($this->form_validation->run() == FALSE)
			{	
				
				$this->editarPropietario($idPropietario,FALSE,TRUE);

			} else{

               
			    	
			    $date2=str_replace('/','-',$this->input->post('fecha_nacimiento'));
				$date2=new DateTime($date2);
               $fecha_nacimiento=$date2->format('Y-m-d ');

			    		$datos_propietario= array (
			    		
			    	'tipoPropietario' => $this->input->post('tipo_propietario'),
					'porcentajeCondominio' => $this->input->post('porcentaje_condominio'),
					);

			    		$datos_persona=array(
			    	'empresa' => $this->input->post('propietario'),	
			    	'apynom' => $this->input->post('nombreyapellido'),
					'dni' => $this->input->post('dni'),
					'cuitCuil' => $this->input->post('cuit'),
					'direccion' => $this->input->post('direccion'),
					'conyuge' => $this->input->post('conyuge'),
					'fechaNac' => $fecha_nacimiento,
					'idLocalidad' => $this->input->post('localidades'),	
			    			);

			    		$this->db->where('id', $idPropietario);
						$this->db->update('propietario', $datos_propietario);

						$this->db->where('idPersona', $idPersona);
						$this->db->update('persona', $datos_persona);
						


						

				}
				$this->editarMinuta($this->session->userdata('idMinutaEditar'));

				        					

			}

		public function finalizarEdicion($idMinuta){
			$datetime_variable = new DateTime();
				$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');

			$data = array(
			   'idMinuta' => $idMinuta ,
			   'estadoMinuta' => 'P' ,
			  'fechaEstado'=>$datetime_formatted ,
			);

			$this->db->insert('estadominuta', $data); 
			$this->verMinutas();
		}

    public  function nuevaParcela(){

     }

    public function nuevoPH(){

    }
       public function nuevoPropietario(){

    }
    public function eliminarPH($idRelacion){
    			
    					$this->db->delete('propietario', array('idRelacion' => $idRelacion)); 
    					$this->editarMinuta($this->session->userdata('idMinutaEditar'));

    			
    }
       public function eliminarParcela($idParcela){
       		   	$relaciones=$this->db->get_where('relacion ', array('idParcela'=>$idParcela))->result();

       						foreach ($relaciones as $r) {
       							$this->db->delete('propietario', array('idRelacion' => $r->idRelacion)); 

       						}
       						$this->db->delete('relacion', array('idParcela' => $idParcela)); 
       							$this->db->delete('parcela', array('idParcela' => $idParcela)); 
       						$this->editarMinuta($this->session->userdata('idMinutaEditar'));

    }
    public function eliminarPropietario($idPropietario){

    					$this->db->delete('propietario', array('id' => $idPropietario)); 

    						$this->editarMinuta($this->session->userdata('idMinutaEditar'));

    }


}
