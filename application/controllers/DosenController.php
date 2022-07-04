<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DosenController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('email')=="") {
			redirect('LoginController','refresh');
		}
		$this->load->model('model_user');
		$this->load->model('AdminModels');
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

	public function updateStatus($id, $h)
	{
		if ($h == 1) {
			$hasil = 'disetujui';
		}else {
			$hasil = 'ditolak';
		}
		$data = array('status' => $hasil, );
		$this->AdminModels->upd('pengajuan_pembimbing', $data, ['id_pengajuan_pembimbing' => $id]);
		
		redirect('DosenController','refresh');
		
	}

	public function bimbingan()
	{
		$data['tampilan_dosen'] = "Dosen/TbBimbingan";
		$id = $this->session->userdata('id_users');
		// var_dump($id);die;
		$data['nim'] = $this->AdminModels->getmahasiswa(null)->result();
		$data['dosen'] = $this->AdminModels->getdosen($id)->row()->id_dosen;
		$data['pembimbing'] = $this->AdminModels->pengajuan_admin_dosen($data['dosen']);
		//var_dump($data['pembimbing']);die;
		
		$this->load->view('Dosen/Tview',$data);
	}

}

/* End of file DosenController.php */
/* Location: ./application/controllers/DosenController.php */