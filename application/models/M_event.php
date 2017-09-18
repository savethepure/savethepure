<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_event extends CI_Model {

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
	public function detail($name)
	{
		$sql = "select * from event where title_event = ?";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql,array($name) )->row_array();
        return $queryRec;
	}

}
