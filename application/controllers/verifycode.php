<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyCode extends CI_Controller {

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
		$img_url = base_url()."captcha/";
		$ranNum = rand(1000,9999);
		$vals = array(
		'word' => $ranNum,
		'img_path' => './captcha/',
		'img_url' => $img_url,
		'expiration' => 60,
		);

		$date = create_captcha($vals);
		$_SESSION['yanzhen'] = sha1($ranNum.sha1("xunwu2014"));
		$this->load->view('header');
		$this->load->view('test', $date);
		$this->load->view('footer');
	}

	public function create()
	{
		$img_url = base_url()."captcha/";
		$ranNum = rand(1000,9999);
		$vals = array(
		'word' => $ranNum,
		'img_path' => './captcha/',
		'img_url' => $img_url,
		'expiration' => 60,
		);

		$date = create_captcha($vals);
		$_SESSION['yanzhen'] = sha1($ranNum.sha1("xunwu2014"));
		
		echo '<form action="#" method="POST" id="verifyForm">
					<label for="verify-input">验证码：</label><input type="text" name="verify-input" id="verify-input" />'.$date['image'].'<input type="submit" value="提交" id="send"/>
				</form>';
	}

	public function refresh()
	{
		$img_url = base_url()."captcha/";
		$ranNum = rand(1000,9999);
		$vals = array(
		'word' => $ranNum,
		'img_path' => './captcha/',
		'img_url' => $img_url,
		'expiration' => 60,
		);

		$date = create_captcha($vals);
		$_SESSION['yanzhen'] = sha1($ranNum.sha1("xunwu2014"));

		echo $img_url.$date['time'].".jpg";
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

	public function phone()
	{
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */