<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
		$this->load->view('home');
	}

    public function show_product($product_name='') 
    {
		$name = str_replace('-', ' ', $product_name);
        $this->load->model('Product');
		$queryRecords = $this->Product->show_product($name);
		$querySize = $this->Product->product_size($name);
		$queryColor = $this->Product->product_color($name);

		$data['products'] = $queryRecords;
		$data['sizes'] = $querySize; 
		$data['colors'] = $queryColor; 

		$this->load->view('product', $data);
    }
}
