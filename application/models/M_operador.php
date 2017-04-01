<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_operador extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
	}

	public function getEscribanos(){

		try {
			$query = $this->db->query("

				select case 
					when estadoAprobacion = 'P' then 0
					when estadoAprobacion = 'A' then 1
					when estadoAprobacion = 'R' then 2 else 3 end
				as id, 
				case 
					when estadoAprobacion = 'P' then 'Pendiente'
					when estadoAprobacion = 'A' then 'Aceptado'
					when estadoAprobacion = 'R' then 'Rechazado' else '' end
				as descEstado,
				u.*
				from usuarioescribano u
			

				order by id asc

				");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}


	public function actualizarEscribano($escribano,$id)
	{
		try{
			$this->db->where('idEscribano',$id);
			return $this->db->UPDATE('usuarioescribano',$escribano);

			} catch (Exception $e) {
			return false;
		}

		}
	public function getUnOperador($idOperador)
	{
		try {
			$query = $this->db->query("
				SELECT idUsuario, nomyap, usuario, contraseña,
				concat(substring(fechaReg, 9, 2), '/' ,substring(fechaReg, 6, 2) , '/', substring(fechaReg, 1, 4)) as fechaReg, 
				dni, telefono, direccion, email, u.idLocalidad as idLocalidad, l.nombre as localidad, tipoUsuario, foto, baja 
				FROM usuariosys u inner join localidad l on l.idLocalidad = u.idLocalidad
				where idUsuario = $idOperador
				");
			return $query->result();
		} catch (Exception $e) {
			return FALSE;
		}
	}
}
