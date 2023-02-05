<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_unit');
        $this->load->model('M_unitkat');
        $this->load->model('M_pengurus');
        $this->load->helper('url', 'form', 'file');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Unitkerja | Data';
        $data['unit'] = $this->M_unit->tampil_data()->result();
        $data['unitkat'] = $this->M_unitkat->tampil_data()->result();
        $data['uk'] = $this->M_unit->unitandkat();
        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/unitkerja', $data);
        $this->load->view('admin/layout/footer');
    }

    public function tambah()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Unitkerja | Tambah Data';
        $data['p'] = $this->M_pengurus->tampil_data()->result();
        $data['u'] = $this->M_unitkat->tampil_data()->result();
        $data['uk'] = $this->M_unit->unitandkat();
        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/unitbuat', $data);
        $this->load->view('admin/layout/footer');
    }

    public function simpan()
    {

        $this->load->library('form_validation');


        $this->form_validation->set_rules('id_kunit', 'Id_kunit', 'required|trim|is_unique[tb_unit.id_kunit]', [
            'is_unique' => 'Unit Kejra tidak boleh sama!'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();

            $data['judul'] = 'Unitkerja | Tambah Data';
            $data['p'] = $this->M_pengurus->tampil_data()->result();
            $data['u'] = $this->M_unitkat->tampil_data()->result();
            $data['uk'] = $this->M_unit->unitandkat();


            $this->load->view('admin/layout/head', $data);
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/sidebar', $data);
            $this->load->view('admin/unitbuat', $data);
            $this->load->view('admin/layout/footer');
        } else {

            $ik = $this->input->post('id_kunit');
            $id = $this->input->post('id');
            $ket = $this->input->post('deskripsi');



            $data = array(
                'id_kunit' => $ik,
                'id' => $id,
                'deskripsi' => $ket,

            );

            $this->M_unit->simpan_data($data, 'tb_unit');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>horeee !</strong> data berhasil ditambah
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('unit', $data);
        }
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Unitkerja | Edit';

        $where = array('id_unit' => $id);
        $data['unitedit'] = $this->M_unit->edit_data($where, 'tb_unit')->result();

        $data['peng'] = $this->M_pengurus->tampil_data()->result();

        $data['u'] = $this->M_unitkat->tampil_data()->result();
        $data['uk'] = $this->M_unit->unitandkat();
        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/unitedit', $data);
        $this->load->view('admin/layout/footer');
    }

    function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id', 'id', 'required');


        if ($this->form_validation->run() == FALSE) {

            redirect('unit');
        } else {
            $id = $this->input->post('id_unit');

            $idp = $this->input->post('id');
            $ket = $this->input->post('deskripsi');



            $data = array(

                'id' => $idp,
                'deskripsi' => $ket,



            );

            $where = array(
                'id_unit' => $id
            );

            $this->M_unit->update_data($where, $data, 'tb_unit');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>yay !</strong> data berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
            redirect('unit', $data);
        }
    }
    public function gtfile()
    {
        $config['upload_path'] = './berkas/filepub/';
        $config['allowed_types'] = 'pdf';


        $id = $this->input->post('id_pub');

        $data_kode = array('id_pub' => $id);
        $foto = $this->db->get_where('tb_publikasi', $data_kode);

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            if ($foto->num_rows() > 0) {
                $pros = $foto->row();
                $name = $pros->foto;

                if (file_exists($lok = FCPATH . '/berkas/filepub/' . $name)) {
                    unlink($lok);
                }
                if (file_exists($lok = FCPATH . '/berkas/filepub/' . $name)) {
                    unlink($lok);
                }
            }

            $finfo = $this->upload->data();
            $nama_foto = $finfo['file_name'];

            $data_buku = array(

                'file' => $nama_foto
            );

            $config2 = array(
                'source_image' => 'berkas/filepub/' . $nama_foto,
                'image_library' => 'gd2',
                'new_image' => 'berkas/filepub/',

                'allowed_types' => 'pdf',
            );

            $this->load->library('image_lib', $config2);
            $this->image_lib->resize();
        } else {
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Opsss!</strong> format harus .pdf
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
            redirect('publikasi/edit/' . $id, $data);
        }

        $this->db->where($data_kode);
        $this->db->update('tb_publikasi', $data_buku);
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>horeee !</strong> data berhasil diupdate
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('publikasi/edit/' . $id, $data);
    }
    function hapus($id)
    {
        $where = array('id_unit' => $id);
        $this->M_unit->hapus_data($where, 'tb_unit');
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>yay !</strong> data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('unit', $data);
    }
}
