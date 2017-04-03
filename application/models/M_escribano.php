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
		concat(substring(fechaIngresoSys, 9, 2), '/' ,substring(fechaIngresoSys, 6, 2) , '/', substring(fechaIngresoSys, 1, 4)) as	fechaIngresoSys, fechaEdicion, 
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
				SELECT u.nomyap as nomyap, u.usuario as usuario, 
				concat(substring(u.fechaReg, 9, 2), '/' ,substring(u.fechaReg, 6, 2) , '/', substring(u.fechaReg, 1, 4)) as	fechaReg, 
				u.email as email, u.dni as dni, u.direccion as direccion, u.telefono as telefono, l.nombre  as nombreLocalidad, d.nombre as nombreDpto, p.nombre as nombreProv, matricula
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

public function getPedidos($idEscribano)
{
	try {
		$query = $this->db->query("
			SELECT idPedido, p.idEscribano, descripcion, 
			
			concat(substring(fechaPedido, 6, 2), '/' ,substring(fechaPedido, 9, 2) , '/', substring(fechaPedido, 1, 4)) as fechaPedido,
			case when estadoPedido = 'P' then 'Pendiente'  else 'Contestado' end as estadoPedido, 
			rtaPedido, 
			
			concat(substring(fechaRta, 6, 2), '/' ,substring(fechaRta, 9, 2) , '/', substring(fechaRta, 1, 4)) as fechaRta,
			 u.nomyap
			FROM pedidos p left join usuariosys u on p.idUsuario = u.idUsuario
			where p.idEscribano = $idEscribano
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
				SELECT 
				pe.idPersona as idPropietario, 
				pa.idParcela as idParcela, 
				pe.apynom as titular, 
				pe.dni as dni,
				pe.direccion as direccion,
				pe.idLocalidad as idLocalidad, 
				pe.cuitCuil as cuitCuil, 
				pe.conyuge as conyuge,
				concat(substring(re.fechaEscritura, 6, 2), '/' ,substring(re.fechaEscritura, 9, 2) , '/', substring(re.fechaEscritura, 1, 4)) as fechaEscritura,
				pr.porcentajeCondominio as porcentajeCondominio, 
				re.nroUfUc as nroUfUc,
				re.tipoUfUc as tipoUfUc, 
				re.planoAprobado as planoAprobado,
				concat(substring(re.fechaPlanoAprobado, 6, 2), '/' ,substring(re.fechaPlanoAprobado, 9, 2) , '/', substring(re.fechaPlanoAprobado, 1, 4)) as fechaPlanoAprobado,
				 re.porcentajeUfUc as porcentajeUfUc,
				 re.poligonos as poligonos,
				pr.tipoPropietario as tipoPropietario, 
				pa.idMinuta 
				FROM persona pe inner join propietario pr on pe.idPersona = pr.idPersona 
				inner join relacion re on pr.idRelacion = re.idRelacion 
				inner join parcela pa on pa.idParcela = re.idParcela
				where re.idParcela =  $idParcela
				
					");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}
	public function getPropietarios_porMinuta_Ad($idMinuta)
	{
		try {
			$query = $this->db->query("
				SELECT 
				pe.idPersona as idPropietario, 
				pa.idParcela as idParcela, 
				pe.apynom as titular, 
				pe.dni as dni,
				pe.direccion as direccion,
				pe.idLocalidad as idLocalidad, 
				pe.cuitCuil as cuitCuil, 
				pe.conyuge as conyuge,
				pe.fechaNac as fechaNac,
				concat(substring(re.fechaEscritura, 6, 2), '/' ,substring(re.fechaEscritura, 9, 2) , '/', substring(re.fechaEscritura, 1, 4)) as fechaEscritura,
				pr.porcentajeCondominio as porcentajeCondominio, 
				re.nroUfUc as nroUfUc,
				re.tipoUfUc as tipoUfUc, 
				re.planoAprobado as planoAprobado,
				concat(substring(re.fechaPlanoAprobado, 6, 2), '/' ,substring(re.fechaPlanoAprobado, 9, 2) , '/', substring(re.fechaPlanoAprobado, 1, 4)) as fechaPlanoAprobado,
				 re.porcentajeUfUc as porcentajeUfUc,
				 re.poligonos as poligonos,
				pr.tipoPropietario as tipoPropietario, 
				pa.idMinuta 
				FROM persona pe inner join propietario pr on pe.idPersona = pr.idPersona 
				inner join relacion re on pr.idRelacion = re.idRelacion 
				inner join parcela pa on pa.idParcela = re.idParcela
				where pa.idMinuta = $idMinuta
				and pr.tipoPropietario = 'A'
				
					");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}
	public function getPropietarios_porMinuta_Tr($idMinuta)
	{
		try {
			$query = $this->db->query("
				SELECT 
				pe.idPersona as idPropietario, 
				pa.idParcela as idParcela, 
				pe.apynom as titular, 
				pe.dni as dni,
				pe.direccion as direccion,
				pe.idLocalidad as idLocalidad, 
				pe.cuitCuil as cuitCuil, 
				pe.conyuge as conyuge,
				pe.fechaNac as fechaNac,
				concat(substring(re.fechaEscritura, 6, 2), '/' ,substring(re.fechaEscritura, 9, 2) , '/', substring(re.fechaEscritura, 1, 4)) as fechaEscritura,
				pr.porcentajeCondominio as porcentajeCondominio, 
				re.nroUfUc as nroUfUc,
				re.tipoUfUc as tipoUfUc, 
				re.planoAprobado as planoAprobado,
				concat(substring(re.fechaPlanoAprobado, 6, 2), '/' ,substring(re.fechaPlanoAprobado, 9, 2) , '/', substring(re.fechaPlanoAprobado, 1, 4)) as fechaPlanoAprobado,
				 re.porcentajeUfUc as porcentajeUfUc,
				 re.poligonos as poligonos,
				pr.tipoPropietario as tipoPropietario, 
				pa.idMinuta 
				FROM persona pe inner join propietario pr on pe.idPersona = pr.idPersona 
				inner join relacion re on pr.idRelacion = re.idRelacion 
				inner join parcela pa on pa.idParcela = re.idParcela
				where pa.idMinuta = $idMinuta
				and pr.tipoPropietario = 'T'
				
					");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}


	public function getPersonas(){

		$personas =$this->db->get("persona")->result();
		return $personas;
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
				SELECT nombre, idDepartamento, idLocalidad
				FROM localidad
				WHERE idDepartamento=$idDepartamento");
			return $query->result();
		} catch (Exception $e) {
			return false;
		}
	}

		public function getNombreDepartamento($idDepartamento)	{
			if ($idDepartamento!="") {
				try {
			$query = $this->db->query("
				SELECT nombre
				FROM departamento
				WHERE idDepartamento=$idDepartamento");
			return $query->row()->nombre;
		} catch (Exception $e) {
			return false;
		}
			} else {
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
					 WHERE estadominuta = 'R' and ue.idEscribano = '$idEscribano' 
					 and e.idMinuta not in 
					 	(select idMinuta 
					 		from estadominuta 
					 		where estadoMinuta = 'A') 
					 order by estadominuta
					 ");
			return $query->result();	
		} catch (Exception $e) {
			return FALSE;
		}
	}

	public function getCantMinutasRechazadas($idEscribano)
	{
		try {
			
			$query = $this->db->query("
				SELECT count(*) as cantidadMinutasRechazadas
					 FROM estadominuta e 
					 inner join minuta m on e.idMinuta = m.idMinuta 
					 inner join usuarioescribano ue on m.idEscribano = ue.idEscribano 
					 WHERE estadominuta = 'R' and ue.idEscribano = '$idEscribano' 
					 and e.idMinuta not in 
					 	(select idMinuta 
					 		from estadominuta 
					 		where estadoMinuta = 'A') 
					 order by estadominuta
					 ");
			return $query->result();	
		} catch (Exception $e) {
			return FALSE;
		}
	}

	public function getMinutasPorFecha($idEscribano)
 	{
 		try {
 			
 			$query = $this->db->query("
				
				SELECT m.idMinuta, e.estadoMinuta, e.motivoRechazo, ue.idEscribano,
				concat(substring(m.fechaIngresoSys, 6, 2), '/' ,substring(m.fechaIngresoSys, 9, 2) , '/', substring(m.fechaIngresoSys, 1, 4)) as fechaIngresoSys,
				
				concat(substring(e.fechaEstado, 6, 2), '/' ,substring(e.fechaEstado, 9, 2) , '/', substring(e.fechaEstado, 1, 4)) as fechaEstado
										
						from minuta m inner join estadominuta e on m.idMinuta = e.idMinuta
						
						inner join usuarioescribano ue on ue.idEscribano = m.idEscribano
						

						where ue.idEscribano = '$idEscribano'
						                   
					    and e.idEstadoMinuta = (SELECT MAX(ee.idEstadoMinuta) 
					    						from estadominuta ee 
					    						where  m.idMinuta = ee.idMinuta )  
					ORDER BY `e`.`estadoMinuta` ASC, m.idMinuta ASC

 				");
 			return $query->result();
 		} catch (Exception $e) {
 			return FALSE;
 		}
 	}


 	public function actualizarEscribano($escribano, $idEsc)
 	{
 		try{
			$this->db->where('idEscribano',$idEsc);
			return $this->db->UPDATE('usuarioescribano',$escribano);

			} catch (Exception $e) {
			return false;
		}
 	}

 	public function actualizarFoto($escribano, $idEsc)
 	{
 		try{
			$this->db->where('idEscribano',$idEsc);
			$this->db->UPDATE('usuarioescribano',$escribano);
			return TRUE;

			} catch (Exception $e) {
			return false;
		}
 	}

/*Funciones para ar una minuta nueva*/

function insertarMinuta(){

	$idEscribano = $this->session->userdata('idEscribano');
	$fechaIngresoSys = date('Y-m-d H:i:s');
	$order = "insert into minuta (idEscribano,fechaIngresoSys) values ('$idEscribano','$fechaIngresoSys')";
		if($this->session->userdata('otraParcela')==FALSE) {
    $this->db->query($order);
    /*preparo para insertar una parcela*/
    $idMinuta = $this->db->insert_id();    
    $this->session->set_userdata('idMinuta',$idMinuta); 
    $order2 = "insert into estadominuta (idMinuta, estadoMinuta) values ('$idMinuta','P')";
    $this->db->query($order2);
}

	$idMinuta=$this->session->userdata('idMinuta');
    $idLocalidad = $this->session->userdata('localidades');
    $circunscripcion = $this->session->userdata('circunscripcion');
    $seccion = $this->session->userdata('seccion');
    $chacra = $this->session->userdata('chacra');
    $quinta= $this->session->userdata('quinta');
    $fraccion = $this->session->userdata('fraccion');
    $manzana = $this->session->userdata('parcela');
    $parcela = $this->session->userdata('parcela');
    $superficie = $this->session->userdata('superficie');
    $partida = $this->session->userdata('partida');
    $tipoPropiedad = $this->session->userdata('tipoPropiedad');
    $planoAprobado = $this->session->userdata('planoAprobado');
    $fechaPlanoAprobado = $this->session->userdata('fechaPlanoAprobado');
    $descripcion = $this->session->userdata('descripcion');
    $nroMatriculaRPI = $this->session->userdata('nroMatriculaRPI');
    $fechaMatriculaRPI = $this->session->userdata('fechaMatriculaRPI');
    $tomo = $this->session->userdata('tomo');
    $folio = $this->session->userdata('folio');
    $finca = $this->session->userdata('finca');
    $año = $this->session->userdata('año');
    $order3 = "insert into parcela (idLocalidad,circunscripcion, seccion, chacra, quinta, fraccion, manzana, parcela, superficie, partida, tipoPropiedad, planoAprobado, fechaPlanoAprobado, descripcion, idMinuta, nroMatriculaRPI, fechaMatriculaRPI, tomo, folio, finca, año) values ('$idLocalidad','$circunscripcion','$seccion','$chacra','$quinta','$fraccion','$manzana','$parcela','$superficie','$partida','$tipoPropiedad','$planoAprobado','$fechaPlanoAprobado','$descripcion','$idMinuta','$nroMatriculaRPI','$fechaMatriculaRPI','$tomo','$folio','$finca','$año')";
    if($this->session->userdata('otraParcela') ==FALSE || $this->session->userdata('otroPh')==FALSE  ) {
    $this->db->query($order3);
    /*preparo para insertar una relacion*/
    $idParcela = ($this->db->insert_id());   
    $this->session->set_userdata('idParcela',$idParcela);
		}

    $idParcela = $this->session->userdata('idParcela');
  	$fecha_escritura = $this->session->userdata('fecha_escritura');
    $nro_ucuf = $this->session->userdata('nro_ucuf');
    $tipo_ucuf = $this->session->userdata('tipo_ucuf');
    $plano_aprobado = $this->session->userdata('plano_aprobado');
    $fecha_plano_aprobado = $this->session->userdata('fecha_plano_aprobado');
    $porcentaja_ucuf = $this->session->userdata('porcentaja_ucuf');
    $poligonos = $this->session->userdata('poligonos');
    $order4 = "insert into relacion (idParcela,fechaEscritura, nroUfUc, tipoUfUc, planoAprobado, fechaPlanoAprobado, porcentajeUfUc, poligonos) values ('$idParcela','$fecha_escritura','$nro_ucuf','$tipo_ucuf','$plano_aprobado','$fecha_plano_aprobado','$porcentaja_ucuf','$poligonos')";
    $this->db->query($order4);
    /*preparo para insertar propietarios*/
    $idRelacion = ($this->db->insert_id());
    $propietarios = $this->session->userdata('propietario');
    foreach ($propietarios as $value) {
    	$order5 = "insert into persona (empresa, apynom, cuitCuil, dni, direccion, idLocalidad, conyuge, fechaNac) values ('$value[propietario]','$value[nombreyapellido]', '$value[cuit_cuil]','$value[dni]','$value[direccion]',$idLocalidad, '$value[conyuge]','$value[fecha_nacimiento]')";
    	$this->db->query($order5);
    	$idPersona = ($this->db->insert_id());
    	/*preparo para insertar propietario*/
    	$insertar_propietario = "insert into propietario (idRelacion,idPersona, porcentajeCondominio, tipoPropietario) values ($idRelacion,$idPersona, '$value[porcentaje_condominio]', '$value[tipo_propietario]')";
    	$this->db->query($insertar_propietario);

    }
    $this->session->set_userdata('otroPh',FALSE);
    $this->session->set_userdata('otraParcela', FALSE);
    
}

/*recibe el nombre de localidad y devuelve el id*/
	public function getIdLocalidad($localidad)
	{
		try {
			$query = $this->db->query("
				SELECT idLocalidad
				FROM localidad
				WHERE nombre='$localidad'");
				return $query->row()->idLocalidad;
		} catch (Exception $e) {
			return false;
		}
	}

	public function getfechaInscMinuta($idMinuta)
	{
		try {
			$query = $this->db->query("
				SELECT fechaIngresoSys
				FROM minuta
				WHERE idMinuta='$idMinuta'");
				return $query->row()->fechaIngresoSys;
		} catch (Exception $e) {
			return false;
		}
	}
	public function getPropietariosxidRelacion($idRelacion)
	{
		try {
			
			$query = $this->db->query("
				SELECT *
					 FROM propietario e, persona p
					
					 WHERE p.idPersona =e.idPersona AND e.idRelacion=$idRelacion 
					
					 ");
			return $query->result();	
		} catch (Exception $e) {
			return FALSE;
		}
	}
	public function getMinutaxId($idMinuta){
		try {
			$query= $this->db->query("
					SELECT m.idMinuta as idMinuta, idEscribano, 
		concat(substring(fechaIngresoSys, 9, 2), '/' ,substring(fechaIngresoSys, 6, 2) , '/', substring(fechaIngresoSys, 1, 4)) as	fechaIngresoSys, fechaEdicion, 
					x.idEstadoMinuta as idEstadoMinuta, em.estadoMinuta as estadoMinuta, em.motivoRechazo as motivoRechazo, em.idUsuario as idUsuario
					from minuta m inner join 
					(select idMinuta, max(idEstadoMinuta)  as idEstadoMinuta from estadominuta group by idMinuta) as x
					on x.idMinuta = m.idMinuta left join estadominuta em 
					on em.idEstadoMinuta = x.idEstadoMinuta and em.idMinuta = x.idMinuta 
					where m.idMinuta=$idMinuta
					order by m.idMinuta
				  	");
			return $query->row();
		 } catch (Exception $e) {
			return false;
		} 
	}

		public function getMinutas2(){
		try {
			$query= $this->db->query("
					SELECT m.idMinuta as idMinuta, idEscribano, 
		concat(substring(fechaIngresoSys, 9, 2), '/' ,substring(fechaIngresoSys, 6, 2) , '/', substring(fechaIngresoSys, 1, 4)) as	fechaIngresoSys, fechaEdicion, 
					x.idEstadoMinuta as idEstadoMinuta, 
					case 
					when em.estadoMinuta = 'R' then 'Rechazada'
					when em.estadoMinuta = 'P' then 'Pendiente'
					when em.estadoMinuta = 'A' then 'Aprobada' else 'Sin estado' end as descEstadoMinuta,
					em.estadoMinuta as estadoMinuta, em.motivoRechazo as motivoRechazo, em.idUsuario as idUsuario
					from minuta m inner join 
					(select idMinuta, max(idEstadoMinuta)  as idEstadoMinuta from estadominuta group by idMinuta) as x
					on x.idMinuta = m.idMinuta left join estadominuta em 
					on em.idEstadoMinuta = x.idEstadoMinuta and em.idMinuta = x.idMinuta 
					order by m.idMinuta
				  	");
			return $query->result_array();
		 } catch (Exception $e) {
			return false;
		} 
	}

}


