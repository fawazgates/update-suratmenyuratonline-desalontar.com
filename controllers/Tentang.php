<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_sejarah');
        $this->load->model('M_opd');
        $this->load->model('M_galkat');
        $this->load->model('M_berita');
        $this->load->model('M_pubkat');
        $this->load->model('M_unitkat');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['now'] = date("j F Y");
        $data['aktif'] = 'active';
        $data['status'] = '2';
        $data['sejarah'] = $this->M_sejarah->tampil_data()->result();
        $data['opd'] = $this->M_opd->tampil_data()->result();
        $data['galkat'] = $this->M_galkat->tampil_data()->result();
        $data['pubkat'] = $this->M_pubkat->tampil_data()->result();
        $data['terkini'] = $this->M_berita->terkini()->result();
        $data['unitkat'] = $this->M_unitkat->tampil_data()->result();


        $this->load->view('layout/head', $data);
        $this->load->view('layout/header', $data);
        $this->load->view('sejarah', $data);
        $this->load->view('layout/footer', $data);
    }
}
