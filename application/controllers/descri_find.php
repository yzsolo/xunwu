<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Descri_find extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('console_imf');
	}

	public function page_descri_f()
	{
		$data["title"] = "Find Something";
		$this->load->view('header',$data);
		$this->load->view('descri_find');
		$this->load->view('footer');
	}

	//向数据库插入捡到的物品信息
	public function imformation(){
	$data = array(
		'kind'  =>$this->input->post("kind_f"),
		'name'  =>$this->input->post("name_f"),
		'locale'=>$this->input->post("locale_f"),
		 'time'  =>date("Y-m-d"),
		'finder'=>$this->input->post("finder_f"),
		'telnum'=>$this->input->post("telnum_f"),
		'email' =>$this->input->post("email_f"),
		'qq'    =>$this->input->post("qq_f"),
		'descri'=>$this->input->post("descri_f")
		);
	$res = $this->console_imf->insert_things_f($data);
	return ("success");
	}
//返回14条信息给捡到页面
	public function im_to_find(){
		$res = $this->console_imf->imf_to_page();
		return $res;
	}
	public function im_to_ind_f(){
		$res = $this->console_imf->imf_to_ind_f();
		return ($res);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */