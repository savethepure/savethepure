<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

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

		// $this->load->view('home', $data);
	}

    public function login()
    {
        $this->load->view('login');
    }

    public function do_login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
		$this->load->model('M_member');
		
		$data_login = $this->M_member->login($email, $password);

		if (!$data_login)
		{
			$this->session->set_flashdata('error', 'Email atau Password anda salah');
			redirect('member/login');	 
		}
		else
		{

			$login_session['email'] = $data_login['email'];
			$login_session['uuid'] = $data_login['uuid'];
			$login_session['fullname'] = $data_login['fullname'];
			$this->session->set_userdata('login', $login_session);
			
			redirect('home');
		}
    }

    public function register()
    {
        $this->load->view('register');
    }

    public function do_register()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];  
		$uuid = $this->uuid->v4(); 

		$this->load->model('M_member');
		
		$check_email = $this->M_member->check_email($email);
		
		if($check_email >= 1)
		{
			$this->session->set_flashdata('error', 'Email sudah terdaftar');
		}
		else{
			$code = base64_encode(date("h:i:sa"));
			$query = $this->M_member->register($fullname,$email,$password,$code,$uuid);
			
			if($query)
			{
				$send_mail = $this->sendMail($email, $code);
				if ($send_mail == 'OK')
				{
					redirect('member/registration_success');
				}
				else{
					$this->session->set_flashdata('error', 'Terjadi kesalahan saat medaftarkan akun anda.');
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat medaftarkan akun anda.');
			}
		}

		redirect('member/register');
    }

	public function registration_success()
	{
		$this->load->view('registration_status');
	}	

	public function verification($code='')
	{
		$this->load->model('M_member');
		$verif = $this->M_member->verification($code);

		if($verif) {
			$data['status'] = 'Success';
		}
		else
		{
			$data['status'] = 'Failed';
		}
		$this->load->view('verification',$data);
	}

    public function sendMail($email='', $code='')
	{
        $email = $_POST['email'];


		 $config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://mx1.hostinger.co.id',
		'smtp_port' => 465,
		'smtp_user' => 'admin@savethepure.com', // change it to yours
		'smtp_pass' => 'savethepure2017', // change it to yours
		'mailtype' => 'html',
		'charset' => 'iso-8859-1',
		'wordwrap' => TRUE
		);

		   // $msg = '<html>Halo '.$fullname.', Selamat Pendaftaran anda telah berhasil</html>';

		 $msg = "<html>
                    <div style='width:100%;background:#252525;padding-top:20px;padding-bottom:20px;text-align:center;color:#fff;'>
                        <div><h1>SaveThePure</h1></div>
                        <h1>Selamat, Pedaftaran anda telah berhasil</h1>
						<h4>Klik Link <a href='".base_url()."member/verification/".$code."'>ini</a> untuk melakukan Verifikasi email anda.</h4>
                    </div>
                </html>";

		   $this->load->library('email', $config);
		   $this->email->set_newline("\r\n");  
		   $this->email->from('admin@savethepure.com', 'Pendaftaran Save the Pure'); // change it to yours
		   $this->email->to($email);// change it to yours
		   $this->email->subject('Pendaftaran Berhasil');
		   $this->email->message($msg);
		 if($this->email->send())
		 {
		   return 'OK';
		 }
		 else
		 {
		//   show_error($this->email->print_debugger());
			return 'FAIL';
		 }

         echo "Registrasi Berhasil";

	}

}
