<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buatberita extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_beritakat');
    $this->load->model('M_berita');
    $this->load->helper('string');
    $this->load->helper('url', 'form', 'file');
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->library('upload');

    $this->load->library('form_validation');
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }
  public function index()
  {
    $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul'] = 'Berita | Data';
    $data['bk'] = $this->M_beritakat->tampil_data()->result();
    $data['b'] = $this->M_berita->tampil_data()->result();
    $data['bn'] = $this->M_berita->berandkat()->result();
    $this->load->view('admin/layout/head', $data);
    $this->load->view('admin/layout/header', $data);
    $this->load->view('admin/layout/sidebar', $data);
    $this->load->view('admin/beritadata', $data);
    $this->load->view('admin/layout/footer');
  }
  public function buat()
  {
    $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul'] = 'Berita | Posting';
    $data['bk'] = $this->M_beritakat->tampil_data()->result();
    $data['b'] = $this->M_berita->tampil_data()->result();

    $this->load->view('admin/layout/head', $data);
    $this->load->view('admin/layout/header', $data);
    $this->load->view('admin/layout/sidebar', $data);
    $this->load->view('admin/beritabuat', $data);
    $this->load->view('admin/layout/footer');
  }

  public function posting()
  {
    $config['upload_path'] = './berkas/berita/'; //path folder
    $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

    $this->upload->initialize($config);
    if (!empty($_FILES['foto_berita']['name'])) {

      if ($this->upload->do_upload('foto_berita')) {
        $gbr = $this->upload->data();
        //Compress Image
        $config['image_library'] = 'gd2';
        $config['source_image'] = './berkas/berita/' . $gbr['file_name'];
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = '50%';
        $config['width'] = 600;
        $config['height'] = 400;
        $config['new_image'] = './berkas/berita/' . $gbr['file_name'];
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();

        $gambar = $gbr['file_name'];
        $judul = $this->input->post('judul');
        $kat = $this->input->post('id_beritakat');
        $isi = addslashes($this->input->post('isi_berita'));
        $upl =  $this->input->post('upload_at');
        $upd = date('Y-m-d');
        $publik = $this->input->post('publik');

        //buat slug
        // $text = iconv('utf-8', 'us-ascii//TRANSLIT', $judul);
        // $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        $text = preg_replace("/[^a-zA-Z0-9 ]/", "", $judul);


        $sp = '-';
        $dom = random_string('alpha', 3);
        $title = trim(strtolower($dom . $sp . $text));
        $out = explode(" ",  $title);
        $slug = implode("-", $out);
        $this->M_berita->simpan_upload($judul, $kat, $isi, $gambar, $upl, $upd, $slug, $publik);

        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>horeee !</strong> berita berhasil diposting.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
        redirect('buatberita', $data);
      } else {
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Gagal upload!</strong> format foto berita harus JPG | PNG | JPEG 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
        redirect('buatberita/buat', $data);
      }
    } else {
      $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Opss !</strong> foto berita belum di upload.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
      redirect('buatberita/buat', $data);
    }
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

        'slug' => $slug,

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
  public function editberita($id)
  {
    $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
    $data['judul'] = 'Berita  | Edit';

    $where = array('id_berita' => $id);
    $data['be'] = $this->M_berita->edit_berita($where, 'tb_berita')->result();
    $data['bk'] = $this->M_beritakat->tampil_data()->result();
    $this->load->view('admin/layout/head', $data);
    $this->load->view('admin/layout/header', $data);
    $this->load->view('admin/layout/sidebar', $data);
    $this->load->view('admin/beritaedit', $data);
    $this->load->view('admin/layout/footer');
  }

  function updateberita()
  {
      $this->load->library('form_validation');

      $this->form_validation->set_rules('judul', 'judul', 'required');
      $this->form_validation->set_rules('isi_berita', 'isi_berita', 'required');


      if ($this->form_validation->run() == FALSE) {
          $id = $this->input->post('id_berita');

          $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Opps !</strong> berita sudah ada 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');

          redirect('berita/edit/' . $id, $data);
      } else {
          $id = $this->input->post('id_berita');
          $judul = $this->input->post('judul');
          $idbr = $this->input->post('id_beritakat');
          $publik = $this->input->post('publik');
          $isi = addslashes($this->input->post('isi_berita'));
          $upl =  $this->input->post('upload_at');


          //buat slug
          $text = preg_replace("/[^a-zA-Z0-9 ]/", "", $judul);


          $sp = '-';
          $dom = random_string('alpha', 3);
          $title = trim(strtolower($dom . $sp . $text));
          $out = explode(" ",  $title);
          $slug = implode("-", $out);

        


          $data = array(
              'judul' => $judul,
              'isi_berita' => $isi,
              'id_beritakat' => $idbr,
              'upload_at' => $upl,
              'publik' => $publik,
              'slug' => $slug,

          );

          $where = array(
              'id_berita' => $id
          );

          $this->M_berita->update_berita($where, $data, 'tb_berita');
          $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
          <strong>horeee !</strong> data berhasil diupdate
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>');
          redirect('buatberita', $data);
      }
  }

  public function updateberitafoto()
  {
      $config['upload_path'] = './berkas/berita/';
      $config['allowed_types'] = 'jpg|png|jpeg';



      $id = $this->input->post('id_berita');

      $data_kode = array('id_berita' => $id);
      $foto = $this->db->get_where('tb_berita', $data_kode);

      $this->upload->initialize($config);

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('foto_berita')) {
          if ($foto->num_rows() > 0) {
              $pros = $foto->row();
              $name = $pros->foto;

              if (file_exists($lok = FCPATH . '/berkas/berita/' . $name)) {
                  unlink($lok);
              }
              if (file_exists($lok = FCPATH . '/berkas/berita/' . $name)) {
                  unlink($lok);
              }
          }

          $finfo = $this->upload->data();
          $nama_foto = $finfo['file_name'];

          $data_buku = array(

              'foto_berita' => $nama_foto
          );

          $config2 = array(
              'source_image' => 'berkas/berita/' . $nama_foto,
              'image_library' => 'gd2',
              'new_image' => 'berkas/berita/',

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
          redirect('berita/edit/' . $id, $data);
      }

      $this->db->where($data_kode);
      $this->db->update('tb_berita', $data_buku);
      $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>horeee !</strong> data berhasil diupdate
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
      redirect('admin/berita/post/edit/' . $id, $data);
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

        'slug' => $slug,

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
    $where = array('id_berita' => $id);
    $this->M_berita->hapus_data($where, 'tb_berita');
    $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>yay !</strong> data berhasil dihapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
    redirect('buatberita', $data);
  }
}
