<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class See_order extends CI_Controller {

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
		$this->load->model('M_see_order');
		$queryRecords = $this->M_see_order->get_order();
		$data['orders'] = $queryRecords;
		$this->load->view('see_order', $data);
	}

	public function detail_order ()
	{
		$this->load->model('M_see_order');
		$uuid = $this->uri->segment('3');
		$queryRecords = $this->M_see_order->detail_order($uuid);
		$queryOrder = $this->M_see_order->head_order($uuid);
		$data['orders'] = $queryRecords;
		$data['head_order'] = $queryOrder;
		$this->load->view('detail_order', $data);
	}

	public function change_status () 
	{
		$uuid = $this->uri->segment('3');
		$this->load->model('M_see_order');
		$queryRecords = $this->M_see_order->change_status($uuid);
		redirect('see_order');
	}
}
