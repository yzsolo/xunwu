<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->helper('url');
		$this->load->model('console_imf');
		$this->load->helper('captcha');
	}

	private function create()	// 标准方法创建验证码，并将验证码的值存到session
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
		$data['image'] = $this->create();	// 验证码
		$data['id'] = $id;	// 文章id，方便提交获取验证码
		$data['table'] = "fmsg";	// 哪个数据库
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
		$data['id'] = $id;
		$data['table'] = "lmsg";
		// print_r($data);
		$this->load->view('header');
		$this->load->view('detail_l',$data);
		$this->load->view('footer');
	}

	public function refresh()	// 刷新验证码
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

	public function verify()	// 接收验证码的值，并判断是否正确，并且返回结果（联系方式）
	{
		$verify = $_POST['verify-input'];
		$table = $_POST['verify-table'];
		$id = $_POST['verify-id'];
		$verify = sha1($verify.sha1("xunwu2014"));
		if (isset($_SESSION['yanzhen'])) {
			if ($verify === $_SESSION['yanzhen']) {
				if ($table == 'lmsg') {
					$data = $this->console_imf->get_id_lmsg($id);
					$phone = $data[0]['l_telnum'];
					echo '{"status": "1", "phone": "'.$phone.'"}';
				}
				elseif ($table == 'fmsg') {
					$data = $this->console_imf->get_id_fmsg($id);
					$phone = $data[0]['f_telnum'];
					echo '{"status": "1", "phone": "'.$phone.'"}';
				}
				else{
					echo '{"status": "0", "phone": "null"}';
				}
			}
			else{
				echo '{"status": "0", "phone": "null"}';
			}
		}
		else{
			echo '{"status": "0", "phone": "null"}';
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */