<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('console_imf');
		$this->load->helper('captcha');
		session_start();
	}

	private function create()
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
		return $date['image'];	
	}

	public function pagef_detail()
	{
		$id = $this->uri->segment(3);
		$data['one_new'] = $this->console_imf->get_id_fmsg($id);
		// print_r($data);
		$this->load->view('header');
		$this->load->view('detail_f',$data);
		$this->load->view('footer');
	}

	public function pagel_detail()
	{
		$id = $this->uri->segment(3);
		$data['one_new'] = $this->console_imf->get_id_lmsg($id);
		$data['image'] = $this->create();
		// print_r($data);
		$this->load->view('header');
		$this->load->view('detail_l',$data);
		$this->load->view('footer');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */