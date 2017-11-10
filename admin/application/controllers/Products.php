<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
	public function index()
	{
		if(!$this->session->userdata('login_admin'))
        {
			redirect('login');
		}

		$this->load->model('Product');
		$queryRecords = $this->Product->list_product();
		$data['products'] = $queryRecords; 
		
		$this->load->view('list_product', $data);
	}

	function delete($id='')
	{
		$this->load->model('Product');
		$queryRecords = $this->Product->delete_product($id);

		redirect('products');
	}

	function edit($id='')
	{
		$this->load->model('Product');
		$queryRecords = $this->Product->detail_product($id);
		$data['products'] = $queryRecords; 
		
		$this->load->view('edit_product', $data);
	}

	function add()
	{
		$this->load->view('add_product');	
	}

	function save_product() {
		$nama_produk = $this->input->post("nama_product");
		// $deskripsis = $this->input->post("text_deksripsi");
		$deskripsis = $_POST['desc_text'];
		$harga = $this->input->post("harga");
		$photoProduct = $this->input->post("photoProduct");
		$warna = $_POST['warna'];
		$size = $_POST['size'];

		$config['upload_path']          = '../assets/img/products';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000000000;
		$config['file_name'] = strtolower(str_replace(' ', '_', $nama_produk));

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('photoProduct')){
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			// var_dump($data['upload_data']['file_name']);
			$this->load->model('Product');
			$queryRecords = $this->Product->add_product($nama_produk, $deskripsis, $harga, $data['upload_data']['file_name']);
		 	$id = $this->Product->get_id($nama_produk);
			foreach( $warna as $v ) {
				$queryWarna = $this->Product->add_warna($id, $v);	
			}
			foreach( $size as $s ) {
				$querySize = $this->Product->add_size($id, $s);	
			}
			redirect('products');
		}
	}

	// function upload()
	// {	
	// 	if (!empty($_FILES)) {
	// 		$tempFile = $_FILES['file']['tmp_name'];
	// 		$fileName = $_FILES['file']['name'];
	// 		$targetPath = $_SERVER['DOCUMENT_ROOT'] . '/savethepure/admin/assets/uploads/';
	// 		$targetFile = $targetPath . str_replace(' ', '_', $fileName);
	// 		move_uploaded_file($tempFile, $targetFile);
	// 	}
	// }

	function add_photo($id)
	{
		$data['id_product'] = $id;
		$this->load->view('add_photo', $data);
	}

	function upload($id_product)
	{	
		$config['upload_path']   = '../assets/img/products/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('product_photo',array('id_product'=>$id_product, 'photo'=>$nama,'token'=>$token));
        	echo $id_product;
        }
	}

	function remove_foto(){

		//Ambil token foto
		$token=$this->input->post('token');

		
		$foto=$this->db->get_where('product_photo',array('token'=>$token));


		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->photo;
			if(file_exists($file='../assets/img/products/'.$nama_foto)){
				unlink($file);
			}
			$this->db->delete('product_photo',array('token'=>$token));

		}


		echo "{}";
	}


	function hapus_photo() {
		$id = $_POST['id_photo'];
		$nama_foto = $_POST['photo'];
		
		$this->db->delete('product_photo',array('id'=>$id));
		if(file_exists($file='../assets/img/products/'.$nama_foto)){
			unlink($file);
		}
	}

	function get_photo() {
		$id = $_POST['id_product'];
		$this->load->model('Product');
		$queryRecords = $this->Product->get_photo($id);
		$data['products'] = $queryRecords; 
		// var_dump($queryRecords);
		$render = '';
		foreach ($queryRecords as $rows) {
			$render .= '<div class="item-photo"><img src="'.UPLOAD_PRODUCT_URL.'assets/img/products/'.$rows['photo'].'"/><div class="link_hapus"><a onclick="hapus_photo('.$rows['id'].',\''.$rows['photo'].'\')" href="#">Hapus</a></div></div>';
		}

		echo $render;
	}
}
