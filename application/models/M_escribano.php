<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_escribano extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
	}

	public function getMinutas(){
		try {
			$query= $this->db->query("
					SELECT m.idMinuta as idMinuta, idEscribano, 
		concat(substring(fechaIngresoSys, 6, 2), '/' ,substring(fechaIngresoSys, 9, 2) , '/', substring(fechaIngresoSys, 1, 4)) as	fechaIngresoSys, fechaEdicion, 
					x.idEstadoMinuta as idEstadoMinuta, em.estadoMinuta as estadoMinuta, em.motivoRechazo as motivoRechazo, em.idUsuario as idUsuario
					from minuta m inner join 
					(select idMinuta, max(idEstadoMinuta)  as idEstadoMinuta from estadominuta group by idMinuta) as x
					on x.idMinuta = m.idMinuta left join estadominuta em 
					on em.idEstadoMinuta = x.idEstadoMinuta and em.idMinuta = x.idMinuta 
					order by m.idMinuta
				  	");
			return $query->result();
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

	

	public function getParcelas($idMinuta)
	{
		try {
			$query = $this->db->query("
				SELECT 
				p.idParcela as idParcela,
				p.idLocalidad as idLocalidad,
				p.circunscripcion as circunscripcion,
				p.seccion as seccion,
				p.chacra as chacra,
				p.quinta as quinta,
				p.fraccion as fraccion,
				p.manzana as manzana,
				p.parcela as parcela,
				p.superficie as superficie,
				p.partida as partida,
				case p.tipoPropiedad
					when  'U' then 'Urbano'
					when  'R' then 'Rural'
					when  'S' then 'Suburbano' else '-' end  as tipoPropiedad,
				p.planoAprobado as planoAprobado,
				concat(substring(p.fechaPlanoAprobado, 9, 2), '/' ,substring(p.fechaPlanoAprobado, 6, 2) , '/', substring(p.fechaPlanoAprobado, 1, 4)) as fechaPlanoAprobado,
				p.descripcion as descripcion,
				p.idMinuta,
				p.nroMatriculaRPI as nroMatriculaRPI,
			
				concat(substring(p.fechaMatriculaRPI, 9, 2), '/' ,substring(p.fechaMatriculaRPI, 6, 2) , '/', substring(p.fechaMatriculaRPI, 1, 4)) as	fechaMatriculaRPI,
				p.tomo as tomo,
				p.folio as folio,
				p.finca as finca,
				p.año as año,
				l.nombre as nombreLocalidad, d.nombre as nombreDpto
				
				FROM parcela p inner join localidad l
				on p.idLocalidad = l.idLocalidad
				inner join departamento d 
				on d.idDepartamento = l.idDepartamento
				WHERE $idMinuta = p.idMinuta 

				");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}
	public function getPropietarios($idParcela)
	{
		try {
			$query = $this->db->query("
				SELECT idPropietario,
				idParcela,
				titular,
				dni,
				concat(direccion, ' - ', l.nombre) as direccion,
				p.idLocalidad as idLocalidad,
				cuitCuil,
				conyuge,
				concat(substring(p.fechaEscritura, 6, 2), '/' ,substring(p.fechaEscritura, 9, 2) , '/', substring(p.fechaEscritura, 1, 4)) as fechaEscritura,
				porcentajeCondominio,
				nroUfUc,
				tipoUfUc,
				planoAprobado,
				concat(substring(p.fechaPlanoAprobado, 6, 2), '/' ,substring(p.fechaPlanoAprobado, 9, 2) , '/', substring(p.fechaPlanoAprobado, 1, 4)) as fechaPlanoAprobado,
				porcentajeUfUc,
				poligonos,
				p.tipoPropietario as tipoPropietario

				FROM propietario p inner join localidad l
				on l.idLocalidad = p.idLocalidad
				where p.idParcela = $idParcela
			"); 
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}

		public function getDepartamentos()
	{
		try {
			$query = $this->db->query("
				SELECT nombre, idDepartamento
				FROM departamento");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}
   //Recibe el departamento seleccionado para buscar las localidades correspondientes
		public function getLocalidades($idDepartamento)
	{
		try {
			$query = $this->db->query("
				SELECT nombre, idDepartamento
				FROM localidad
				WHERE idDepartamento=$idDepartamento");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}

	public function getMinutasRechazadas($idEscribano)
	{
		try {
			
			$query = $this->db->query("
				SELECT m.idMinuta as id, e.motivoRechazo as motivo, estadominuta
					FROM estadominuta e 
					inner join minuta m on e.idMinuta = m.idMinuta
					inner join usuarioescribano ue on m.idEscribano = ue.idEscribano
					WHERE estadominuta = 'R'
					and ue.idEscribano =  '$idEscribano' ");
			return $query->result();	
		} catch (Exception $e) {
			return FALSE;
		}
	}

}


