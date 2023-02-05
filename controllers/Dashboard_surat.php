<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_surat extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_surat');
    $this->load->helper('string');
    $this->load->helper('url', 'form', 'file');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->library('upload');

    $this->load->library('form_validation');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }
  public function index()
  {
    $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul'] = 'Pengajuan Surat | Data';
    $data['surat'] = $this->M_surat->tampil_data()->result();
    $this->load->view('admin/layout/head', $data);
    $this->load->view('admin/layout/header', $data);
    $this->load->view('admin/layout/sidebar', $data);
    $this->load->view('admin/surat', $data);
    $this->load->view('admin/layout/footer');
  }
 
}
