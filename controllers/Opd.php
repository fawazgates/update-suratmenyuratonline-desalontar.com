<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Opd extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_unit');
        $this->load->model('M_unitkat');
        $this->load->model('M_pengurus');
        $this->load->model('M_opd');
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
        $data['judul'] = 'Profil | OPD';
        $data['opd'] = $this->M_opd->tampil_data()->result();


        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/opd', $data);
        $this->load->view('admin/layout/footer');
    }



    function update()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id', 'id', 'required');


        if ($this->form_validation->run() == FALSE) {

            redirect('opd');
        } else {
            $a = $this->input->post('id');
            $b = $this->input->post('nama_opd');
            $c = $this->input->post('nama_pendek');
            $d = $this->input->post('alamat');
            $e = $this->input->post('no_telp');
            $f = $this->input->post('email');
            $g = $this->input->post('facebook');
            $h = $this->input->post('twiter');
            $i = $this->input->post('youtube');
            $j = $this->input->post('linked');
            $k = $this->input->post('instagram');



            $data = array(


                'nama_opd' => $b,
                'nama_pendek' => $c,
                'alamat' => $d,
                'no_telp' => $e,
                'email' => $f,
                'facebook' => $g,
                'twiter' => $h,
                'youtube' => $i,
                'linked' => $j,
                'instagram' => $k,


            );

            $where = array(
                'id' => $a
            );

            $this->M_opd->update_data($where, $data, 'tb_opd');
            $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>yay !</strong> data berhasil diupdate
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>');
            redirect('opd', $data);
        }
    }

    public function gtlogo()
    {
        $config['upload_path'] = './berkas/icon/';
        $config['allowed_types'] = 'jpg|png|jpeg';



        $id = $this->input->post('id');

        $data_kode = array('id' => $id);
        $foto = $this->db->get_where('tb_opd', $data_kode);

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            if ($foto->num_rows() > 0) {
                $pros = $foto->row();
                $name = $pros->foto;

                if (file_exists($lok = FCPATH . '/berkas/icon/' . $name)) {
                    unlink($lok);
                }
                if (file_exists($lok = FCPATH . '/berkas/icon/' . $name)) {
                    unlink($lok);
                }
            }

            $finfo = $this->upload->data();
            $nama_foto = $finfo['file_name'];

            $data_buku = array(

                'file' => $nama_foto
            );

            $config2 = array(
                'source_image' => 'berkas/icon/' . $nama_foto,
                'image_library' => 'gd2',
                'new_image' => 'berkas/icon/',

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
            redirect('opd/', $data);
        }

        $this->db->where($data_kode);
        $this->db->update('tb_opd', $data_buku);
        $data = $this->session->set_flashdata('pesan', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>horeee !</strong> data berhasil diupdate
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');
        redirect('opd/', $data);
    }
}
