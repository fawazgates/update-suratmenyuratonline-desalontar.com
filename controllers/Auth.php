<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_opd');
    }

    public function index()
    {
        $data['opd'] = $this->M_opd->tampil_data()->result();
        $data['judul'] = 'Login';
        $this->load->view('admin/frontauth/head', $data);
        $this->load->view('admin/frontauth/header', $data);
        $this->load->view('admin/auth/login', $data);
    }
    public function login()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Member Belipekanbaru';
            redirect('auth');
        } else {
            $this->_ceklogin();
        }
    }
    private function _ceklogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_admin', ['email' => $email])->row_array();

        if ($user) {
            if ($user['aktif'] == 1) {
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'email' => $user['email'],
                        'nama' => $user['nama'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
                Password salah!
              </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun anda di suspend!
          </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
        Email tidak terdaftar!
      </div>');
        }
        redirect('auth');
    }
   // public function daftar()
  //  {
  //      $data['opd'] = $this->M_opd->tampil_data()->result();
  //      $data['judul'] = 'DAFFTAR';
  //      $this->load->view('admin/frontauth/head', $data);
  //      $this->load->view('admin/frontauth/header');
  //      $this->load->view('admin/auth/daftar');
  //  }

    public function regis()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'password tidak sama!',
            'min_length' => 'password min 8 digit!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Seller Center Beliriau';
            $this->load->view('auth/registrasi', $data);
        } else {

            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),

                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => 1,
                'create_at' => date('y-m-d h:i:s'),
                'aktif' => 1,

            ];
            $this->db->insert('tb_admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil mendaftar, silahkan login!
          </div>');
            redirect('login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil logout!
      </div>');
        redirect('auth');
    }
}
