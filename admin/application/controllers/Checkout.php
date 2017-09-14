<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
            $data['data_kota'] = $data_kota;
            $data['data_provinsi'] = $data_provinsi;

            $this->load->view('checkout', $data);
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
            $query = $this->M_checkout->detail_order($uuid, $product['id'], $product['name'], $product['qty'], $product['price'], $product['size']);
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
            $data_order['total_amount'] = $this->M_checkout->check_order($uuid);
            $data_order['uuid'] = $uuid;
            $this->load->view('payment',$data_order);
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
