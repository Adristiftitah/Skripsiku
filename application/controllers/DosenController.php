<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DosenController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('email')=="") {
			redirect('LoginController','refresh');

			$this->load->model('model_user');
 			$this->load->model('DosenModels');
		}
		$this->load->helper('text');
	}

	public function index()
	{
		$data['email'] = $this->session->userdata('email');
		$data['tampilan_dosen'] = "Dosen/Dashboard";
		$this->load->view('Dosen/Tview',$data);
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('LoginController');
	}

}

/* End of file DosenController.php */
/* Location: ./application/controllers/DosenController.php */