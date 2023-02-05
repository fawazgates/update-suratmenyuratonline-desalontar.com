<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengumuman');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Pemgumuman | Misi';
        $data['pengumuman'] = $this->M_pengumuman->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/pengumuman', $data);
        $this->load->view('admin/layout/footer');
    }
    public function tambah()
    {
        $data['judul'] = 'Pengumuman | Tambah Data';


        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/pengumumantambah', $data);
        $this->load->view('admin/layout/footer');
    }
    function simpan()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('no', 'no', 'required');
        $this->form_validation->set_rules('misi', 'misi', 'required');

        if ($this->form_validation->run() == FALSE) {

            redirect('pengumuman/index');
        } else {

            $no = $this->input->post('no');
            $misi = $this->input->post('misi');


            $data = array(
                'no' => $no,
                'misi' => $misi,

            );

            $this->M_pengumuman->simpan_data($data, 'tb_pengumuman');
            redirect('pengumuman/index');
        }
    }
    public function edit($id)
    {
        $data['judul'] = 'pengumuman | Edit';

        $where = array('id' => $id);
        $data['misi'] = $this->M_pengumuman->edit_data($where, 'tb_pengumuman')->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/pengumumanedit', $data);
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

            $this->M_pengumuman->update_data($where, $data, 'tb_pengumuman');
            redirect('misi/index');
        }
    }
    function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_pengumuman->hapus_data($where, 'tb_pengumuman');
        redirect('pengumuman/index');
    }
}
