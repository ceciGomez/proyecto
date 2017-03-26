<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class M_login extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	

	public function login_operador($usuario,$contraseña)
	{
		try {
		$pass = sha1($contraseña);
		$query = $this->db->query("
			SELECT idUsuario, nomyap, usuario, contraseña, 
			concat(substring(fechaReg, 9, 2), '/' ,substring(fechaReg, 6, 2) , '/', substring(fechaReg, 1, 4)) as fechaReg,	
			telefono, email, direccion, tipoUsuario, foto
			
			FROM usuariosys 
			WHERE usuario = '$usuario'
			and contraseña = '$pass'
			and tipoUsuario = 'O'
			and baja='0'
			");
		
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos ');
			redirect(base_url().'index.php/c_login_operador','refresh');
		}
		} catch (Exception $e) {
			return false;
		}
	}

	public function login_administrador($usuario,$contraseña)
	{
		try {
		$pass = sha1($contraseña);
		$query = $this->db->query("
			SELECT idUsuario, nomyap, usuario, contraseña, 
			concat(substring(fechaReg, 9, 2), '/' ,substring(fechaReg, 6, 2) , '/', substring(fechaReg, 1, 4)) as fechaReg,
			telefono, email, direccion, tipoUsuario, foto
			FROM usuariosys 
			WHERE usuario = '$usuario'
			and contraseña = '$pass'
			and tipoUsuario = 'A'
			and baja='0'

			");
		
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos ');
			redirect(base_url().'index.php/c_login_administrador','refresh');
		}
		} catch (Exception $e) {
			return false;
		}
	}


	public function login_escribano($usuario,$contraseña)
	{
		try {
		$pass = sha1($contraseña);
		$query = $this->db->query("
			SELECT idEscribano, nomyap, usuario, contraseña, 
			concat(substring(fechaReg, 9, 2), '/' ,substring(fechaReg, 6, 2) , '/', substring(fechaReg, 1, 4)) as fechaReg, matricula,
			telefono, email, direccion, foto
			FROM usuarioescribano 
			WHERE usuario = '$usuario'
			and contraseña = '$pass'
			and estadoAprobacion = 'A'
			and baja='0'

			");
		
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$pass = sha1($contraseña);
			$query = $this->db->query("
			SELECT idEscribano, nomyap, usuario, contraseña, 
			concat(substring(fechaReg, 9, 2), '/' ,substring(fechaReg, 6, 2) , '/', substring(fechaReg, 1, 4)) as fechaReg, matricula,
			telefono, email, direccion, foto
			FROM usuarioescribano 
			WHERE usuario = '$usuario'
			and contraseña = '$pass'
			and estadoAprobacion = 'P'
			and baja='0'

			");
			if($query->num_rows() == 1){
				$this->session->set_flashdata('usuario_incorrecto','Escribano con registración pendiente de aprobacion');
				redirect(base_url().'index.php/c_login_escribano','refresh');
			}else{


		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$pass = sha1($contraseña);
			$query = $this->db->query("
			SELECT idEscribano, nomyap, usuario, contraseña, 
			concat(substring(fechaReg, 9, 2), '/' ,substring(fechaReg, 6, 2) , '/', substring(fechaReg, 1, 4)) as fechaReg, matricula,
			telefono, email, direccion, foto, motivoRechazo
			FROM usuarioescribano 
			WHERE usuario = '$usuario'
			and contraseña = '$pass'
			and estadoAprobacion = 'R'
			and baja='0'

			");
			if($query->num_rows() == 1){
				$this->session->set_flashdata('usuario_incorrecto','La registracion del escribano fue rechazada por el siguiente motivo: '.$query->row()->motivoRechazo);
				redirect(base_url().'index.php/c_login_escribano','refresh');
			}else {
				$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
				redirect(base_url().'index.php/c_login_escribano','refresh');
			}

			}


			
		}
		}
		} catch (Exception $e) {
			return false;
		}
	}

	
}
