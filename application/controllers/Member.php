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
    }

    public function sendMail()
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
                    <div style='width:100%;background:#f8f8f8;padding:30px;text-align:center;'>
                        <div><h1>Save the Pure</h1></div>
                        <h1>Selamat, Pedaftaran anda telah berhasil</h1>
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
		  show_error($this->email->print_debugger());
		 }

         echo "Registrasi Berhasil";

	}

}
