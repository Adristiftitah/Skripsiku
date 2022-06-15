<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MahasiswaController extends CI_Controller {

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
		$data['tampilan_mahasiswa'] = "Mahasiswa/Dashboard";
		$this->load->view('Mahasiswa/Tview',$data);

	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('LoginController');
	}

	public function addproposal()
	{
		$data['tampilan_mahasiswa'] = "Mahasiswa/PengajuanProposal";
		$id = $this->session->userdata('id_users');

		$data['proposal'] = $this->AdminModels->pengajuan_admin($id);
		
		$this->load->view('Mahasiswa/Tview',$data);
	}

	public function insproposal()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '3000';

		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		}
		else{
			$id = $this->session->userdata('id_users');
			
			$user = $this->AdminModels->getmahasiswa($id)->row();
			$data = array(
				'mahasiswa_id' => $user->id_mahasiswa,
				'file_pengajuan' => $this->upload->data('file_name'),
				'create_at' => date('Y-m-d')
			);
			$this->AdminModels->ins('pengajuan_admin',$data);
			redirect('MahasiswaController/addproposal');
		}
	}

	public function addpembimbing()
	{
		$data['tampilan_mahasiswa'] = "Mahasiswa/PengajuanPembimbing";
		$id = $this->session->userdata('id_users');
		$data['nim'] = $this->AdminModels->getmahasiswa($id)->row()->nim;
		$data['dosen'] = $this->AdminModels->getdosen(null)->result();
		$data['pembimbing'] = $this->AdminModels->pengajuan_pembimbing($data['nim']);
		
		$this->load->view('Mahasiswa/Tview',$data);
	}


	public function inspembimbing()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '3000';

		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_errors());
			echo $this->upload->display_errors();
		}
		else{
			$id = $this->session->userdata('id_users');
			
			$user = $this->AdminModels->getmahasiswa($id)->row();
			$nim2 = $this->input->post('nim1');
			$nim3 = $this->input->post('nim2');
			$data = array(
				'nim' => $this->input->post('nim'),
				'dosen_id' => $this->input->post('dosen'),
				'file_pengajuan' => $this->upload->data('file_name'),
				'status' => 'diproses',
				'create_at' => date('Y-m-d')
			);
			if ($nim2 != null) {
				$data['nim2'] = $nim2;
			}

			if($nim3 != null){
				$data['nim3'] = $nim3;
			}
			
			$this->AdminModels->ins('pengajuan_pembimbing',$data);
			redirect('MahasiswaController/addpembimbing');
		}
	}

	public function inPerusahaan()
	{
		$data['tampilan_mahasiswa'] = "Mahasiswa/PerusahaanInfo";
		$data['perusahaan'] = $this->AdminModels->perusahaan();
		$this->load->view('Mahasiswa/Tview',$data);

	}

}

/* End of file MahasiswaController.php */
/* Location: ./application/controllers/MahasiswaController.php */