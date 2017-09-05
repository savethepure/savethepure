<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_member extends CI_Model {

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
	public function register($fullname,$email,$password,$code,$uuid)
	{
		$sql = "insert into user values (null,?,?,?,0,?,?)";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql, array($email,md5($password),$fullname,$code,$uuid));
        return $queryRec;
	}

	public function check_email($email)
	{
		$sql = "select count(*) as count from user where email = ? ";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql, array($email))->row_array();
        return $queryRec['count'];
	}

	public function verification($code)
	{
		$sql = "update user set status_activation = 1 where activation_code = ?";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql, array($code));
        return $queryRec;
	}

	public function login ($email, $password)
	{
		$sql = "select * from user where email = ? and password = ? and status_activation = 1 ";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $query = $this->db->query($sql, array($email, md5($password)));

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
