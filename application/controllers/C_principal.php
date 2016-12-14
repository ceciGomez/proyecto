<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_principal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function principal()
	{
		//$this->load->helper('url');
		parent::__construct();
		$this->load->view('templates/cabecera');
		$this->load->view('templates/menu');
		//$this->load->view('welcome_message');
		$this->load->view('templates/pie');
			
	}
}
