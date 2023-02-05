<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function index()
    {

        $this->load->view('patrials_/01_head');
        $this->load->view('patrials_/02_header');
        $this->load->view('berita/berita');
        $this->load->view('patrials_/03_footer');
        $this->load->view('patrials_/04_js');
    }
}
