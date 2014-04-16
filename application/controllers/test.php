<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('console_imf');
		$this->load->helper('captcha');
		session_start();
	}

	public function aaa()
	{
		$img_url = base_url()."/captcha/";
		$ranNum = rand(1000,9999);
		$vals = array(
		'word' => $ranNum,
		'use_font' => 30,
		'img_path' => './captcha/',
		'img_url' => $img_url,
		'img_width' => '90',
		'img_height' => '30',
		'expiration' => 60,
		);

		$date = create_captcha($vals);
		$_SESSION['yanzhen'] = sha1($ranNum.sha1("xunwu2014"));
		$this->load->view('header');
		$this->load->view('test', $date);
		$this->load->view('testfoot');
	}

	public function verify()
	{
		$verify = $_POST['verify-input'];
		$verify = sha1($verify.sha1("xunwu2014"));
		if (isset($_SESSION['yanzhen'])) {
			if ($verify == $_SESSION['yanzhen']) {
				echo "1";
			}
			else{
				echo "0";
			}
		}
		else{
			echo "0";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */