<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('console_imf');
		$this->load->helper('captcha');
	}

	public function aaa()
	{
		$img_url = base_url()."/captcha/";
		$ranNum = rand(1000,9999);
		$vals = array(
		'word' => $ranNum,
		'img_path' => './captcha/',
		'img_url' => $img_url,
		'font_path' => './path/to/fonts/texb.ttf',
		'img_width' => '100',
		'img_height' => '30',
		'expiration' => 7200
		);

		$date = create_captcha($vals);

		$this->load->view('header');
		$this->load->view('test',$date);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */