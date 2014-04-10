<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends CI_Controller{
	private $_img = array();
	
	public function index(){
		$this->load->helper('captcha');

		$this->img = array(
//			'word'  => '123',
			'word_length' => 5,
            'img_width' => '80',
            'img_height' => '30',
            'font_path' => './system/fonts/whzcktj.ttf'
        );

		$cap = create_captcha($this->img);
		echo $cap['image'];
	}
	
}
?>
