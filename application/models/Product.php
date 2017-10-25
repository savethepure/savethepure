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
	public function list_product()
	{
		$sql = "select product_name, picture from products order by timestamp desc";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->result_array();
        return $queryRec;
	}

    public function show_product($nama='') {
        $sql = "SELECT a.id, a.product_name, a.picture, a.`desc`, a.price, b.url, b.type, b.title, b.deskripsi
                FROM products a left join content_product b on a.id = b.id_product
                WHERE a.product_name LIKE ?
                ORDER BY `timestamp` DESC";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql,array($nama))->result_array();
        return $queryRec;
    }

    public function product_size($nama='') {
        $sql = "SELECT a.size, a.stock
                FROM product_variant a left join products b 
                on a.id_product = b.id 
                WHERE b.product_name LIKE ?
                and a.stock != 0";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql,array($nama))->result_array();
        return $queryRec;
    }

    public function product_photo($nama='') {
        $sql = "SELECT a.id, b.photo as url
                FROM products a left join product_photo b on a.id = b.id_product
                WHERE a.product_name LIKE ?";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql,array($nama))->result_array();
        return $queryRec;
    }

    public function product_color($nama='') {
        $sql = "SELECT a.color
                FROM product_color a left join products b 
                on a.id_product = b.id 
                WHERE b.product_name LIKE ?";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql,array($nama))->result_array();
        return $queryRec;
    }
}
