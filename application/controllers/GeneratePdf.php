<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePdf extends CI_Controller {

    function index()
    {
        $this->load->library('pdf');
        $html = $this->load->view('Mahasiswa/GeneratePengajuanView', [], true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }
}
?>