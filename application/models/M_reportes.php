<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
 class M_reportes extends CI_Model
 {
 	
 	public function getMinutasPorFecha($fechaDesde, $fechaHasta)
 	{
 		try {
 			$query = $this->db->query("
 				SELECT *
 				FROM minuta
 				where fechaIngresoSys between '$fechaDesde' and '$fechaHasta'
 				");
 			return $query->reuslt();
 		} catch (Exception $e) {
 			return FALSE;
 		}
 	}
 	
	
	}
 } ?>