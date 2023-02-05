<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publikasi extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_publikasi');
    $this->load->model('M_pubkat');
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
    $data['judul'] = 'Publikasi | Data';
    $data['pub'] = $this->M_publikasi->tampil_data()->result();
    $data['pubkat'] = $this->M_pubkat->tampil_data()->result();
    $data['pk'] = $this->M_publikasi->pubandkat();
    $this->load->view('admin/layout/head', $data);
    $this->load->view('admin/layout/header', $data);
    $this->load->view('admin/layout/sidebar', $data);
    $this->load->view('admin/publikasi', $data);
    $this->load->view('admin/layout/footer');
  }

  public function simpan()
  {
    $config['upload_path']          = './berkas/filepub/';
    $config['allowed_types']        = 'pdf';

    $this->upload->initialize($config);
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('file')) {
      $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Opss! gagal upload data,</strong> pastikan format file berekstensi .pdf
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect('publikasi', $data);
    } else {
      $image_data = $this->upload->data();
      $imgdata = file_get_contents($image_data['full_path']);
      // $file_encode = base64_encode($imgdata);
      $data['id_kat'] = $this->input->post('id_kat');
      $data['nama_pub'] = $this->input->post('nama_pub');
      $data['file'] =  $this->upload->data('file_name');
      $data['tgl_upload'] = date('y-m-d');

      $this->db->insert('tb_publikasi', $data);
      $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Hore !</strong> data berhasil disimpan
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect('publikasi', $data);
    }
  }
  public function edit($id)
  {
    $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul'] = 'Publikasi | Edit';

    $where = array('id_pub' => $id);
    $data['pubedit'] = $this->M_publikasi->edit_data($where, 'tb_publikasi')->result();
    $data['pubkat'] = $this->M_pubkat->tampil_data()->result();

    $this->load->view('admin/layout/head', $data);
    $this->load->view('admin/layout/header', $data);
    $this->load->view('admin/layout/sidebar', $data);
    $this->load->view('admin/pubedit', $data);
    $this->load->view('admin/layout/footer');
  }

  function update()
  {
    $this->load->library('form_validation');

    $this->form_validation->set_rules('nama_pub', 'nama_pub', 'required');


    if ($this->form_validation->run() == FALSE) {

      redirect('publikasi');
    } else {
      $id = $this->input->post('id_pub');
      $nmp = $this->input->post('nama_pub');
      $kat = $this->input->post('id_kat');



      $data = array(
        'nama_pub' => $nmp,
        'id_kat' => $kat,



      );

      $where = array(
        'id_pub' => $id
      );

      $this->M_publikasi->update_data($where, $data, 'tb_publikasi');
      $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>yay !</strong> data berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
      redirect('publikasi', $data);
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
    $where = array('id_pub' => $id);
    $this->M_pubkat->hapus_data($where, 'tb_publikasi');
    $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>yay !</strong> data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('publikasi', $data);
  }
}
