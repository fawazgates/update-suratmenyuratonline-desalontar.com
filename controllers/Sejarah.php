<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sejarah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_sejarah');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
     
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Profil | Sejarah';
        $data['sejarah'] = $this->M_sejarah->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/sejarah', $data);
        $this->load->view('admin/layout/footer');
    }
    public function edit($id)
    {
        $data['judul'] = 'Sejarah | Edit';
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['sejarah'] = $this->M_sejarah->edit_data($where, 'tb_sejarah')->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/sejarahedit', $data);
        $this->load->view('admin/layout/footer');
    }
    function update()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('isi', 'isi', 'required');

        if ($this->form_validation->run() == FALSE) {

            redirect('visi/index');
        } else {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');


            $data = array(
                'judul' => $judul,
                'isi' => $isi,
                

            );

            $where = array(
                'id' => $id
            );

            $this->M_sejarah->update_data($where, $data, 'tb_sejarah');
            redirect('sejarah/index');
        }
    }
}
