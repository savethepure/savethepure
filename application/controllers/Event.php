<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
		redirect('events');
	}

	public function detail($evt_name="")
	{
		$evt_name = str_replace('-', ' ', $evt_name);
		$this->load->model('M_event');
		$queryRecords = $this->M_event->detail($evt_name);
		$data['events'] = $queryRecords;
		$this->load->view('event_detail', $data);
	}

}
