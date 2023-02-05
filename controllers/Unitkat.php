<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unitkat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_unitkat');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Unitkerja | Kategori';
        $data['unitkat'] = $this->M_unitkat->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/unitkat', $data);
        $this->load->view('admin/layout/footer');
    }

    public function simpan()
    {
        $this->load->library('form_validation');


        $this->form_validation->set_rules('nama_unit', 'Nama_kat', 'required|trim|is_unique[tb_unitkat.nama_unit]', [
            'is_unique' => 'Unit Kejra tidak boleh sama!'
        ]);
        $this->form_validation->set_rules('ket', 'ket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
            $data['judul'] = 'Unitkerja | Kategori';
            $data['unitkat'] = $this->M_unitkat->tampil_data()->result();
            $this->load->view('admin/layout/head', $data);
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/sidebar', $data);
            $this->load->view('admin/unitkat', $data);
            $this->load->view('admin/layout/footer');
        } else {

            $nama = $this->input->post('nama_unit');
            $ket = $this->input->post('ket');

            //buat slug
            $title = trim(strtolower($nama));
            $out = explode(" ", $title);
            $slug = implode("-", $out);

            $data = array(
                'nama_unit' => $nama,
                'ket' => $ket,
                'slug' => $slug,

            );

            $this->M_unitkat->simpan_data($data, 'tb_unitkat');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>horeee !</strong> data berhasil ditambah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('unitkat', $data);
        }
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Unitkerja Kategori | Edit';

        $where = array('id_kunit' => $id);
        $data['unitkat'] = $this->M_unitkat->edit_data($where, 'tb_unitkat')->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/unitkatedit', $data);
        $this->load->view('admin/layout/footer');
    }
    function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_unit', 'Nama_kat', 'required|trim|is_unique[tb_unitkat.nama_unit]', [
            'is_unique' => 'Kategori Unitkerja tidak boleh sama!'
        ]);
        $this->form_validation->set_rules('ket', 'ket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_kunit');

            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Opps !</strong> kategori unitkerja tidak boleh sama
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');

            redirect('unitkat/edit/' . $id, $data);
        } else {
            $id = $this->input->post('id_kunit');
            $nama = $this->input->post('nama_unit');
            $ket = $this->input->post('ket');

            //buat slug
            $title = trim(strtolower($nama));
            $out = explode(" ", $title);
            $slug = implode("-", $out);


            $data = array(
                'nama_unit' => $nama,
                'ket' => $ket,
                'slug' => $slug,

            );

            $where = array(
                'id_kunit' => $id
            );

            $this->M_unitkat->update_data($where, $data, 'tb_unitkat');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>horeee !</strong> data berhasil diupdate
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('unitkat', $data);
        }
    }
    function hapus($id)
    {
        $where = array('id_kunit' => $id);
        $this->M_unitkat->hapus_data($where, 'tb_unitkat');
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>yay !</strong> data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('unitkat', $data);
    }
}
