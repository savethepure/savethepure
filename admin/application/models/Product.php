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
		$sql = "select id,product_name, picture, timestamp, `desc`, price from products order by timestamp desc";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->result_array();
        return $queryRec;
	}

    public function delete_product($id)
	{
		$sql = "delete from products where id = ?";
        $sql2 = "delete from product_color where id_product = ?";
        $sql3 = "delete from product_variant where id_product = ?";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql, array($id));
        $queryRec2 = $this->db->query($sql2, array($id));
        $queryRec3 = $this->db->query($sql3, array($id));
        return $queryRec;
	}

    public function detail_product($id='') {
        $sql = "SELECT a.id, a.product_name, a.picture, a.`desc`, a.price, b.url, b.type, b.title, b.deskripsi
                FROM products a left join content_product b on a.id = b.id_product
                WHERE a.product_name LIKE ?
                ORDER BY `timestamp` DESC";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql,array($id))->result_array();
        return $queryRec;
    }

    public function add_product($nama_produk, $deskripsi, $harga, $photoBanner) {
        $sql = "insert into products (`product_name`, `picture`, `desc`, `price`) values (?,?,?,?)";

        $queryRec = $this->db->query($sql,array($nama_produk, $photoBanner, $deskripsi, $harga));
        return $queryRec;
    }

    public function get_id($nama_produk) {
        $sqlId = "select id from products where product_name = ?";
        $getId = $this->db->query($sqlId,array($nama_produk))->row_array();
        // $queryRec = $this->db->query($sql)->row_array();
        return $getId['id'];
    }

    public function add_warna($id, $name) {
        $sql = "insert into product_color (`id_product`, `color`) values (?,?)";

        $queryRec = $this->db->query($sql,array($id, $name));
        // $queryRec = $this->db->query($sql)->row_array();
        return $queryRec;
    }

    public function add_size($id, $name) {
        $sql = "insert into product_variant (`id_product`, `size`, `stock`) values (?,?,?)";

        $queryRec = $this->db->query($sql,array($id, $name, 99));
        // $queryRec = $this->db->query($sql)->row_array();
        return $queryRec;
    }

    public function get_photo($id) {
    	$sql = "select * from product_photo where id_product = ?";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql,array($id))->result_array();
        return $queryRec;
    }    

}
