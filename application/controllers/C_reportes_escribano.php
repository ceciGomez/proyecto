<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class C_reportes_escribano extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
    }

    public function view($page="home", $param="", $param2="", $param3="")
	{
		if ( ! file_exists(APPPATH.'/views/reportes/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
			switch ($page) {
			case 'minutasPorFecha':
			if ($param =="") {
				$param = new DateTime();
				$param = date_format($param, 'Y-m-d');
			};
			if ($param2 =="") {
				$param2 = new DateTime();				
				$param2 = date_format($param2, 'Y-m-d');
			};
			if ($param3) {
				$param3 =  $this->session->userdata('idEscribano');
			}
			$data['fechaInicio'] = $param;
			$data['fechaFin'] = $param2;
			//var_dump($param, $param2, $param3);
			$fechaDesde = $param;
			$fechaHasta =  $param2;
			//var_dump($fechaDesde, $fechaHasta);
			$idEscribano = $param3;
				$data["minutas_por_fecha"] = 
				$this->M_reportes->getMinutasPorFecha($fechaDesde, $fechaHasta, $idEscribano);

			break;
			default:
				# code...
			break;
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		$this->load->view('templates/cabecera_escribano', $data);
		$this->load->view('templates/escri_menu', $data);
		$this->load->view('reportes/'.$page, $data);
		$this->load->view('templates/pie', $data);
	}
	public function sanitizarFecha($fecha)
	{
		//$date = date_create_from_format('d-m-Y', $fecha);
		$date = date_create($fecha);
    	return date_format($date, 'Y-m-d');
	}
	

	public function minutas_PorFecha()
	{
		$fechaInicio = $this->input->get("fdesde");
		//$fechaInicio =$this->sanitizarFecha($fechaInicio);
		$fechaFin = $this->input->get("fhasta");
		//$fechaFin = $this->sanitizarFecha($fechaFin);
	//	echo "entro por funcion: ";
	//	var_dump($fechaInicio, $fechaFin);
		$idEscribano = $this->session->userdata('idEscribano') ;
		redirect('c_reportes_escribano/view/minutasPorFecha/'.$fechaInicio.'/'.$fechaFin.'/'.$idEscribano,'refresh');
	}
}