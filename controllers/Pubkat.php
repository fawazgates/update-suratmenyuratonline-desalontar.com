<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pubkat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pubkat');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Publikasi | Kategori';
        $data['pubkat'] = $this->M_pubkat->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/pubkat', $data);
        $this->load->view('admin/layout/footer');
    }

    public function simpan()
    {
        $this->load->library('form_validation');


        $this->form_validation->set_rules('nama_kat', 'Nama_kat', 'required|trim|is_unique[tb_pubkat.nama_kat]', [
            'is_unique' => 'Kategori tidak boleh sama!'
        ]);
        $this->form_validation->set_rules('ket', 'ket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
            $data['judul'] = 'Publikasi | Kategori';
            $data['pubkat'] = $this->M_pubkat->tampil_data()->result();
            $this->load->view('admin/layout/head', $data);
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/sidebar', $data);
            $this->load->view('admin/pubkat', $data);
            $this->load->view('admin/layout/footer');
        } else {

            $nama = $this->input->post('nama_kat');
            $ket = $this->input->post('ket');

            //buat slug
            $title = trim(strtolower($nama));
            $out = explode(" ", $title);
            $slug = implode("-", $out);

            $data = array(
                'nama_kat' => $nama,
                'ket' => $ket,
                'slug' => $slug,

            );

            $this->M_pubkat->simpan_data($data, 'tb_pubkat');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>horeee !</strong> data berhasil ditambah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('pubkat', $data);
        }
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Publikasi | Edit';

        $where = array('id_kat' => $id);
        $data['pubkat'] = $this->M_pubkat->edit_data($where, 'tb_pubkat')->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/pubkatedit', $data);
        $this->load->view('admin/layout/footer');
    }
    function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_kat', 'Nama_kat', 'required|trim|is_unique[tb_pubkat.nama_kat]', [
            'is_unique' => 'Kategori tidak boleh sama!'
        ]);
        $this->form_validation->set_rules('ket', 'ket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_kat');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Opps !</strong> kategori tidak boleh sama
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('pubkat/edit/' . $id, $data);
        } else {
            $id = $this->input->post('id_kat');
            $nama = $this->input->post('nama_kat');
            $ket = $this->input->post('ket');

            //buat slug
            $title = trim(strtolower($nama));
            $out = explode(" ", $title);
            $slug = implode("-", $out);


            $data = array(
                'nama_kat' => $nama,
                'ket' => $ket,
                'slug' => $slug,

            );

            $where = array(
                'id_kat' => $id
            );

            $this->M_pubkat->update_data($where, $data, 'tb_pubkat');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>horeee !</strong> data berhasil diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('pubkat', $data);
        }
    }
    function hapus($id)
    {
        $where = array('id_kat' => $id);
        $this->M_pubkat->hapus_data($where, 'tb_pubkat');
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>yay !</strong> data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('pubkat', $data);
    }
}
