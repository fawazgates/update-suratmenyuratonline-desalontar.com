<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Visi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_visi');
        $this->load->helper('url', 'form');
        $this->load->library('form_validation');
     
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Profil | Visi';
        $data['visi'] = $this->M_visi->tampil_data()->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/visi', $data);
        $this->load->view('admin/layout/footer');
    }
    public function edit($id)
    {
        $data['judul'] = 'Visi | Edit';
        $data['user'] = $this->db->get_where('tb_admin', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['visi'] = $this->M_visi->edit_data($where, 'tb_visi')->result();

        $this->load->view('admin/layout/head', $data);
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/visiedit', $data);
        $this->load->view('admin/layout/footer');
    }
    function update()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id', 'visi', 'required');
        $this->form_validation->set_rules('visi', 'visi', 'required');

        if ($this->form_validation->run() == FALSE) {

            redirect('visi/index');
        } else {
            $id = $this->input->post('id');
            $visi = $this->input->post('visi');


            $data = array(
                'visi' => $visi,

            );

            $where = array(
                'id' => $id
            );

            $this->M_visi->update_data($where, $data, 'tb_visi');
            redirect('visi/index');
        }
    }
}
