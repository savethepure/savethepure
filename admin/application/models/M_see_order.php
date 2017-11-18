<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_see_order extends CI_Model {

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
		$sql = "select * from `order` where status_pembayaran = 1 or status_pembayaran = 4";
		$queryRec = $this->db->query($sql)->result_array();
		return $queryRec;
	}

	public function head_order ($uuid) {
		$sql = "SELECT a.*, b.fullname from `order` a left join user b on a.id_user = b.uuid where a.uuid = ?";
		$queryRec = $this->db->query($sql, array($uuid))->row_array();
		return $queryRec;
	}

	public function detail_order($uuid)
	{
		$sql = "select a.*, b.* from `detail_order` a LEFT JOIN products b ON a.product_id = b.id  where order_id = ?";
		$queryRec = $this->db->query($sql, array($uuid))->result_array();
		return $queryRec;
	}

	public function change_status($uuid)
	{
		$sql = "update `order` set status_pembayaran = 2 where `uuid` = ?";
		$queryRec = $this->db->query($sql, array($uuid));
		return $queryRec;
	}
}
