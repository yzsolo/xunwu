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
		$head['nav'] = 'index';	// 当前页面
		$this->load->view('header',$head);
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

		//find_result
		$data['default_f_start']=1;
		$data['pre_f_btn']=0;
		$data['default_f_end']=6;
		$data['find_num'] = floor($res['find_num']/14)+1;

		if($data['find_num']>6){
			$data['default_f_end'] = 6;
			$data['next_f_btn'] = 1;
		}else{
			$data['default_f_end'] = $data['find_num'];
			$data['next_f_btn'] = 3;
		}

		//lost_result
		$data['default_l_start']=1;
		$data['pre_l_btn']=0;
		$data['default_l_end']=6;
		$data['lost_num'] = $res['lost_num']/14+1;

		if($data['lost_num']>6){
			$data['default_l_end'] = 6;
			$data['next_l_btn'] = 1;
		}else{
			$data['default_l_end'] = $data['lost_num'];
			$data['next_l_btn'] = 3;
		}

		 $this->load->view('search_result',$data);

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
			$data_f_num = floor($f['find_num']/14)+1;
			$data['find_num'] = $data_f_num;

			if($search_page_num==1||$search_page_num==2){
				$data['default_f_start']=1;
				
				if($data_f_num>6){
					$data['default_f_end'] = 6;
					$data['next_f_btn'] = 1;
				}else{
			 		$data['default_f_end'] = $data_f_num;
			 		$data['next_f_btn'] = 3;
			 	}

				if($search_page_num==2){
					$data['pre_f_btn']=1;
				}elseif ($search_page_num==1) {
					$data['pre_f_btn']=0;
				}
			}else{
				$data['default_f_start']=$search_page_num-2;
				$data['default_f_num']=6;
				$data['pre_f_btn']=1;
				
				if($search_page_num+3>=$data_f_num){
					$data['default_f_end']=$data_f_num;
					$data['default_f_start']=($data_f_num-5<=0?1:($data_f_num-5));
					if($data_f_num<=6){
						$data['next_f_btn']=3;
					}else{
						$data['next_f_btn']=0;
					}
				}else{
					$data['default_f_end']=$search_page_num+3;
					$data['next_f_btn']=1;
				}
			}

			$this->load->view('search_paging_find',$data);

		}else if($search_kind=='l'){
			$l = $this->console_imf->search_paging_result($search_list_num,'l',$search_input);
			$data['lost_limit'] = $l['lost_limit'];
			$data['cur_page'] = $search_page_num;
			$data_l_num = floor($l['lost_num']/14)+1;
			$data['lost_num'] = $data_l_num;

			if($search_page_num==1||$search_page_num==2){
				$data['default_l_start']=1;
				
				if($data_l_num>6){
					$data['default_l_end'] = 6;
					$data['next_l_btn'] = 1;
				}else{
			 		$data['default_l_end'] = $data_l_num;
			 		$data['next_l_btn'] = 3;
			 	}

				if($search_page_num==2){
					$data['pre_l_btn']=1;
				}elseif ($search_page_num==1) {
					$data['pre_l_btn']=0;
				}
			}else{
				$data['default_l_start']=$search_page_num-2;
				$data['default_l_num']=6;
				$data['pre_l_btn']=1;
				
				if($search_page_num+3>=$data_l_num){
					$data['default_l_end']=$data_l_num;
					$data['default_l_start']=($data_l_num-5<=0?1:($data_l_num-5));
					if($data_l_num<=6){
						$data['next_l_btn']=3;
					}else{
						$data['next_l_btn']=0;
					}
				}else{
					$data['default_l_end']=$search_page_num+3;
					$data['next_l_btn']=1;
				}
			}

			$this->load->view('search_paging_lost',$data);
		
		}else{
			var_dump($search_page_num);
		}
	}
}
