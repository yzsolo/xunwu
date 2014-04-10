<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('console_imf');
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
		// print_r($data);
		$this->load->view('header');
		$this->load->view('detail_l',$data);
		$this->load->view('footer');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */