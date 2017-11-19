<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_checkout extends CI_Model {

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
	public function order($uuid,$id,$name,$phone,$id_kota,$address,$subtotal,$shipping_cost,$total)
	{
        
		$sql = "INSERT INTO `order`(`id`, `uuid`, `tanggal`, `id_user`, `nama_penerima`, `phone_penerima`, `id_kota`,`address`, `subtotal`, `shipping_cost`, `total`)  values (null,?,null,?,?,?,?,?,?,?,?)";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql, array($uuid,$id,$name,$phone,$id_kota,$address,$subtotal,$shipping_cost,$total));
        return $queryRec;
	}

    public function check_order($uuid)
    {
        $sql = "select * from `order` where uuid = ?";
        $queryRec = $this->db->query($sql, array($uuid))->row_array();
        return $queryRec;
    }

    public function completed ($uuid, $account_name)
    {
        $sql = "update `order` set status_pembayaran='1' where uuid = ?";
        $sql2 = "update `order` set nama_rekening_pengirim = ? where uuid = ?";

        $queryRec1 = $this->db->query($sql, array($uuid));
        $queryRec2 = $this->db->query($sql2, array($account_name,$uuid));
        return $queryRec1;
    }

    public function detail_order($uuid,$id,$name,$qty,$price,$size,$color)
	{
        
		$sql = "INSERT INTO `detail_order`(`id`, `order_id`, `product_id`, `product_name`, `qty`, `price`, `size`, `color`) 
        values (null,?,?,?,?,?,?,?)";

        // $queryRec = $this->db->query($sql,array($tanggal,$jam,$daerah,$daerah));
        $queryRec = $this->db->query($sql, array($uuid,$id,$name,$qty,$price,$size,$color));
        return $queryRec;
	}

	public function get_one_order_detailed($uuid)
	{
		$sql = "select a.*, b.*, c.uuid as user_uuid, c.email, c.fullname from `order` a left join detail_order b on a.uuid = b.order_id 
				left join user c on a.id_user = c.uuid
				where a.uuid = ? ";
		$queryRec = $this->db->query($sql, array($uuid))->row_array();
		return $queryRec;
	}

	public function midtrans_pending($uuid, $data)
	{
		$fields = array();
		foreach ($data as $key => $value){
			$fields[] = "`$key` = "."'$value'";
		}
		$fields = implode( ', ', $fields);

		$sql = "UPDATE `order` SET $fields WHERE uuid = ?";

		$queryRec1 = $this->db->query($sql, array($uuid));
		return $queryRec1;
	}

	public function update_order_id_on_detail($old, $new)
	{
		$sql = "update `detail_order` set order_id=? where order_id = ?";
		$queryRec = $this->db->query($sql, array($new, $old));
		return $queryRec;
	}
}
