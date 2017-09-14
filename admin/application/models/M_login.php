<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

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
	public function login ($username, $password)
	{
		$sql = "select * from admin where name = ? and password = ?";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $query = $this->db->query($sql, array($username, md5($password)));

		if ($query->num_rows() == 1) {
			$data = $query->row_array();
			return $data;
		}
		else
		{
			return FALSE;
		}
	}

}
