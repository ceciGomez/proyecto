<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class M_direccion extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
	}

	//Obtener todas las provincias de la BD
	public function getProvincias(){
		try {
			$query= $this->db->query("SELECT *
			  	FROM provincia p
			  	");
			return $query->result();
		 } catch (Exception $e) {
			return false;
		} 
	}
	public function getDepartamentos(){
		try {
			$query= $this->db->query("SELECT *
			  	FROM departamento l
			  	");
			return $query->result();
		 } catch (Exception $e) {
			return false;
		} 
	}
	public function getLocalidades(){
		try {
			$query= $this->db->query("SELECT *
			  	FROM localidad l
			  	");
			return $query->result();
		 } catch (Exception $e) {
			return false;
		} 
	}

	//Obtener Departamentos de una Provincia en particular.
	public function getUnDepartamento($idProv)
	{
		try {
			$this->db->where('idProvincia', $idProv);
			return $this->db->get('departamento')->result();
			
		} catch (Exception $e) {
			return false;
			
		}
	}

	//Obtener Localidades de un departamento en particular.
	public function getLocalidadesPorDpto($idDepartamento)
	{
		try {
			$this->db->where('idDepartamento', $idDepartamento);
			return $this->db->get('localidad')->result();
			
		} catch (Exception $e) {
			return false;
			
		}
	}
}		