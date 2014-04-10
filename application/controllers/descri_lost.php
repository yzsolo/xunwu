<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Descri_lost extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('console_imf');
	}

	public function page_descri_l()
	{
		$data["title"] = "Find Something";
		$this->load->view('header',$data);
		$this->load->view('descri_lost');
		$this->load->view('footer');
	}

	//向数据库插入丢失的物品信息
	public function imformation(){
	$data = array(
		'kind'  =>$this->input->post("kind_f"),
		'name'  =>$this->input->post("name_f"),
		'locale'=>$this->input->post("locale_f"),
		 'time'  =>date("Y-m-d"),
		'owner'=>$this->input->post("finder_f"),
		'telnum'=>$this->input->post("telnum_f"),
		'email' =>$this->input->post("email_f"),
		'qq'    =>$this->input->post("qq_f"),
		'descri'=>$this->input->post("descri_f")
		);
	$res = $this->console_imf->insert_things_l($data);
	return ("success");
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */