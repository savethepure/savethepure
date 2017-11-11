<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Model {

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
	

    public function list_event()
	{
		$sql = "select * from event order by date desc";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql)->result_array();
        return $queryRec;
	}

    public function delete_event($id)
	{
		$sql = "delete from event where id = ?";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql, array($id));
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

    public function add_event($title_event, $short_description, $description, $venue, $date, $photoBanner) {
        $sql = "insert into event (`title_event`, `short_description`, `description`, `timepost`, `picture`, `venue`, `date`) values (?,?,?,NoW(),?,?,?)";

        $queryRec = $this->db->query($sql,array($title_event, $short_description, $description, $photoBanner, $venue, $date));
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
