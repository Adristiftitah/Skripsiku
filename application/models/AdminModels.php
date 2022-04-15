<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminModels extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function cek_dosen()
	{
		$this->db->join('dosen', 'users.id_users = dosen.user_id', 'left');
		$this->db->where('level','dosen');
		return $this->db->get('users')
            ->result();	
    }

    public function pengajuan_admin()
	{
		$this->db->join('mahasiswa', 'pengajuan_admin.mahasiswa_id = mahasiswa.id_mahasiswa', 'left');
		return $this->db->get('pengajuan_admin')->result();
    }

    public function cekdosenid($id)
    {
    	return $this->db->where('id_users', $id)
		    	->get('users')
		    	->result();
    }
 
	public function tambahdosen()
	{
		$data = array(
			'id_users' => NULL,
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'level' => "dosen"

        );

		// User data array
		$this->db->insert('users', $data);

		$cek = $this->db->query('SELECT * FROM users order by id_users DESC LIMIT 1')->row();

		$dsn = array(
			'user_id' => $cek->id_users,
            'nama' => $this->input->post('nama_dsn'),
            'nip' => $this->input->post('nip'),
            'nomortelpon' => $this->input->post('nomordsn'),

        );

        $this->db->insert('dosen', $dsn);

		if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	public function ubahdosen($id)
	{
		$data = array(
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'level' => "dosen"
        );

		// User data array
		

		$cek = $this->db->query("SELECT * FROM users where id_users = $id order by id_users DESC LIMIT 1")->row();

		$dsn = array(
			'user_id' => $cek->id_users,
            'nama' => $this->input->post('nama_dsn'),
            'nip' => $this->input->post('nip'),
            'nomortelpon' => $this->input->post('nomordsn'),

        );
		$where1 = array('id_users' => $id);
		$where = array('user_id' => $id);

        $this->db->update('dosen', $dsn, $where);
        $this->db->update('users', $data, $where1);


		// if ($this->db->affected_rows() > 0) {
  //           return TRUE;
  //       } else {
  //           return FALSE;
  //       }
    }

	public function hapusdosen($id)
	{
		$this->db->where('user_id', $id)->delete('dosen');
		$this->db->where('id_users', $id)->delete('users');

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	public function perusahaan()
	{
		return $this->db->get('perusahaan')->result();
	}

	public function tambahperusahaan()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telpon' => $this->input->post('telpon'),
			'qty' => $this->input->post('qty'),
			'penanggung_jawab' => $this->input->post('penanggung_jawab')

		);

		$this->db->insert('perusahaan', $data);
		if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}

	public function hapusperusahaan($id)
	{
		$this->db->where('id_perusahaan', $id)->delete('perusahaan');

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
	}
	public function ubahperusahaan($id)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'telpon' => $this->input->post('telpon'),
			'qty' => $this->input->post('qty'),
			'penanggung_jawab' => $this->input->post('penanggung_jawab')

		);

		// User data array
		
		$where = array('id_perusahaan' => $id);

        $this->db->update('perusahaan', $data, $where);


		// if ($this->db->affected_rows() > 0) {
  //           return TRUE;
  //       } else {
  //           return FALSE;
  //       }
    }

    public function databimbingan()
    {
    	$this->db->query("SELECT dosen.nama, pengajuan_pembimbing.nim, count(pengajuan_pembimbing.dosen_id) FROM 'pengajuan_pembimbing' JOIN dosen ON pengajuan_pembimbing.dosen_id = dosen.id_dosen JOIN mahasiswa ON pengajuan_pembimbing.nim = mahasiswa.id_mahasiswa GROUP BY dosen_id , mahasiswa.kodeprodi")->result();
    	
    }

}

/* End of file Admin.php */
/* Location: ./application/models/Admin.php */
