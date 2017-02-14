<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class C_loginop extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	
	}
	
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login');
		}
		$data['titulo'] = 'Bienvenido Escribano';
		$this->load->view('templates/cabecera',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('home/operador',$data);
		$this->load->view('templates/pie',$data);
	}

	public function reg_pen()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login');
		}

		$esc_pen=$this->db->get_where('usuarioescribano', array('estadoAprobacion'=>'p'))->result();
		$data['esc_pen']=$esc_pen;
		
		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera',$data);
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
               'estadoAprobacion' => "a",
              
            );

		$this->db->where('idEscribano', $idEscribano);
		$this->db->update('usuarioescribano', $data); 

      }
      public function rechazar_esc(){
      		$idEscribano=$_POST["idEscribano"];
      		$motivoRechazo=$_POST["motivoRechazo"];
      		$data = array(
               'estadoAprobacion' => "r",
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
			redirect(base_url().'index.php/c_login');
		}

		$esc_pen=$this->db->get_where('usuarioescribano', array('estadoAprobacion'=>'a'))->result();
		$data['esc_pen']=$esc_pen;
		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/registraciones_aprobadas',$data);
		$this->load->view('templates/pie',$data);
	}
	public function reg_rech()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'operador')
		{
			redirect(base_url().'index.php/c_login');
		}

		$esc_pen=$this->db->get_where('usuarioescribano', array('estadoAprobacion'=>'r'))->result();
		$data['esc_pen']=$esc_pen;
		$data['titulo'] = 'Bienvenido Operador';
		$this->load->view('templates/cabecera',$data);
		$this->load->view('templates/operador_menu',$data);
		$this->load->view('operador/registraciones_rechazadas',$data);
		$this->load->view('templates/pie',$data);
	}

}