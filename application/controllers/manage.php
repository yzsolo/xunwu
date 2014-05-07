<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->helper('url');
		$this->load->model('console_imf');
	}

	public function login_manage() {
		$this->load->view('manage/manage_login');
	}

	public function manage_imf() {
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$check = $this->console_imf->check_login();

		if(($user == $check[0]['user'])&&($pass == $check[0]['password'])) {
			$this->load->view('manage/manage_header');
		} else {
			echo 'wrong';
		}
	}

	public function manage_lost() {
		$res = $this->console_imf->manage_kind('things_lost','l_id');
		$res['page_num'] = 1; 
		$this->load->view('manage/manage_header');
		$this->load->view('manage/manage_lost',$res);
	}

	public function manage_find() {
		$res = $this->console_imf->manage_kind('things_find','f_id');
		$res['page_num'] = 1; 
		$this->load->view('manage/manage_header');
		$this->load->view('manage/manage_find',$res);
		// print_r($res);
	}

	public function manage_del() {
		$num = $this->input->post("num");
		$id = $this->input->post("id");
		$table = $this->input->post('table');
		
		$this->console_imf->manage_delete($num,$table,$id);
	}

	public function manage_pre() {
		$n = $this->uri->segment(3);
		$k = $this->uri->segment(4);
		if($n<0){
			$n=0;
			$num = 0;
		}else{
			$num = $n*14;
		}
		
		$res = $this->console_imf->manage_pre_next($num,$k);
		$res['page_num'] = $n;
		$this->load->view('manage/manage_header');
		if($k == 'l'){
			$this->load->view('manage/manage_lost',$res);
		}elseif($k == 'f'){
			$this->load->view('manage/manage_find',$res);
		}else{
			echo 'wrong';
		}
	}

	public function manage_next() {
		$n = $this->uri->segment(3);
		$k = $this->uri->segment(4);
		$num = $n*14;
		$res = $this->console_imf->manage_pre_next($num,$k);
		$total_row = floor($res['total_row']/14);
		if($n>=$total_row){
			$n = $total_row;
		}
		$res['page_num'] = $n;
		$this->load->view('manage/manage_header');
		if($k == 'l'){
			$this->load->view('manage/manage_lost',$res);
		}elseif($k == 'f'){
			$this->load->view('manage/manage_find',$res);
		}else{
			echo 'wrong';
		}

	}


}
