<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Defaults extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('console_imf');
	}

	public function index()
	{
		$data["f_news"] = $this->console_imf->imf_to_ind_f();
		$data["l_news"] = $this->console_imf->imf_to_ind_l();
		$this->load->view('header');
		$this->load->view('index',$data);
		$this->load->view('footer');
	}

	public function search_result(){
		$data = array(
			"search_input" =>$this->input->post("search_input")
		);
		$res = $this->console_imf->search_result($data);
	    //$result = json_encode($res);
		$data['find_limit'] = $res['find_limit'];
		$data['lost_limit'] = $res['lost_limit'];
		$data['cur_page'] = 1;
		$data['find_num'] = $res['find_num']/14+1;
		$data['lost_num'] = $res['lost_num']/14+1;
		// var_dump($res);
		//echo $result;
		//print_r($res)
		//var_dump($res['find']);
		// $this->load->view('header');
		 $this->load->view('search_result',$data);
		// $this->load->view('footer');
	}

	public function search_paging()
	{
		$search_page_num = $this->input->post('search_page_num');
		$search_list_num = ($search_page_num-1)*14;
		$search_kind = $this->input->post('search_page_kind');
		$search_input = $this->input->post('search_input');
		if($search_kind=='f'){
			$f = $this->console_imf->search_paging_result($search_list_num,'f',$search_input);
			$data['find_limit'] = $f['find_limit'];
			$data['cur_page'] = $search_page_num;
			$data['find_num'] = $f['find_num']/14+1;
			$this->load->view('search_paging_find',$data);
		}else if($search_kind=='l'){
			$l = $this->console_imf->search_paging_result($search_list_num,'l',$search_input);
			$data['lost_limit'] = $l['lost_limit'];
			$data['cur_page'] = $search_page_num;
			$data['lost_num'] = $l['lost_num']/14+1;
			//$this->load->view('header');
			$this->load->view('search_paging_lost',$data);
			// var_dump($data);
			//$this->load->view('footer');
		}else{
			var_dump($search_page_num);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */