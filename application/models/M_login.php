
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
		$this->db->where('usuario',$usuario);
		$this->db->where('contraseña',sha1($contraseña));
		$this->db->where('tipoUsuario','O');
		$query = $this->db->get('usuariosys');
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos: '.$usuario.' '.$contraseña);
			redirect(base_url().'index.php/c_login_operador','refresh');
		}
	}

	public function login_administrador($usuario,$contraseña)
	{
		$this->db->where('usuario',$usuario);
		$this->db->where('contraseña',sha1($contraseña));
		$this->db->where('tipoUsuario','A');
		$query = $this->db->get('usuariosys');
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos: '.$usuario.' '.$contraseña);
			redirect(base_url().'index.php/c_login_administrador','refresh');
		}
	}
	public function login_escribano($usuario,$contraseña)
	{
		$this->db->where('usuario',$usuario);
		$this->db->where('contraseña',sha1($contraseña));
		$this->db->where('estadoAprobacion','A');
		$query = $this->db->get('usuarioescribano');
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos: '.$usuario.' '.$contraseña);
			redirect(base_url().'index.php/c_login_escribano','refresh');
		}
	}
}
