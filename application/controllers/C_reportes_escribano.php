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

    public function view($page="home", $param="", $param2="")
	{
		if ( ! file_exists(APPPATH.'/views/reportes/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
			switch ($page) {
			case 'minutasPorFecha':
			$fechaDesde = '2016-01-01';
			$fechaHasta = '2017-10-01';
			$idEscribano = '1';
				$data["minutas_por_fecha"] = $this->M_reportes->getMinutasPorFecha($fechaDesde, $fechaHasta, $idEscribano);
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

}