<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Find extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('console_imf');
		$this->load->database();
	}

	public function page_find()
	{	
	    $f = $this->console_imf->imf_to_pagef();
	    $data["cur_page"] = 1;
	    $data['default_start']=1;
		$data['pre_btn']=0;
		$data['default_end']=6;
		$data['news'] = $f['news'];
		$data['num'] = floor($f['total_rows'] / 14) + 1;
		if($data['num']>6){
			$data['default_num'] = 6;
			$data['next_btn'] = 1;
		}else{
			$data['default_num'] = $data['num'];
			$data['next_btn'] = 3;
		}
		$head['nav'] = 'find';	// 当前页面
		$this->load->view('header',$head);
		$this->load->view('find',$data);
		$this->load->view('footer');
	}

	public function page_find_kind()
	{

		$page_num = $this->uri->segment(3);
		if(!$page_num){

			$page_num = 1;

		}else{
			
		}
			$pnum = ($page_num-1)*14;
			$kind = $this->input->post('fkind');
			$flag = $this->input->post('flag');
			$kind_copy = "选择类型";


		if($kind && $kind != $kind_copy){

			$kind_copy = $kind;

		}
		else {

			$kind = $kind_copy;

		}

		$data['default_start']=1;
		$data['pre_btn']=0;
		$data['default_end']=6;

		$data['cur_page'] = $page_num;
		$f = $this->console_imf->get_kind_fmsg($kind,$pnum);
		$data["news"] = $f['news'];
		$m = $this->console_imf->get_kindnum_fmsg($kind);
		$num = $m['total_rows'];

		$data['num'] = floor($num[0]['num']/14)+1;

		if($data['num']>6){
			$data['default_end'] = 6;
			$data['next_btn'] = 1;
		}else{
			$data['default_end'] = $data['num'];
			$data['next_btn'] = 3;
		}

		if($flag == 1){

			$this->load->view('find_part',$data);
		}else if($flag != 1){
			
			 $this->load->view('find_part',$data);
		}

	}
	/*find_part 分页*/
	public function find_part_paging(){
		$p_kind = $this->uri->segment(3);
		$page_num = $this->uri->segment(4);
		$kind = urldecode($p_kind);
		// var_dump($kind);
		if(!$page_num){

			$page_num = 1;

		}else{
			
		}
			$data['option'] = array('选择类型','书籍资料','衣物饰品','交通工具','随身物品','电子数码','卡类证件','其他物品');
			$pnum = ($page_num-1)*14;
			$data['cur_page'] = $page_num;
			$f = $this->console_imf->get_kind_fmsg($kind,$pnum);
			$data['news'] = $f['news'];
			$m = $this->console_imf->get_kindnum_fmsg($kind);
			$num = $m['total_rows'];
			$data['num'] = floor($num[0]['num']/14)+1;
			$data_num = $data['num'];
			$data['kind'] = $kind;

			if($page_num==1||$page_num==2){
			   $data['default_start']=1;
	
				if($data['num']>6){
					$data['default_end'] = 6;
					$data['next_btn'] = 1;
				}else{
			 		$data['default_end'] = $data['num'];
			 		$data['next_btn'] = 3;
			 	}

				if($page_num==2){
					$data['pre_btn']=1;
				}elseif ($page_num==1) {
					$data['pre_btn']=0;
				}

			}else{
				$data['default_start']=$page_num-2;
				$data['pre_btn']=1;

				if($page_num+3>=$data['num']){
					$data['default_end']=$data_num;
					echo $data_num;
					$data['default_start']=($data_num-5<=0?1:($data_num-5));

					if($data_num<=6){
						$data['next_btn']=3;
					}else{
						$data['next_btn']=0;
					}

				}else{
					$data['default_end']=$page_num+3;
					$data['next_btn']=1;
				}
			}

			$head['nav'] = 'find';	// 当前页面
			$this->load->view('header',$head);
			$this->load->view('find_part_paging',$data);
			$this->load->view('footer');

	}

//分页
	public function pagef_paging()
	{
		$page_num = $this->uri->segment(3);
		$p_num = ($page_num-1)*14;
		$f = $this->console_imf->get_new_pagef($p_num);
		$data['cur_page'] = $page_num;
		$data['news'] = $f['news'];
		$data_num = floor($f['total_rows']/14)+1;
		$data['num']=$data_num;

		if($page_num==1||$page_num==2){
			   $data['default_start']=1;
			
			if($data['num']>6){
				$data['default_end'] = 6;
				$data['next_btn'] = 1;
			}else{
		 		$data['default_end'] = $data['num'];
		 		$data['next_btn'] = 3;
		 	}

			if($page_num==2){
				$data['pre_btn']=1;
			}elseif ($page_num==1) {
				$data['pre_btn']=0;
			}
		}else{
			$data['default_start']=$page_num-2;
			$data['default_num']=6;
			$data['pre_btn']=1;
			
			if($page_num+3>=$data['num']){
				$data['default_end']=$data_num;
				$data['default_start']=($data_num-5<=0?1:($data_num-5));
				if($data_num<=6){
					$data['next_btn']=3;
				}else{
					$data['next_btn']=0;
				}
			}else{
				$data['default_end']=$page_num+3;
				$data['next_btn']=1;
			}
		}
		$head['nav'] = 'find';	// 当前页面
		$this->load->view('header',$head);
		$this->load->view('find',$data);
		$this->load->view('footer');
	}


}
