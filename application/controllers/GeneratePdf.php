<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePdf extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModels');
		setlocale(LC_ALL, 'id_ID');
	}


    function index($id)
    {
        $data['proposal'] = $this->AdminModels->pengajuan_admin($id);
        // var_dump($data['proposal']);die;
        $bulan = array (1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $data['bulan']= $bulan;
        $this->load->library('pdf');
        $html = $this->load->view('Mahasiswa/GeneratePengajuanView',$data, true);
        $this->pdf->createPDF($html, 'mypdf', false);
        
    }

    function tanggal_indo($tanggal)
    {
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode(' ', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }


}
?>