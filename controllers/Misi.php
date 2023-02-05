<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Misi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_misi');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Profil | Misi';
        $data['misi'] = $this->M_misi->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/misi', $data);
        $this->load->view('admin/layout/footer');
    }
    public function tambah()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Misi | Tambah Data';


        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/misitambah', $data);
        $this->load->view('admin/layout/footer');
    }
    function simpan()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('no', 'no', 'required');
        $this->form_validation->set_rules('misi', 'misi', 'required');

        if ($this->form_validation->run() == FALSE) {

            redirect('misi/index');
        } else {

            $no = $this->input->post('no');
            $misi = $this->input->post('misi');


            $data = array(
                'no' => $no,
                'misi' => $misi,

            );

            $this->M_misi->simpan_data($data, 'tb_misi');
            redirect('misi/index');
        }
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Misi | Edit';

        $where = array('id' => $id);
        $data['misi'] = $this->M_misi->edit_data($where, 'tb_misi')->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/misiedit', $data);
        $this->load->view('admin/layout/footer');
    }
    function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('no', 'no', 'required');
        $this->form_validation->set_rules('misi', 'misi', 'required');

        if ($this->form_validation->run() == FALSE) {

            redirect('misi/index');
        } else {
            $id = $this->input->post('id');
            $no = $this->input->post('no');
            $misi = $this->input->post('misi');


            $data = array(
                'no' => $no,
                'misi' => $misi,

            );

            $where = array(
                'id' => $id
            );

            $this->M_misi->update_data($where, $data, 'tb_misi');
            redirect('misi/index');
        }
    }
    function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_misi->hapus_data($where, 'tb_misi');
        redirect('misi/index');
    }
}
