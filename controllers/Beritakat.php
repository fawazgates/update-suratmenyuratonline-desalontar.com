<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beritakat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_beritakat');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Berita | Kategori';
        $data['bk'] = $this->M_beritakat->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/beritakat', $data);
        $this->load->view('admin/layout/footer');
    }

    public function simpan()
    {
        $this->load->library('form_validation');


        $this->form_validation->set_rules('nama_kat', 'Nama_kat', 'required|trim|is_unique[tb_katberita.nama_kat]', [
            'is_unique' => 'Kategori berita tidak boleh sama!'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
            $data['judul'] = 'Berita | Kategori';
            $data['bk'] = $this->M_beritakat->tampil_data()->result();
            $this->load->view('admin/layout/head', $data);
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/sidebar', $data);
            $this->load->view('admin/beritakat', $data);
            $this->load->view('admin/layout/footer');
        } else {

            $nama = $this->input->post('nama_kat');


            //buat slug
            $title = trim(strtolower($nama));
            $out = explode(" ", $title);
            $slug = implode("-", $out);

            $data = array(
                'nama_kat' => $nama,

                'slug_k' => $slug,

            );

            $this->M_beritakat->simpan_data($data, 'tb_katberita');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>horeee !</strong> data berhasil ditambah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('beritakat', $data);
        }
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Berita Kategori | Edit';

        $where = array('id_beritakat' => $id);
        $data['bk'] = $this->M_beritakat->edit_data($where, 'tb_katberita')->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/beritakatedit', $data);
        $this->load->view('admin/layout/footer');
    }
    function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_kat', 'Nama_kat', 'required|trim|is_unique[tb_katberita.nama_kat]', [
            'is_unique' => 'Kategori berita sudah ada !'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_beritakat');

            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Opps !</strong> kategori berita sudah ada 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('beritakat/edit/' . $id, $data);
        } else {
            $id = $this->input->post('id_beritakat');
            $nama = $this->input->post('nama_kat');


            //buat slug
            $title = trim(strtolower($nama));
            $out = explode(" ", $title);
            $slug = implode("-", $out);


            $data = array(
                'nama_kat' => $nama,

                'slug_k' => $slug,

            );

            $where = array(
                'id_beritakat' => $id
            );

            $this->M_beritakat->update_data($where, $data, 'tb_katberita');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>horeee !</strong> data berhasil diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('beritakat', $data);
        }
    }
    function hapus($id)
    {
        $where = array('id_beritakat' => $id);
        $this->M_beritakat->hapus_data($where, 'tb_katberita');
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>yay !</strong> data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('beritakat', $data);
    }
}
