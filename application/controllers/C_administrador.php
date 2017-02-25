<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_administrador extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }



	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'Administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		$data['titulo'] = 'Bienvenido Administrador';
		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('home/admin',$data);
		$this->load->view('templates/pie',$data);
	}
	
	public function verOperadores()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		$data['titulo'] = 'Bienvenido Administrador';
		

		$data["operadores"] = $this->M_administrador->getOperadores();

		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/verOperadores',$data);
		$this->load->view('templates/pie',$data);
	}
	
	public function verEscribanos()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		$data['titulo'] = 'Bienvenido Administrador';
		

		$data["escribanos"] = $this->M_administrador->getEscribanos();

		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/verEscribanos',$data);
		$this->load->view('templates/pie',$data);
	}


	public function editarOperador($param="")
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
	

		$data['titulo'] = 'Bienvenido Administrador';
		$data["operador"] = $this->M_administrador->getUnOperador($param);
		//var_dump($data["operador"]);
		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/editarOperador',$data);
		$this->load->view('templates/pie',$data);
	}

	public function actualizarOperador()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		
		$idUsuario = $this->input->post("idUsuario");
		$operadorAct= array(
			//Nombre del campo en la bd -----> valor del campo name en la vista
			'nomyap' => $this->input->post("nomyap"),
			'usuario' => $this->input->post("usuario"),	
			'contraseña' => $this->input->post("contraseña"),	
			'dni' => $this->input->post("dni"),	
			'telefono' => $this->input->post("telefono"),
			'direccion' => $this->input->post("direccion"),	
			'idLocalidad' => $this->input->post('localidad'),	
			);

		
		$ctrl=$this->M_administrador->actualizarOperador($operadorAct,$idUsuario);

		$data['titulo'] = 'Bienvenido Administrador';
		

		//Si se inserto correcto la vble $ctrl devuelve true y redirije a la pagina con los mismos datos
		//deberia ir a la pagina de veroperador 
		if ($ctrl) {
			redirect('c_administrador/verOperadores');

		} else {
			//Si no se guardo correctamente entonces queda en la pagina para realizar los cambios
			redirect('','refresh');
		}
	}

	public function eliminar_op(){
      	$idUsuario=$_POST["idUsuario"];
		$this->db->where('idUsuario', $idUsuario);
		$this->db->delete('usuariosys'); 

      }




	public function editarEscribano($param="")
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
	

		$data['titulo'] = 'Bienvenido Administrador';
		$data["escribano"] = $this->M_escribano->getUnEscribano($param);
		//var_dump($data["operador"]);
		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/editarEscribano',$data);
		$this->load->view('templates/pie',$data);
	}

	public function actualizarEscribano()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		
		$idEscribano = $this->input->post("idEscribano");
		$escribanoAct= array(
			//Nombre del campo en la bd -----> valor del campo name en la vista
			'nomyap' => $this->input->post("nomyap"),
			'usuario' => $this->input->post("usuario"),	
			'contraseña' => $this->input->post("contraseña"),	
			'dni' => $this->input->post("dni"),	
			'telefono' => $this->input->post("telefono"),
			'direccion' => $this->input->post("direccion"),	
			'idLocalidad' => $this->input->post('localidad'),	
			'matricula' => $this->input->post('matricula'),
			'estadoAprobacion' => $this->input->post('estadoAprobacion'),	
	


			);

		
		$ctrl=$this->M_administrador->actualizarEscribano($escribanoAct,$idEscribano);

		$data['titulo'] = 'Bienvenido Administrador';
		

		//Si se inserto correcto la vble $ctrl devuelve true y redirije a la pagina con los mismos datos
		//deberia ir a la pagina de veroperador 
		if ($ctrl) {
			redirect('c_administrador/verEscribanos');

		} else {
			//Si no se guardo correctamente entonces queda en la pagina para realizar los cambios
			redirect('','refresh');
		}
	}

	public function eliminar_es(){
      	$idUsuario=$_POST["idEscribano"];
		$this->db->where('idEscribano', $idEscribano);
		$this->db->delete('usuarioescribano'); 

      }

//para el menu minutas

	public function reg_pen()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}

		$esc_pen=$this->db->get_where('usuarioescribano', array('estadoAprobacion'=>'P'))->result();
		$data['esc_pen']=$esc_pen;
		
		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/registraciones_pendientes',$data);
		$this->load->view('templates/pie',$data);
	}

	public function detalles_esc(){
			$idEscribano=$_POST["idEscribano"];
			$esc=$this->db->get_where('usuarioescribano', array('idEscribano'=>$idEscribano))->row();
			 echo " <tr>
                          <td>$esc->nomyap</td>  
                        	<td>  $esc->usuario</td>
                            <td> $esc->dni</td>
                            <td>  $esc->matricula</td>
                            <td> $esc->direccion</td>
                            <td> $esc->email</td>
                            <td> $esc->telefono</td>
                            <td>$esc->estadoAprobacion</td>
                       </tr>
                         "; 
                         }
      public function aceptar_esc(){
      	$idEscribano=$_POST["idEscribano"];
      		$data = array(
               'estadoAprobacion' => "A",
              
            );

		$this->db->where('idEscribano', $idEscribano);
		$this->db->update('usuarioescribano', $data); 

      }
      public function rechazar_esc(){
      		$idEscribano=$_POST["idEscribano"];
      		$motivoRechazo=$_POST["motivoRechazo"];
      		$data = array(
               'estadoAprobacion' => "R",
              	'motivoRechazo' =>"$motivoRechazo"
            );

		$this->db->where('idEscribano', $idEscribano);
		$this->db->update('usuarioescribano', $data); 

      }
      
      public function eliminar_esc(){
      	$idEscribano=$_POST["idEscribano"];
      		

		$this->db->where('idEscribano', $idEscribano);
		$this->db->delete('usuarioescribano'); 

      }
		

	public function reg_apro()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}

		$esc_apro=$this->db->get_where('usuarioescribano', array('estadoAprobacion'=>'A'))->result();
		$data['esc_apro']=$esc_apro;
		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/registraciones_aprobadas',$data);
		$this->load->view('templates/pie',$data);
	}

	public function reg_rech()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}

		$esc_rech=$this->db->get_where('usuarioescribano', array('estadoAprobacion'=>'R'))->result();
		$data['esc_rech']=$esc_rech;
		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/registraciones_rechazadas',$data);
		$this->load->view('templates/pie',$data);
	}

	public function ver_minutasPendientes()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		$this->db->select('*');
		$this->db->from('estadominuta');
		$this->db->join('minuta', 'minuta.idMinuta = estadominuta.idMinuta');
		$this->db->join('usuarioescribano', 'usuarioescribano.idEscribano = minuta.idEscribano');
		$this->db->order_by('estadominuta.fechaEstado', 'ASC');
		$this->db->where('estadominuta.estadoMinuta', 'P');

		$data['minutas']= $this->db->get()->result();

		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/minutas_pendientes',$data);
		$this->load->view('templates/pie',$data);
	}

	public function detalles_minuta(){


		$idMinuta=$_POST['idMinuta'];
		$minuta = $this->M_escribano->getUnaMinuta($idMinuta);
		$idEscribano = $minuta[0]->idEscribano;
		$unEscribano = $this->M_escribano->getUnEscribano($idEscribano);
		$idMinuta = $minuta[0]->idMinuta;
		$parcelas =$this->M_escribano->getParcelas($idMinuta);
		echo "
			  <article>
         <!-- Titulo -->
         <h2 class='page-header' align='center'><i><b>Minuta de Inscripción de Titulo</b></i>
         </h2>
         <p align='justify'>
            Departamento  <strong>".$unEscribano[0]->nombreDpto.".</strong>
            - Provincia de <strong>".$unEscribano[0]->nombreProv.".</strong><br>
            FUNCIONARIO AUTORIZANTE: Esc: <strong>  ".$unEscribano[0]->nomyap.".</strong><br>";
          foreach ($parcelas as $value) { 
          	echo" <br>
            BIEN: <strong> ".$value->descripcion."</strong>.<br>
            <br>";
           	$propietarios = $this->M_escribano->getPropietarios($value->idParcela); 
            foreach ( $propietarios as $key) { 
               $nroProp = 0;
               if ($key->tipoPropietario == 'A'): echo "ADQUIRIENTE: <br>";
               endif ;
               if  ($key->tipoPropietario == 'T'): echo  "TRANSMITENTE: <br>"; endif; 
           		echo" NRO UF/UC: <strong>";
           		 if ($key->nroUfUc == NULL) echo '-------';  else echo $key->nroUfUc ; 
           		 echo"-" ;
           		 echo $key->tipoUfUc;
           		 echo "</strong>Fecha de Escritura: <strong>";
           		 if ($key->fechaEscritura == NULL) echo '-------';  else echo $key->fechaEscritura ;
           		 echo".</strong>Nombre y Apellido: <strong>";
           		 if ($key->titular == NULL) echo '-------';  else echo $key->titular ;
           		 echo".</strong>Cuit - Cuil: <strong>";
           		  if ($key->cuitCuil == NULL) echo '-------';  else echo $key->cuitCuil ;
           		  echo"</strong>Direccion: <strong>";
           		   if ($key->direccion == NULL) echo '-------';  else echo $key->direccion; 
           		   echo".</strong> Plano Aprobado: <strong>";
           		   if ($key->planoAprobado == NULL) echo '-------';  else echo $key->planoAprobado ;
           		   echo".</strong>Fecha de Plano Aprobado: <strong>";
           		    if ($key->fechaPlanoAprobado == NULL) echo '-------';  else echo $key->fechaPlanoAprobado ;
           		    echo".</strong> Poligonos: <strong>";
           		    if ($key->poligonos == NULL) echo '-------';  else echo $key->poligonos ;
           		    echo".</strong> Porcentaje de Uf/Uc: <strong>";
           		     if ($key->porcentajeUfUc == NULL) echo '-------';  else echo $key->porcentajeUfUc ;
           		     echo".</strong><br>Asentimiento Conyugal: <strong>";
           		      if ($key->conyuge == NULL) echo '-------';  else echo $key->conyuge ;
           		      echo".</strong><br>";
          										} 
              } 
        echo" </p></article>";
     	}

		  public function rechazar_min	(){
		      		$idEstadoMinuta=$_POST["idEstadoMinuta"];
		      		$motivoRechazo=$_POST["motivoRechazo"];
		      		$datetime_variable = new DateTime();
					$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
		      		$data = array(
		               'estadoMinuta' => "R",
		              	'motivoRechazo' =>"$motivoRechazo",
		              	'idUsuario'=>$this->session->userdata('idUsuario'),
		              	'fechaEstado'=> $datetime_formatted 
		            );

				$this->db->where('idEstadoMinuta', $idEstadoMinuta);
				$this->db->update('estadominuta', $data); 

		      }

		   public function aceptar_min(){
				$idEstadoMinuta=$_POST["idEstadoMinuta"];
				$datetime_variable = new DateTime();
				$datetime_formatted = date_format($datetime_variable, 'Y-m-d H:i:s');
		      		$data = array(
		               'estadoMinuta' => "A",
			           	'idUsuario'=>$this->session->userdata('idUsuario'),
			           	'fechaEstado'=> $datetime_formatted 
		              
		            );

				$this->db->where('idEstadoMinuta', $idEstadoMinuta);
				$this->db->update('estadominuta', $data); 

      }

      public function ver_minutas()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'index.php/c_login_administrador');
		}
		$this->db->select('*');
		$this->db->from('minuta');
		$this->db->join('usuarioescribano', 'usuarioescribano.idEscribano = minuta.idEscribano');
		

		$data['minutas']= $this->db->get()->result();

		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_administrador',$data);
		$this->load->view('templates/admin_menu',$data);
		$this->load->view('administrador/ver_minutas',$data);
		$this->load->view('templates/pie',$data);
	}

	public function ver_estados(){
		$idMinuta=$_POST['idMinuta'];
		$estadoMinuta=$this->db->get_where('estadominuta', array('idMinuta'=>$idMinuta))->result();
		foreach ($estadoMinuta as $e) {
			$idUsuario=$e->idUsuario;
			if ($idUsuario!=null){
			$usuario=$this->db->get_where('usuariosys', array('idUsuario'=>$idUsuario))->row();
				 echo " <tr>
				 		    <td>  $e->fechaEstado</td>
  							<td>  $e->estadoMinuta</td>
                            <td> $e->motivoRechazo</td>
 							<td> $usuario->nomyap</td>
                       </tr>
                         "; 
	
					}
			else {
				 echo " <tr>
                         <td>  $e->fechaEstado</td>
  							<td>  $e->estadoMinuta</td>
                            <td> $e->motivoRechazo</td>
 							<td> </td>
                       </tr>	";
			}

					 }

			

	}
//para obtener las localidades
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
