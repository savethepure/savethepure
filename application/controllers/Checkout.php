<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . '/third_party/Veritrans.php';

class Checkout extends CI_Controller {

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
		// $this->load->view('home');

        $data_kota = $this->list_kota();
        $data_provinsi = $this->list_province();
        
        // echo "<label>Kota Asal</label><br>";
        // echo "<select name='asal' id='asal'>";
        // echo "<option>Pilih Kota Asal</option>";
        //     for ($i=0; $i < count($data_kota['rajaongkir']['results']); $i++) { 
        //         echo "<option value='".$data_kota['rajaongkir']['results'][$i]['city_id']."'>".$data_kota['rajaongkir']['results'][$i]['city_name']."</option>";
        //     }
        // echo "</select><br><br><br>";

        // for ($i=0; $i < count($data_kota['rajaongkir']['results']); $i++) {
        //     echo $data_kota['rajaongkir']['results'][$i]['city_name'].'<br>';
        // }

        // var_dump($data_kota);

        if($this->session->userdata('login'))
        {

            $data['cart_list'] = $this->cart->contents();
            $cart_list = $this->cart->contents();
            $data['data_kota'] = $data_kota;
            $data['data_provinsi'] = $data_provinsi;

            if (!empty($cart_list)) {
            	$this->load->view('checkout', $data);
            } else {
            	redirect('cart');
            }
        }
        else
        {
            $refs = base64_encode($_POST['refs']);
            redirect('member/login/'.$refs);
        }
	}

    function list_kota()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key: 982bab5be3da374cf915caa43d2a4b9e"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		    echo "cURL Error #:" . $err;
		} else {
		    return json_decode($response, true);
		}

	}

    function list_province()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key: 982bab5be3da374cf915caa43d2a4b9e"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		    echo "cURL Error #:" . $err;
		} else {
		    return json_decode($response, true);
		}

	}

    function check_ongkir()
    {
        $asal = 152;
        $id_kota = $_POST['city'];
        $kurir = 'jne';
        $berat = 250;
    
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kota."&weight=".$berat."&courier=".$kurir."",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 982bab5be3da374cf915caa43d2a4b9e"
        ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {	  echo "cURL Error #:" . $err;
        } else {
            //  $respon = json_encode($response, true);
             echo $response;
        }
    }

    function order()
    {
        $uuid = $this->uuid->v4(); 
        $user_id = $this->session->login['uuid'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $id_kota = $_POST['city'];
        // $kurir = $_POST['courier'];
        // $service_a = explode('|',$_POST['service']);
        // $service = $service_a[0];
        $address = $_POST['address'];
        $subtotal = $_POST['subtotal'];
        $shipping_cost = $_POST['ship_cost'];
        $total = $_POST['total_price'];

        $this->load->model('M_checkout');
		$queryRecords = $this->M_checkout->order($uuid,$user_id,$name,$phone,$id_kota,$address,$subtotal,$shipping_cost,$total);

        $cart_list = $this->cart->contents();
        foreach($cart_list as $product)
        {
            $query = $this->M_checkout->detail_order($uuid, $product['id'], $product['name'], $product['qty'], $product['price'], $product['size'],$product['color']);
        }

        $this->cart->destroy();
        redirect('checkout/payment/'.$uuid);
    }

    function payment($uuid='')
    {
        if($uuid == '')
        {
            redirect('home');
        }
        else{
            $this->load->model('M_checkout');
	        $is_production = $this->config->item( 'midtrans_is_production' );
            $client_key = $this->config->item('midtrans_client_key');
	        if ($is_production){
	        	$snap_url = 'https://app.midtrans.com/snap/snap.js';
	        }else{
		        $snap_url = 'https://app.sandbox.midtrans.com/snap/snap.js';
	        }
            $q_order = $this->M_checkout->check_order($uuid);
            $data_order['total_amount'] = $q_order['total'];
            $data_order['id'] = $q_order['id'];
            $data_order['already_process'] = $q_order['midtrans_id'] != NULL ? true : false;
            $data_order['order'] = $q_order;
            $data_order['uuid'] = $uuid;
	        $data_order['expire'] = $this->config->item( 'midtrans_expire' );
            $data_order['snap_url'] = $snap_url;
	        $data_order['client_key'] = $client_key;
            $this->load->view('payment',$data_order);
        }
    }

    public function get_token($uuid='')
    {
	    $response = array(
		    'status' => 200,
		    'data' => array(
			    'token' => ''
		    )
	    );
	    if($uuid == '')
	    {
	    	$response['status'] = 400;
	    	$response['data'] = 'Not Found';
		    $this->output
			    ->set_status_header(400)
			    ->set_content_type('application/json')
			    ->set_output(json_encode($response));
	    }
	    else {
		    $this->load->model( 'M_checkout' );
		    $order = $this->M_checkout->get_one_order_detailed( $uuid );
		    if (empty($order)){
			    $response['status'] = 400;
			    $response['data'] = 'Not Found';
			    $this->output
				    ->set_status_header(400)
				    ->set_content_type('application/json')
				    ->set_output(json_encode($response));
		    }
		    $is_production = $this->config->item( 'midtrans_is_production' );
		    //	    $merchant_id = $this->config->item('midtrans_merchant_id');
		    //	    $client_key = $this->config->item('midtrans_client_key');
		    $server_key = $this->config->item( 'midtrans_server_key' );
		    $available_payments = $this->config->item( 'midtrans_available_payments' );
		    $expire = $this->config->item( 'midtrans_expire' );

		    Veritrans_Config::$serverKey    = $server_key;
		    Veritrans_Config::$isProduction = $is_production;
		    Veritrans_Config::$isSanitized  = true;
		    Veritrans_Config::$is3ds        = true;


		    $transaction = array(
			    'transaction_details' => array(
				    'order_id'     => $order['uuid'],
				    'gross_amount' => (int) $order['total'] // no decimal allowed
			    ),
			    'item_details'        => array(
				    array(
					    'id'       => $order['product_id'],
					    'quantity' => $order['qty'],
					    'price'    => $order['price'],
					    'name'     => $order['product_name']
				    ),
				    array(
					    'id'       => 'shipment',
					    'quantity' => 1,
					    'price'    => $order['shipping_cost'],
					    'name'     => 'Shipment'
				    ),
			    ),
			    'enabled_payments'    => $available_payments,
			    'customer_details'    => array(
				    'first_name' => $order['fullname'],
				    'email'      => $order['email'],
			    ),
			    'expiry'              => array(
				    'unit'     => 'day',
				    'duration' => $expire
			    )
		    );
		    $snapToken   = Veritrans_Snap::getSnapToken( $transaction );
		    $response['data']['token'] = $snapToken;
		    $this->output
			    ->set_status_header(200)
			    ->set_content_type('application/json')
			    ->set_output(json_encode($response));
	    }

    }

    public function update_payment()
    {
	    $response = array(
		    'status' => 200,
		    'data' => array(
			    'token' => ''
		    )
	    );
	    $this->load->library('form_validation');
	    $this->form_validation->set_rules('payment_type', 'payment_type', 'required');
	    $this->form_validation->set_rules('order_id', 'order_id', 'required');
	    $this->form_validation->set_rules('trans_id', 'trans_id', 'required');
	    if ($this->form_validation->run() == FALSE)
	    {
		    $response['status'] = 400;
		    $response['data'] = 'Bad Request';
		    $this->output
			    ->set_status_header(400)
			    ->set_content_type('application/json')
			    ->set_output(json_encode($response));
	    }
	    $payment_type = $this->input->post('payment_type');
	    $order_id = $this->input->post('order_id');
	    $invoice = $this->input->post('invoice');
	    $trans_id = $this->input->post('trans_id');
	    $this->load->model('M_checkout');
	    $success = $this->M_checkout->midtrans_pending($order_id, array(
	    	'invoice_url' => $invoice,
		    'nama_rekening_pengirim' => $payment_type,
		    'midtrans_id' => $trans_id
	    ));
	    if ($success){
		    $response['data'] = 'Waiting Payment';
		    $this->output
			    ->set_status_header(200)
			    ->set_content_type('application/json')
			    ->set_output(json_encode($response));
	    }else{
		    $response['status'] = 500;
		    $response['data'] = 'Internal Server Error';
		    $this->output
			    ->set_status_header(500)
			    ->set_content_type('application/json')
			    ->set_output(json_encode($response));
	    }
    }

    function completed_payment()
    {
        $uuid = $_POST['uuid'];
        $account_name = $_POST['account_name'];
        $this->load->model('M_checkout');
        $data_order['total_amount'] = $this->M_checkout->completed($uuid, $account_name);
        redirect('member/account_order');
    }
}
