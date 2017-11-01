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
		$refs = $this->uri->segment(3);
		$data['refs'] = $refs;
        $this->load->view('login',$data);
    }

    public function do_login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
		if (isset($_POST['refs']))
		{
			$refs = $_POST['refs'];
		}
		else{
			$refs = "";
		}

		$this->load->model('M_member');
		
		$data_login = $this->M_member->login($email, $password);

		if (!$data_login)
		{
			$this->session->set_flashdata('error', 'Wrong Email or Password or You have not verified your email');
			redirect('member/login');	 
		}
		else
		{

			$login_session['email'] = $data_login['email'];
			$login_session['uuid'] = $data_login['uuid'];
			$login_session['fullname'] = $data_login['fullname'];
			$this->session->set_userdata('login', $login_session);
			if($refs == '')
			{
				redirect('home');
			}
			else
			{
				redirect(base64_decode($refs));
			}
			
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
			$this->session->set_flashdata('error', 'Email Registered');
		}
		else{
			$code = base64_encode(date("h:i:sa"));
			$query = $this->M_member->register($fullname,$email,$password,$code,$uuid);
			$flag = 1;
			if($query)
			{
				$send_mail = $this->sendMail($email, $code, $flag);
				if ($send_mail == 'OK')
				{
					redirect('member/registration_success');
				}
				else{
					$this->session->set_flashdata('error', 'Something wrong while registering your account.');
				}
			}
			else
			{
				$this->session->set_flashdata('error', 'Something wrong while registering your account.');
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

	public function logout()
	{
		$this->session->unset_userdata('login');
		redirect('home');
	}

    public function sendMail($email='', $code='', $flag='')
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

		 if ($flag == 1) {
			$msg = "<html>
                    <div style='width:100%;background:#252525;padding-top:20px;padding-bottom:20px;text-align:center;color:#fff;'>
                        <div><img src='http://savethepure.com/assets/img/stp-black.png' width='70%'/></div>
                        <h1>Congratulation, One more step to complete your registration</h1>
						<h4>Click this <a href='".base_url()."member/verification/".$code."'>Link</a>to verify your email.</h4>
                    </div>
                </html>";		 	
		 } else if ($flag == 2) {
		 	$msg = "<html>
                    <div style='width:100%;background:#f8f8f8;padding-top:20px;padding-bottom:20px;text-align:center;color:#252525;'>
                        <div><img src='http://savethepure.com/assets/img/stp-black.png' width='70%'/></div>
                        <h1>Reset Password</h1>
						<h4>click this <a href='".base_url()."member/change_password/".$code."'>link</a> to reset your password.</h4>
                    </div>
                </html>";
		 }


		   $this->load->library('email', $config);
		   $this->email->set_newline("\r\n");
		   if ($flag == 1) {
		     	$this->email->from('admin@savethepure.com', 'Registration Save the Pure'); // change it to yours
			   $this->email->to($email);// change it to yours
			   $this->email->subject('Registration Succeed');
		  	} else if ($flag == 2){
				$this->email->from('admin@savethepure.com', 'Reset Password Save the Pure'); // change it to yours
				$this->email->to($email);// change it to yours
				$this->email->subject('Reset Password');
		  	}  
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

         echo "Registration Succeed";

	}

	public function account_order()
	{
		$this->load->model('M_member');
		$uuid = $this->session->login['uuid'];
		$query = $this->M_member->list_order($uuid);
		$data['orders'] = $query;
		$this->load->view('list_order',$data);
	}

	public function forget_password()
	{
		$this->load->view('forget_password');
	}

	public function submit_forget()
	{
		$email = $_POST['email'];
		$this->load->model('M_member');
		$check_email = $this->M_member->check_email($email);

		if($check_email < 1)
		{
			$this->session->set_flashdata('error', 'Email is not registered');
		}
		else
		{
			$hash_email = base64_encode($email);
			$flag = 2;
			$send_mail = $this->sendMail($email, $hash_email, $flag);
			if ($send_mail == 'OK')
			{
				$this->session->set_flashdata('error', 'Link to Reset your Password has been sent');
			}
			else{
				$this->session->set_flashdata('error', 'Something wrong happened while sending the link to reset your password.');
			}

		}

		redirect('member/forget_password');
	}

	public function change_password($email='')
	{
		$data['email'] = $email;
		$this->load->view('change_password',$data);
	}

	public function submit_change()
	{
		$email = $_POST['email'];
		$email = base64_decode($email);
		$password = $_POST['password'];
		$password = md5($password);

		$this->load->model('M_member');
		$check_email = $this->M_member->change_password($email, $password);

		$this->session->set_flashdata('error', 'Reset password succeed please login with your new password');
		redirect('member/change_password');
	}

}
