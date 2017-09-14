<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		if($this->session->userdata('login_admin'))
        {
			$this->load->model('Product');
			$queryRecords = $this->Product->penjualan_product();
			$data['penjualan_products'] = $queryRecords;
			$data['jumlah_user'] = $this->Product->jumlah_user(); 
			$data['jumlah_transaksi'] = $this->Product->jumlah_transaksi(); 
			$data['t_menunggu'] = $this->Product->t_menunggu(); 
			$data['t_lunas'] = $this->Product->t_lunas(); 
			$data['t_done'] = $this->Product->t_done();
			$data['t_belum_bayar'] = $this->Product->t_belum_bayar();
			
			$this->load->view('home',$data);
		}
		else
		{
			redirect('login');
		}

	}
}
