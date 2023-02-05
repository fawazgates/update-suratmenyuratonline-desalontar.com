<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galkat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_galkat');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Galery | Kategori';
        $data['galkat'] = $this->M_galkat->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/galkat', $data);
        $this->load->view('admin/layout/footer');
    }

    public function simpan()
    {
        $this->load->library('form_validation');


        $this->form_validation->set_rules('nama_galkat', 'Nama_kat', 'required|trim|is_unique[tb_galkat.nama_galkat]', [
            'is_unique' => 'Kategori tidak boleh sama!'
        ]);
        $this->form_validation->set_rules('ket', 'ket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
            $data['judul'] = 'Galery | Kategori';
            $data['galkat'] = $this->M_galkat->tampil_data()->result();
            $this->load->view('admin/layout/head', $data);
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/sidebar', $data);
            $this->load->view('admin/galkat', $data);
            $this->load->view('admin/layout/footer');
        } else {

            $nama = $this->input->post('nama_galkat');
            $ket = $this->input->post('ket');

            //buat slug
            $title = trim(strtolower($nama));
            $out = explode(" ", $title);
            $slug = implode("-", $out);

            $data = array(
                'nama_galkat' => $nama,
                'ket' => $ket,
                'slug' => $slug,

            );

            $this->M_galkat->simpan_data($data, 'tb_galkat');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>horeee !</strong> data berhasil ditambah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('galkat', $data);
        }
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Galery Kategori | Edit';

        $where = array('id_galkat' => $id);
        $data['galkat'] = $this->M_galkat->edit_data($where, 'tb_galkat')->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/galkatedit', $data);
        $this->load->view('admin/layout/footer');
    }
    function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_galkat', 'Nama_kat', 'required|trim|is_unique[tb_galkat.nama_galkat]', [
            'is_unique' => 'Kategori tidak boleh sama!'
        ]);
        $this->form_validation->set_rules('ket', 'ket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_galkat');

            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Opps !</strong> kategori tidak boleh sama
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('galkat/edit/' . $id, $data);
        } else {
            $id = $this->input->post('id_galkat');
            $nama = $this->input->post('nama_galkat');
            $ket = $this->input->post('ket');

            //buat slug
            $title = trim(strtolower($nama));
            $out = explode(" ", $title);
            $slug = implode("-", $out);


            $data = array(
                'nama_galkat' => $nama,
                'ket' => $ket,
                'slug' => $slug,

            );

            $where = array(
                'id_galkat' => $id
            );

            $this->M_galkat->update_data($where, $data, 'tb_galkat');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>horeee !</strong> data berhasil diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('galkat', $data);
        }
    }
    function hapus($id)
    {
        $where = array('id_galkat' => $id);
        $this->M_galkat->hapus_data($where, 'tb_galkat');
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>yay !</strong> data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('galkat', $data);
    }
}
