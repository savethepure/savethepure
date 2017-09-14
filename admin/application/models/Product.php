<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

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
	public function penjualan_product()
	{
		$sql = "SELECT product_name, SUM(qty) as count FROM detail_order GROUP BY product_name";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->result_array();
        return $queryRec;
	}

    public function jumlah_user()
    {
        $sql = "SELECT COUNT(*) as count FROM USER";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->row_array();
        return $queryRec['count'];
    }

    public function jumlah_transaksi()
    {
        $sql = "SELECT COUNT(*) as count FROM `order`";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->row_array();
        return $queryRec['count'];
    }

    public function t_menunggu()
    {
        $sql = "SELECT COUNT(*) as count FROM `order` WHERE status_pembayaran = 1";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->row_array();
        return $queryRec['count'];
    }

    public function t_lunas()
    {
        $sql = "SELECT COUNT(*) as count FROM `order` WHERE status_pembayaran = 2";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->row_array();
        return $queryRec['count'];
    }

    public function t_done()
    {
        $sql = "SELECT COUNT(*) as count FROM `order` WHERE status_pembayaran = 3";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->row_array();
        return $queryRec['count'];
    }

    public function t_belum_bayar()
    {
        $sql = "SELECT COUNT(*) as count FROM `order` WHERE status_pembayaran = NULL";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->row_array();
        return $queryRec['count'];
    }

    public function list_product()
	{
		$sql = "select product_name, picture, timestamp, `desc`, price from products order by timestamp desc";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->result_array();
        return $queryRec;
	}    

}
