<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller {
 
 	public function __construct()
 	{
 		parent::__construct();
 		
 		$this->load->model('AdminModels');
 		
 	}
	
	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE){
			if ($this->session->userdata('level') == "admin") {
				$dosen = $this->AdminModels->cek_dosen();
				$data['dosen'] = $dosen;
				$data['tampilan_admin']="Admin/Dashboard";
				$this->load->view('Admin/Tview',$data);
			}else{
				// $this->load->view('restricted');
				redirect('LoginController/cek_login');
			}
		}else{
			$this->load->view('LoginController/cek_login');
		}

	} 

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('LoginController');
	}

	public function getmahasiswa()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
            if ($this->session->userdata('level') == "admin") {
                $data['tampilan_admin'] = 'Admin/Mahasiswa';
                $data['pengajuan'] = $this->AdminModels->pengajuan_admin(null);
				$data['dosen'] = $this->AdminModels->getdosen(null)->result();
				// var_dump($data['pengajuan']);
				// die();
                $this->load->view('Admin/Tview', $data);
            } else {
                redirect('LoginController');
            }
        } else {
            $this->load->view('LoginController/cek_login');
        }
	}
	
	public function downloadPengajuan($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->from('pengajuan_admin');
		$query = $this->db->get();
		$nama_file = $query->row()->file_pengajuan;
		force_download('uploads/'.$nama_file, NULL);
	}
	public function downloadBalasan($id)
	{
		$this->db->where('id_pengajuan', $id);
		$this->db->from('pengajuan_admin');
		$query = $this->db->get();
		$nama_file = $query->row()->file_balasan;
		force_download('assets/balasan/'.$nama_file, NULL);
	}

	public function dosen()
	{
		$data['tampilan_admin'] = "Admin/DosenB";
		$data['dosen'] = $this->AdminModels->databimbingan();
		$this->load->view('Admin/Tview',$data);
	}

	public function tambahdosen()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
            if ($this->session->userdata('level') == "admin") {
                $data['tampilan_admin'] = 'Admin/DDosen';
                $data['dosen'] = $this->AdminModels->cek_dosen();
                $this->load->view('Admin/Tview', $data);
            } else {
                $this->load->view('restricted');
            }
        } else {
            $this->load->view('LoginController/cek_login');
        }
		
	} 

	public function dosendadd()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') == "admin") {
				if ($this->input->post('submit')) {
					$this->form_validation->set_rules('nama_dsn','NAMA_DSN','required');
					$this->form_validation->set_rules('nip','NIP','required');
					$this->form_validation->set_rules('email','EMAIL', 'required');
					$this->form_validation->set_rules('password','PASSWORD', 'required');
					$this->form_validation->set_rules('nomordsn','NOMORDSN','required');
					

					if ($this->form_validation->run() == TRUE) {
		                if ($this->AdminModels->tambahdosen() == TRUE) {
		                    $data['tampilan_admin'] = 'Admin/DDosen';
                            $data['notif'] = 'Tambah berhasil!';
                			$data['dosen'] = $this->AdminModels->cek_dosen();

                            $this->load->view('Admin/Tview', $data);
		                } else {
		                    $data['tampilan_admin'] = 'Admin/DDosen';
                            $data['notif'] = 'Tambah gagal';
               				$data['dosen'] = $this->AdminModels->cek_dosen();

                            $this->load->view('Admin/Tview', $data);
                    }
		            } else {
		                // jika gagal
		                $data['notif'] = validation_errors();
                		$data['dosen'] = $this->AdminModels->cek_dosen();
		                $this->load->view('Admin/DDosen', $data);
		            }
		        }else{
		            $this->load->view('LoginController/cek_login');
		        }
			}
		}

		
		// $data['tampilan_admin'] = "Admin/DDosen";
		// $this->load->view('Admin/Tview',$data);
	}

	public function dosenedit($id)
	{
		$this->AdminModels->ubahdosen($id);
		redirect('DashboardAdmin/tambahdosen');
	}

	public function dosendelete($id)
	{
		$this->AdminModels->hapusdosen($id);
		redirect('DashboardAdmin/tambahdosen');
	}

	

	public function perusahaan()
	{
		$data['tampilan_admin'] = "Admin/perusahaan";
		$data['perusahaan'] = $this->AdminModels->perusahaan();
		$this->load->view('Admin/Tview',$data);
	}

	public function perusahaanadd()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') == "admin") {
				if ($this->input->post('submit')) {
					$this->form_validation->set_rules('nama','NAMA','required');
					$this->form_validation->set_rules('alamat','ALAMAT','required');
					$this->form_validation->set_rules('telpon','TELPON', 'required');
					$this->form_validation->set_rules('qty','QTY', 'required');
					$this->form_validation->set_rules('penanggung_jawab','PENANGGUNG_JAWAB','required');
					

					if ($this->form_validation->run() == TRUE) {
		                if ($this->AdminModels->tambahperusahaan() == TRUE) {
		                    redirect('DashboardAdmin/perusahaan','refresh');
		                } else {
		                    $data['tampilan_admin'] = 'Admin/perusahaan';
                            $data['notif'] = 'Tambah gagal';
               				$data['perusahaan'] = $this->AdminModels->perusahaan();

                            $this->load->view('Admin/Tview', $data);
                    }
		            } else {
		                // jika gagal
		                $data['notif'] = validation_errors();
                		$data['perusahaan'] = $this->AdminModels->perusahaan();
		                $this->load->view('Admin/perusahaan', $data);
		            }
		        }else{
		            $this->load->view('LoginController/cek_login');
		        }
			}
		}
	}

	public function perusahaandelete($id)
	{
		$this->AdminModels->hapusperusahaan($id);
		redirect('DashboardAdmin/perusahaan');
	}

	public function perusahaanedit($id)
	{
		$this->AdminModels->ubahperusahaan($id);
		redirect('DashboardAdmin/perusahaan');
	}

	public function dosenbimbingan($id)
	{
		$data['tampilan_admin'] = "Admin/dosenbimbingan";
		$data['perusahaan'] = $this->AdminModels->databimbingan();
		$this->load->view('Admin/Tview',$data);
	}

	public function uploadBalasan()
	{
		$config['upload_path'] = './assets/balasan/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '3072';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (! $this->upload->do_upload('file')){
			$error = array('error' => $this->upload->display_error());
			echo $this->upload->display_error();
		}
		else{
			$data = array('file_balasan' => $this->upload->data('file_name'));
			$this->AdminModels->upd('pengajuan_admin',$data,['id_pengajuan' => $this->input->post('idd')]);
			redirect('DashboardAdmin/getmahasiswa');
		}
	}

	public function uploadPembimbing()
	{
		$data = array('id_pembimbing' => $this->input->post('dosen'));
		$this->AdminModels->upd('pengajuan_admin',$data,['id_pengajuan' => $this->input->post('idd')]);
		
		redirect('DashboardAdmin/getmahasiswa');
	}


}

/* End of file dashboardAdmin.php */
/* Location: ./application/controllers/dashboardAdmin.php */