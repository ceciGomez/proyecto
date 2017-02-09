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
					from Minuta m inner join 
					(select idMinuta, max(idEstadoMinuta)  as idEstadoMinuta from EstadoMinuta group by idMinuta) as x
					on x.idMinuta = m.idMinuta left join EstadoMinuta em 
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
				FROM Minuta m
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
				SELECT u.*, l.nombre  as nombreLocalidad
				FROM usuarioEscribano u inner join Localidad  l
				on  l.idLocalidad = u.idLocalidad
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
				concat(substring(p.fechaPlanoAprobado, 6, 2), '/' ,substring(p.fechaPlanoAprobado, 9, 2) , '/', substring(p.fechaPlanoAprobado, 1, 4)) as fechaPlanoAprobado,
				p.descripcion as descripcion,
				p.idMinuta,
				p.nroMatriculaRPI as nroMatriculaRPI,
			
				concat(substring(p.fechaMatriculaRPI, 6, 2), '/' ,substring(p.fechaMatriculaRPI, 9, 2) , '/', substring(p.fechaMatriculaRPI, 1, 4)) as	fechaMatriculaRPI,
				p.tomo as tomo,
				p.folio as folio,
				p.finca as finca,
				p.año as año,
				l.nombre as nombreLocalidad, d.nombre as nombreDpto
				FROM Parcela p inner join Localidad l
				on p.idLocalidad = l.idLocalidad
				inner join Departamento d 
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
				poligonos
				FROM Propietario p inner join Localidad l
				on l.idLocalidad = p.idLocalidad
				where p.idParcela = $idParcela
			"); 
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}


}


