<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_unit');
        $this->load->model('M_unitkat');
        $this->load->model('M_pengurus');
        $this->load->model('M_slide');
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
        $data['judul'] = 'Pengaturan | Slide';
        $data['sl'] = $this->M_slide->tampil_data()->result();


        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/slide', $data);
        $this->load->view('admin/layout/footer');
    }





    public function satu()
    {
        $config['upload_path'] = './berkas/slide/';
        $config['allowed_types'] = 'jpg|png|jpeg';



        $id = $this->input->post('id');

        $data_kode = array('id' => $id);
        $foto = $this->db->get_where('tb_slider', $data_kode);

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('slider1')) {
            if ($foto->num_rows() > 0) {
                $pros = $foto->row();
                $name = $pros->foto;

                if (file_exists($lok = FCPATH . '/berkas/slide/' . $name)) {
                    unlink($lok);
                }
                if (file_exists($lok = FCPATH . '/berkas/slide/' . $name)) {
                    unlink($lok);
                }
            }

            $finfo = $this->upload->data();
            $nama_foto = $finfo['file_name'];

            $data_buku = array(

                'slider1' => $nama_foto
            );

            $config2 = array(
                'source_image' => 'berkas/slide/' . $nama_foto,
                'image_library' => 'gd2',
                'new_image' => 'berkas/slide/',

                'allowed_types' => 'jpg|png|jpeg',
            );

            $this->load->library('image_lib', $config2);
            $this->image_lib->resize();
        } else {
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Opsss!</strong> format harus JPG | PNG | JPEG
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
            redirect('slider/', $data);
        }

        $this->db->where($data_kode);
        $this->db->update('tb_slider', $data_buku);
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>horeee !</strong> data berhasil diupdate
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('slider/', $data);
    }
    public function dua()
    {
        $config['upload_path'] = './berkas/slide/';
        $config['allowed_types'] = 'jpg|png|jpeg';



        $id = $this->input->post('id');

        $data_kode = array('id' => $id);
        $foto = $this->db->get_where('tb_slider', $data_kode);

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('slider2')) {
            if ($foto->num_rows() > 0) {
                $pros = $foto->row();
                $name = $pros->foto;

                if (file_exists($lok = FCPATH . '/berkas/slide/' . $name)) {
                    unlink($lok);
                }
                if (file_exists($lok = FCPATH . '/berkas/slide/' . $name)) {
                    unlink($lok);
                }
            }

            $finfo = $this->upload->data();
            $nama_foto = $finfo['file_name'];

            $data_buku = array(

                'slider2' => $nama_foto
            );

            $config2 = array(
                'source_image' => 'berkas/slide/' . $nama_foto,
                'image_library' => 'gd2',
                'new_image' => 'berkas/slide/',

                'allowed_types' => 'jpg|png|jpeg',
            );

            $this->load->library('image_lib', $config2);
            $this->image_lib->resize();
        } else {
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Opsss!</strong> format harus JPG | PNG | JPEG
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
            redirect('slider/', $data);
        }

        $this->db->where($data_kode);
        $this->db->update('tb_slider', $data_buku);
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>horeee !</strong> data berhasil diupdate
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('slider/', $data);
    }


    public function tiga()
    {
        $config['upload_path'] = './berkas/slide/';
        $config['allowed_types'] = 'jpg|png|jpeg';



        $id = $this->input->post('id');

        $data_kode = array('id' => $id);
        $foto = $this->db->get_where('tb_slider', $data_kode);

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('slider3')) {
            if ($foto->num_rows() > 0) {
                $pros = $foto->row();
                $name = $pros->foto;

                if (file_exists($lok = FCPATH . '/berkas/slide/' . $name)) {
                    unlink($lok);
                }
                if (file_exists($lok = FCPATH . '/berkas/slide/' . $name)) {
                    unlink($lok);
                }
            }

            $finfo = $this->upload->data();
            $nama_foto = $finfo['file_name'];

            $data_buku = array(

                'slider3' => $nama_foto
            );

            $config2 = array(
                'source_image' => 'berkas/slide/' . $nama_foto,
                'image_library' => 'gd2',
                'new_image' => 'berkas/slide/',

                'allowed_types' => 'jpg|png|jpeg',
            );

            $this->load->library('image_lib', $config2);
            $this->image_lib->resize();
        } else {
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Opsss!</strong> format harus JPG | PNG | JPEG
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
            redirect('slider/', $data);
        }

        $this->db->where($data_kode);
        $this->db->update('tb_slider', $data_buku);
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>horeee !</strong> data berhasil diupdate
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('slider/', $data);
    }

    public function empat()
    {
        $config['upload_path'] = './berkas/slide/';
        $config['allowed_types'] = 'jpg|png|jpeg';



        $id = $this->input->post('id');

        $data_kode = array('id' => $id);
        $foto = $this->db->get_where('tb_slider', $data_kode);

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('slider4')) {
            if ($foto->num_rows() > 0) {
                $pros = $foto->row();
                $name = $pros->foto;

                if (file_exists($lok = FCPATH . '/berkas/slide/' . $name)) {
                    unlink($lok);
                }
                if (file_exists($lok = FCPATH . '/berkas/slide/' . $name)) {
                    unlink($lok);
                }
            }

            $finfo = $this->upload->data();
            $nama_foto = $finfo['file_name'];

            $data_buku = array(

                'slider4' => $nama_foto
            );

            $config2 = array(
                'source_image' => 'berkas/slide/' . $nama_foto,
                'image_library' => 'gd2',
                'new_image' => 'berkas/slide/',

                'allowed_types' => 'jpg|png|jpeg',
            );

            $this->load->library('image_lib', $config2);
            $this->image_lib->resize();
        } else {
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Opsss!</strong> format harus JPG | PNG | JPEG
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
            redirect('slider/', $data);
        }

        $this->db->where($data_kode);
        $this->db->update('tb_slider', $data_buku);
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>horeee !</strong> data berhasil diupdate
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('slider/', $data);
    }
}
