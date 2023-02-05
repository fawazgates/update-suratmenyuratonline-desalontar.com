<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_galery');
        $this->load->model('M_galkat');
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
        $data['judul'] = 'Galery | Data';
        $data['gal'] = $this->M_galery->tampil_data()->result();
        $data['galkat'] = $this->M_galkat->tampil_data()->result();
        $data['gk'] = $this->M_galery->galandkat();
        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/galery', $data);
        $this->load->view('admin/layout/footer');
    }
    public function tambah()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Galery | Tambah Data';
        $data['galkat'] = $this->M_galkat->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/galtambah', $data);
        $this->load->view('admin/layout/footer');
    }

    public function simpan()
    {
        $config['upload_path']          = './berkas/galery/';
        $config['allowed_types']        = 'jpg|png|jpeg';


        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Opss! gagal upload data,</strong> pastikan format file berekstensi jpg | png | jpeg
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
            redirect('galery/tambah', $data);
        } else {
            $image_data = $this->upload->data();
            //compress

            // $config['image_library'] = 'gd2';
            // $config['source_image'] = './berkas/galery/' . $image_data['file_name'];
            // $config['create_thumb'] = FALSE;
            // $config['maintain_ratio'] = FALSE;
            // $config['quality'] = '20%';
            // $config['width'] = 600;
            // $config['height'] = 400;
            // $config['new_image'] = './assets/images/' . $image_data['file_name'];
            // $this->load->library('image_lib', $config);
            // $this->image_lib->resize();
            // $this->upload->initialize($config);
            $imgdata = file_get_contents($image_data['full_path']);
            // $file_encode = base64_encode($imgdata);
            $data['id_galkat'] = $this->input->post('id_galkat');

            $data['ket'] = $this->input->post('ket');
            $data['file'] =  $this->upload->data('file_name');
            $data['tgl_upload'] = date('y-m-d');

            $this->db->insert('tb_galery', $data);
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Hore !</strong> data berhasil disimpan
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
            redirect('galery', $data);
        }
    }
    public function edit($id)
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Galery | Edit';

        $where = array('id_gal' => $id);
        $data['galedit'] = $this->M_galery->edit_data($where, 'tb_galery')->result();
        $data['galkat'] = $this->M_galkat->tampil_data()->result();


        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/galedit', $data);
        $this->load->view('admin/layout/footer');
    }

    function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('ket', 'ket', 'required');


        if ($this->form_validation->run() == FALSE) {

            redirect('galery');
        } else {
            $id = $this->input->post('id_gal');
            $nmp = $this->input->post('ket');
            $kat = $this->input->post('id_galkat');



            $data = array(
                'ket' => $nmp,
                'id_galkat' => $kat,



            );

            $where = array(
                'id_gal' => $id
            );

            $this->M_galery->update_data($where, $data, 'tb_galery');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>yay !</strong> data berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
            redirect('galery', $data);
        }
    }
    public function gtfile()
    {
        $config['upload_path'] = './berkas/galery/';
        $config['allowed_types'] = 'jpg|png|jpeg';



        $id = $this->input->post('id_gal');

        $data_kode = array('id_gal' => $id);
        $foto = $this->db->get_where('tb_galery', $data_kode);

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            if ($foto->num_rows() > 0) {
                $pros = $foto->row();
                $name = $pros->foto;

                if (file_exists($lok = FCPATH . '/berkas/galery/' . $name)) {
                    unlink($lok);
                }
                if (file_exists($lok = FCPATH . '/berkas/galery/' . $name)) {
                    unlink($lok);
                }
            }

            $finfo = $this->upload->data();
            $nama_foto = $finfo['file_name'];

            $data_buku = array(

                'file' => $nama_foto
            );

            $config2 = array(
                'source_image' => 'berkas/galery/' . $nama_foto,
                'image_library' => 'gd2',
                'new_image' => 'berkas/galery/',

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
            redirect('galery/edit/' . $id, $data);
        }

        $this->db->where($data_kode);
        $this->db->update('tb_galery', $data_buku);
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>horeee !</strong> data berhasil diupdate
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('galery/edit/' . $id, $data);
    }
    function hapus($id)
    {
        $where = array('id_gal' => $id);
        $this->M_galery->hapus_data($where, 'tb_galery');
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>yay !</strong> data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('galery', $data);
    }
}
