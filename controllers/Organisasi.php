<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organisasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_organ');
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
        $data['organ'] = $this->M_organ->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/organisasi', $data);
        $this->load->view('admin/layout/footer');
    }
    public function edit($id)
    {
        $data['judul'] = 'Sejarah | Edit';
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['organ'] = $this->M_organ->edit_data($where, 'tb_organisasi')->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/organisasiedit', $data);
        $this->load->view('admin/layout/footer');
    }
    public function update()
    {
        $config['upload_path'] = './berkas/struktur/';
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

                if (file_exists($lok = FCPATH . '/berkas/struktur/' . $name)) {
                    unlink($lok);
                }
                if (file_exists($lok = FCPATH . '/berkas/struktur/' . $name)) {
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
            redirect('organisasi/edit/' . $id, $data);
        }

        $this->db->where($data_kode);
        $this->db->update('tb_organisasi', $data_buku);
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>horeee !</strong> data berhasil diupdate
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
        redirect('organisasi', $data);
    }
}
