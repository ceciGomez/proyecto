<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_administrador extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
	}

	public function getOperadores(){
		$this->db->where('tipoUsuario',"O");
		$operadores =$this->db->get("usuariosys")->result();
		return $operadores;
	}

	public function getEscribanos(){

		$escribanos =$this->db->get("usuarioescribano")->result();
		return $escribanos;
	}

	public function getUnOperador($idUsuario)
	{
		try {
			$query = $this->db->query("
				SELECT *
				FROM usuariosys u
				where u.idUsuario = $idUsuario
				");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}	
		}

	public function actualizarOperador($operador,$id)
	{
		try{
			$this->db->where('idUsuario',$id);
			return $this->db->UPDATE('usuariosys',$operador);

			} catch (Exception $e) {
			return false;
		}

		}


	public function actualizarEscribano($escribano,$id)
	{
		try{
			$this->db->where('idEscribano',$id);
			return $this->db->UPDATE('usuarioEscribano',$escribano);

			} catch (Exception $e) {
			return false;
		}

		}

	public function getUnaMinuta($idMinuta)
	{
		try {
			$query = $this->db->query("
				SELECT idMinuta, idEscribano, idUsuario, fechaIngresoSys, fechaEdicion
				FROM minuta m
				where m.idMinuta = $idMinuta
				");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	
	}
	public function getUnEscribano($idEscribano)
	{
		try {
			$query = $this->db->query("
				SELECT u.nomyap, u.usuario, u.fechaReg, u.email, u.dni, u.direccion, u.telefono, l.nombre  as nombreLocalidad, d.nombre as nombreDpto, p.nombre as nombreProv
				FROM usuarioescribano u inner join localidad  l
				on  l.idLocalidad = u.idLocalidad
				inner join departamento d
				on d.idDepartamento = l.idDepartamento
				inner join provincia p
				on p.idProvincia = d.idProvincia
				WHERE idEscribano = $idEscribano
				");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}

	public function getUnAdmin($idAdmin)
	{
		try {
			$query = $this->db->query("
				SELECT idUsuario, nomyap, usuario, contraseña,
				concat(substring(fechaReg, 9, 2), '/' ,substring(fechaReg, 6, 2) , '/', substring(fechaReg, 1, 4)) as fechaReg, 
				dni, telefono, direccion, email, u.idLocalidad as idLocalidad, l.nombre as localidad, tipoUsuario, foto, baja 
				FROM usuariosys u inner join localidad l on l.idLocalidad = u.idLocalidad
				where idUsuario = $idAdmin
				");
			return $query->result();
		} catch (Exception $e) {
			return FALSE;
		}
	}

		public function actualizarAdministrador($operador,$id)
	{
		try{
			$this->db->where('idUsuario',$id);
			return $this->db->UPDATE('usuariosys',$operador);

			} catch (Exception $e) {
			return false;
		}

		}
	public function actualizarFoto($usuario, $idUsuario)
 	{
 		try{
			$this->db->where('idUsuario',$idUsuario);
			$this->db->UPDATE('usuariosys',$usuario);
			return TRUE;

			} catch (Exception $e) {
			return false;
		}
 	}


}


