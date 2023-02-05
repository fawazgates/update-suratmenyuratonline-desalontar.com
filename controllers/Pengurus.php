<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengurus');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
        $this->load->library('session');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Pegawai | Data';
        $data['pengurus'] = $this->M_pengurus->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/pengurus', $data);
        $this->load->view('admin/layout/footer');
    }
    public function tambah()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Pegawai | Tambah Data';


        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/pengurustambah', $data);
        $this->load->view('admin/layout/footer');
    }
    public function simpan()
    {
        $this->load->library('form_validation');
        $data = array();
        $this->form_validation->set_rules('input_gambar', 'input', 'required');
        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('gol', 'gol', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = array();

            if ($this->input->post('submit')) {
                $upload = $this->M_pengurus->upload();

                if ($upload['result'] == "success") {
                    $this->M_pengurus->save($upload);
                    $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>horeee !</strong> data berhasil ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');

                    redirect('pengurus', $data);
                } else {
                    $data['message'] = $upload['error'];
                }
            }
        } else {
            redirect('pengurus');
        }
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning" role="alert">format foto harus jpg | png  </div>');

        redirect('pengurus/tambah' . $data);
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Pengurus | Edit';

        $where = array('id' => $id);
        $data['pengurus'] = $this->M_pengurus->edit_data($where, 'tb_pengurus')->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/pengurusedit', $data);
        $this->load->view('admin/layout/footer');
    }
    function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('gol', 'gol', 'required');

        if ($this->form_validation->run() == FALSE) {

            redirect('pengurus');
        } else {
            $id = $this->input->post('id');
            $nip = $this->input->post('nip');
            $nama = $this->input->post('nama');
            $jab = $this->input->post('jabatan');
            $gol = $this->input->post('gol');


            $data = array(
                'nip' => $nip,
                'nama' => $nama,
                'jabatan' => $jab,
                'gol' => $gol,


            );

            $where = array(
                'id' => $id
            );

            $this->M_pengurus->update_data($where, $data, 'tb_pengurus');
            redirect('pengurus');
        }
    }
    public function gtfoto()
    {
        $config['upload_path'] = './berkas/pengurus/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']  = '2048';
        $config['remove_space'] = TRUE;

        $id = $this->input->post('id');

        $data_kode = array('id' => $id);
        $foto = $this->db->get_where('tb_pengurus', $data_kode);



        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            if ($foto->num_rows() > 0) {
                $pros = $foto->row();
                $name = $pros->foto;

                if (file_exists($lok = FCPATH . '/berkas/pengurus/' . $name)) {
                    unlink($lok);
                }
                if (file_exists($lok = FCPATH . '/berkas/pengurus/' . $name)) {
                    unlink($lok);
                }
            }

            $finfo = $this->upload->data();
            $nama_foto = $finfo['file_name'];

            $data_buku = array(

                'foto' => $nama_foto
            );

            $config2 = array(
                'source_image' => 'berkas/pengurus/' . $nama_foto,
                'image_library' => 'gd2',
                'new_image' => 'berkas/pengurus/',
                'maintain_ratio' => true,
                'width' => 700,
                'height' => 600,
                'allowed_types' => 'jpg|png|jpeg',
            );

            $this->load->library('image_lib', $config2);
            $this->image_lib->resize();
        } else {
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Opsss!</strong> format harus jpg | png
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('pengurus/edit/' . $id, $data);
        }

        $this->db->where($data_kode);
        $this->db->update('tb_pengurus', $data_buku);
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>horeee !</strong> data berhasil diupdate
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('pengurus/edit/' . $id, $data);
    }

    function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_pengurus->hapus_data($where, 'tb_pengurus');
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>horee !</strong> data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('pengurus/index', $data);
    }
}
