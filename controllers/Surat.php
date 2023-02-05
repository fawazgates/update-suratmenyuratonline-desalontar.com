<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_opd');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
	}


    public function index()
    {

        $data['opd'] = $this->M_opd->tampil_data()->row();
        $this->load->view('surat/form.php',$data);
        
    }
    public function simpan(){
        $this->load->library('session');
        $data = array(
            'id'=>null,
            'nama'=>$this->input->post('nama'),
            'nik'=>$this->input->post('nik'),
            'umur'=>$this->input->post('umur'),
            'agama'=>$this->input->post('agama'),
            'jk'=>$this->input->post('jk'),
            'pekerjaan'=>$this->input->post('pekerjaan'),
            'dari_tgl'=>$this->input->post('dari_tgl'),
            'sampai_tgl'=>$this->input->post('sampai_tgl'),
            'jenis_surat'=>$this->input->post('jenis_surat'),
            'pesan'=>$this->input->post('pesan')
          );
          $query = $this->db->insert('tb_surat',$data);
          if($query){
            $this->session->set_flashdata('info', 'Pengajuan Telah Terkirim');
            redirect('surat');
          }else{
            $this->session->set_flashdata('info', 'Gagal kirim');
            redirect('surat');
             
          }
    }
}
