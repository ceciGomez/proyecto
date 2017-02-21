<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class C_operador extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	
	}
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$data['titulo'] = 'Bienvenido Escribano';
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('home/operador',$data);
		$this->load->view('templates/pie',$data);
	}

	public function reg_pen()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}

		$esc_pen=$this->db->get_where('usuarioescribano', array('estadoAprobacion'=>'P'))->result();
		$data['esc_pen']=$esc_pen;
		
		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_operador',$data);
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
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}

		$esc_apro=$this->db->get_where('usuarioescribano', array('estadoAprobacion'=>'A'))->result();
		$data['esc_apro']=$esc_apro;
		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/registraciones_aprobadas',$data);
		$this->load->view('templates/pie',$data);
	}

	public function reg_rech()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}

		$esc_rech=$this->db->get_where('usuarioescribano', array('estadoAprobacion'=>'R'))->result();
		$data['esc_rech']=$esc_rech;
		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/registraciones_rechazadas',$data);
		$this->load->view('templates/pie',$data);
	}

	public function ver_minutasPendientes()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$this->db->select('*');
		$this->db->from('estadominuta');
		$this->db->join('minuta', 'minuta.idMinuta = estadominuta.idMinuta');
		$this->db->join('usuarioescribano', 'usuarioescribano.idEscribano = minuta.idEscribano');
		$this->db->order_by('estadominuta.fechaEstado', 'ASC');
		$this->db->where('estadominuta.estadoMinuta', 'P');

		$data['minutas']= $this->db->get()->result();

		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/minutas_pendientes',$data);
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
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login_operador');
		}
		$this->db->select('*');
		$this->db->from('minuta');
		$this->db->join('usuarioescribano', 'usuarioescribano.idEscribano = minuta.idEscribano');
		

		$data['minutas']= $this->db->get()->result();

		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera_operador',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/ver_minutas',$data);
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
                          <td>$e->idEstadoMinuta</td>  
                        	<td>  $e->estadoMinuta</td>
                            <td> $e->motivoRechazo</td>
                            <td>  $e->fechaEstado</td>
                            <td> $e->idUsuario</td>
                          	<td> $usuario->nomyap</td>
                       </tr>
                         "; 
	
					}
			else {
				 echo " <tr>
                          <td>$e->idEstadoMinuta</td>  
                        	<td>  $e->estadoMinuta</td>
                            <td> $e->motivoRechazo</td>
                            <td>  $e->fechaEstado</td>
                            <td> $e->idUsuario</td>
                          	<td>       </td>
                       </tr>	";
			}

					 }

			

	}

}