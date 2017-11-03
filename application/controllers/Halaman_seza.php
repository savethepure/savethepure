<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_seza extends CI_Controller {

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
	public function index()
	{
		$data['nama'] = 'Test Data';
		$this->load->view('halaman_seza', $data);
	}

	public function pertama()
	{
		$this->load->view('halaman_pertama');	
	}
    
}
