<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_done_order extends CI_Model {

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
	public function get_order()
	{
		$sql = "select * from `order` where status_pembayaran = 2";
		$queryRec = $this->db->query($sql)->result_array();
		return $queryRec;
	}
}
