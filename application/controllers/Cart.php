<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
		// $this->load->model('Product');
		// $queryRecords = $this->Product->list_product();
		// $data['products'] = $queryRecords; 
		$data['cart_list'] = $this->cart->contents();

		$this->load->view('cart',$data);
	}

	function add() {
		$id = $_POST['id'];
		$qty = $_POST['qty'];
		$size = $_POST['size'];
		$color = $_POST['color'];

		$this->load->model('M_cart');
        $product = $this->M_cart->get($id);

        $data = array(
            'id'      => $product->id,
            'qty'     => $qty,
            'price'   => $product->price,
            'name'    => $product->product_name,
			'picture' => $product->picture,
			'size'	  => $size,
			'color'	  => $color
        );
        $this->cart->insert($data);

		echo "ok";
    }

	function update()
	{
		$qty = $_POST['qty'];
		$rowid = $_POST['rowid'];

		foreach( $qty as $key => $n ) {
		// print "The name is ".$n.", email is ".$rowid[$key];
			$data = array(
					'rowid' => $rowid[$key] ,
					'qty'   => $n
			);

			$this->cart->update($data);
		}
		redirect("cart");
	}

	function clear()
	{
		$this->cart->destroy();
    	redirect('cart');
	}

	function remove($rowid='')
	{
		$this->cart->remove($rowid);
    	redirect('cart');
	}

}
