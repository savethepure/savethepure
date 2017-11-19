<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . '/third_party/Veritrans.php';

class Midtrans extends CI_Controller {

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
	public function notification()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$is_production = $this->config->item( 'midtrans_is_production' );
			$server_key = $this->config->item( 'midtrans_server_key' );

			Veritrans_Config::$serverKey = $server_key;
			Veritrans_Config::$isProduction = $is_production;
			$notif = new Veritrans_Notification();

			$data = [
				'status' => $notif->transaction_status,
				'type' => $notif->payment_type,
				'order_id' => $notif->order_id,
				'midtrans_id' => $notif->transaction_id,
				'fraud' => $notif->fraud_status,
				'bank' => $notif->bank,
				'approval' => $notif->approval_code,
			];

			$status_pembayaran = 0;
			if ($data['status'] == 'capture') {
				// For credit card transaction, we need to check whether transaction is challenge by FDS or not
				if ($data['type'] == 'credit_card'){
					if($data['fraud'] == 'challenge'){
						$status_pembayaran = 4;
						//Change to Challenge, Admin Must Check on MAP
					}
					else {
						$status_pembayaran = 2;
					}
				}
			}
			else if ($data['status'] == 'settlement'){
				$status_pembayaran = 2;
			}
			else if($data['status'] == 'pending'){
				$status_pembayaran = 1;
			}
			else if ($data['status'] == 'deny') {
				$status_pembayaran = 5;
			}
			else if ($data['status'] == 'expire') {
				$status_pembayaran = 0;
			}
			else if ($data['status'] == 'cancel') {
				$status_pembayaran = 5;
			}

			$this->load->model('M_see_order');
			$change_status = $this->M_see_order->midtrans_change_status($data['order_id'],$data['midtrans_id'], $status_pembayaran);
			//Change Status
			if ($status_pembayaran == 5 && $change_status == TRUE){
				//TODO ACTION FOR DENY, CANCEL
				$this->load->model('M_checkout');
				$updated_data = array(
					'invoice_url' => NULL,
					'nama_rekening_pengirim' => NULL,
					'midtrans_id' => NULL
				);
				//Updated Data If Transaction Denied Or Canceled
				$this->M_checkout->midtrans_pending($data['order_id'], $updated_data);

				$this->output
					->set_status_header(200)
					->set_content_type('application/json')
					->set_output(json_encode("Terima Kasih Midtrans"));
			}

			if ($status_pembayaran == 0 && $change_status == TRUE && $data['status'] == 'expire')
			{
				$this->load->model('M_checkout');
				$new_uuid = $this->uuid->v4();
				$updated_data = array(
					'invoice_url' => NULL,
					'nama_rekening_pengirim' => NULL,
					'midtrans_id' => NULL,
					'uuid' => $new_uuid
			);
				//Updated Data If Transaction Denied Or Canceled
				$this->M_checkout->midtrans_pending($data['order_id'], $updated_data);
				$this->M_checkout->update_order_id_on_detail($data['order_id'], $new_uuid);

				$this->output
					->set_status_header(200)
					->set_content_type('application/json')
					->set_output(json_encode("Terima Kasih Midtrans"));
			}

			if($change_status == TRUE){
				$this->output
					->set_status_header(200)
					->set_content_type('application/json')
					->set_output(json_encode("Terima Kasih Midtrans"));
			}else{
				//TODO RETURN INTERNAL SERVER ERROR 500
				$this->output
					->set_status_header(500)
					->set_content_type('application/json')
					->set_output(json_encode("Internal Server Error"));
			}
		}else{
			$this->output
				->set_status_header(400)
				->set_content_type('application/json')
				->set_output(json_encode("BAD REQUEST"));
		}
	}
}
