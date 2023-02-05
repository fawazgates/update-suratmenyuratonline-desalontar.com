<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_visi');
		$this->load->model('M_misi');
		$this->load->model('M_galkat');
		$this->load->model('M_galery');
		$this->load->model('M_pubkat');
		$this->load->model('M_publikasi');
		$this->load->model('M_slide');
		$this->load->model('M_berita');
		$this->load->model('M_beritakat');
		$this->load->model('M_unitkat');
		$this->load->model('M_opd');
		$this->load->helper('url', 'form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['opd'] = $this->M_opd->tampil_data()->result();
		$data['now'] = date("j F Y");
		$data['aktif'] = 'active';
		$data['status'] = '1';
		$data['news'] = $this->M_berita->tampil_data()->result();
		$data['misi'] = $this->M_misi->tampil_data()->result();
		$data['visi'] = $this->M_visi->tampil_data()->result();
		$data['galkat'] = $this->M_galkat->tampil_data()->result();
		$data['pubkat'] = $this->M_pubkat->tampil_data()->result();

		$data['unitkat'] = $this->M_unitkat->tampil_data()->result();

		$data['kb'] = $this->M_beritakat->tampil_data()->result();
		$data['pk'] = $this->M_publikasi->pubandkat();
		$data['gk'] = $this->M_galery->galandkat();
		$data['sli'] = $this->M_slide->tampil_data()->result();
		$data['terkini'] = $this->M_berita->terkini()->result();
		$data['blmt'] = $this->M_berita->beritalmt()->result();
		$data['new'] = $this->M_berita->beritanew()->result();
		$data['po'] = $this->M_berita->populer()->result();
		$data['top'] = $this->M_berita->topsatu()->result();
		$data['baru'] = $this->M_berita->baru()->result();

		$this->load->view('layout/head', $data);
		$this->load->view('layout/header', $data);
		$this->load->view('layout/slider', $data);
		$this->load->view('home', $data);
		$this->load->view('layout/footer', $data);
	}
	public function show($slug)
	{
		$data['unitkat'] = $this->M_unitkat->tampil_data()->result();
		$data['kb'] = $this->M_beritakat->tampil_data()->result();
		$data['opd'] = $this->M_opd->tampil_data()->result();
		$data['now'] = date("j F Y");
		$data['aktif'] = 'active';
		$data['status'] = '9';
		$data['news'] = $this->M_berita->tampil_data()->result();
		$data['misi'] = $this->M_misi->tampil_data()->result();
		$data['visi'] = $this->M_visi->tampil_data()->result();
		$data['galkat'] = $this->M_galkat->tampil_data()->result();
		$data['pubkat'] = $this->M_pubkat->tampil_data()->result();
		$data['pk'] = $this->M_publikasi->pubandkat();
		$data['gk'] = $this->M_galery->galandkat();
		$data['sli'] = $this->M_slide->tampil_data()->result();
		$data['terkini'] = $this->M_berita->terkini()->result();
		$data['blmt'] = $this->M_berita->beritalmt()->result();
		$data['po'] = $this->M_berita->populer()->result();
		$data['top'] = $this->M_berita->topsatu()->result();
		$data['baru'] = $this->M_berita->baru()->result();

		$where = array('slug' => $slug);
		$data['sb'] = $this->M_berita->edit_data($where, 'tb_berita')->result();
		$data['bk'] = $this->M_beritakat->tampil_data()->result();

		$this->load->view('layout/meta', $data);
		$this->load->view('layout/header', $data);
		$this->load->view('show', $data);
		$this->load->view('layout/footer', $data);
		$this->add_count($slug);
	}
	function add_count($slug)
	{

		$this->load->helper('cookie');

		$check_visitor = $this->input->cookie(urldecode($slug), FALSE);

		$ip = $this->input->ip_address();

		if ($check_visitor == false) {
			$cookie = array("name" => urldecode($slug), "value" => "$ip", "expire" => time() + 7200, "secure" => false);
			$this->input->set_cookie($cookie);
			$this->M_berita->update_counter(urldecode($slug));
		}
	}
	public function all()
	{
		$data['opd'] = $this->M_opd->tampil_data()->result();
		$data['now'] = date("j F Y");
		$data['aktif'] = 'active';
		$data['status'] = '9';
		$data['news'] = $this->M_berita->tampil_data()->result();
		$data['misi'] = $this->M_misi->tampil_data()->result();
		$data['visi'] = $this->M_visi->tampil_data()->result();
		$data['galkat'] = $this->M_galkat->tampil_data()->result();
		$data['pubkat'] = $this->M_pubkat->tampil_data()->result();

		$data['unitkat'] = $this->M_unitkat->tampil_data()->result();

		$data['kb'] = $this->M_beritakat->tampil_data()->result();
		$data['pk'] = $this->M_publikasi->pubandkat();
		$data['gk'] = $this->M_galery->galandkat();
		$data['sli'] = $this->M_slide->tampil_data()->result();
		$data['terkini'] = $this->M_berita->terkini()->result();
		$data['blmt'] = $this->M_berita->beritalmt()->result();
		$data['new'] = $this->M_berita->beritanew()->result();
		$data['po'] = $this->M_berita->populer()->result();
		$data['top'] = $this->M_berita->topsatu()->result();
		$data['baru'] = $this->M_berita->baru()->result();
		$data['all'] = $this->M_berita->allberita()->result();

		$this->load->view('layout/head', $data);
		$this->load->view('layout/header', $data);

		$this->load->view('allberita', $data);
		$this->load->view('layout/footer', $data);
	}
}
