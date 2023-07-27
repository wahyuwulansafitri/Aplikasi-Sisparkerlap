<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('awal');
        }
        $this->load->library('form_validation');
        $this->load->model('m_kerusakan');
    }

    public function index()
    {
        $data['macam']      = $this->db->get('tb_jenis1')->result_array();
        $data['judul']      = 'Daftar Kerusakan';
        $data['sub_judul']  = 'Daftar Kerusakan';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('kerusakan/v_jenis', $data);
        $this->load->view('template/v_footer');
    }

    public function tambah()
    {
        $data['id_jenis']   = $this->m_kerusakan->kode();
        $data['judul']      = 'Tambah Data Kerusakan';
        $data['sub_judul']  = 'Tambah Data Kerusakan';

        // aturan validasi
        $this->form_validation->set_rules('kerusakan', 'Kerusakan', 'trim|required');
        $this->form_validation->set_rules('detail', 'Detail Kerusakan', 'trim|required');
        $this->form_validation->set_rules('solusi', 'Solusi Kerusakan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('kerusakan/v_addjenis', $data);
            $this->load->view('template/v_footer');
        } else {
            $id_jenis   = $this->input->post('id_jenis', true);
            $kerusakan   = $this->input->post('kerusakan', true);
            $detail     = $this->input->post('detail', true);
            $solusi     = $this->input->post('solusi', true);

            $data = array(
                'id_jenis'         => $id_jenis,
                'nama_jenis'       => $kerusakan,
                'detail_jenis'     => $detail,
                'solusi_jenis'     => $solusi
            );

            $this->db->insert('tb_jenis1', $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Kerusakan Berhasil di Tambahkan</div>');
            redirect('jenis');
        }
    }

    public function edit($id_jenis)
    {
        $data['judul']      = 'Edit Data Kerusakan';
        $data['sub_judul']  = 'Edit Data Kerusakan';
        $data['kerusakan']   = $this->m_kerusakan->getData($id_jenis);

        // aturan validasi
        $this->form_validation->set_rules('kerusakan', 'Kerusakan', 'trim|required');
        $this->form_validation->set_rules('detail', 'Detail Kerusakan', 'trim|required');
        $this->form_validation->set_rules('solusi', 'Solusi Kerusakan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('kerusakan/v_editjenis', $data);
            $this->load->view('template/v_footer');
        } else {
            $id_jenis   = $this->input->post('id_jenis', true);
            $kerusakan   = $this->input->post('kerusakan', true);
            $detail     = $this->input->post('detail', true);
            $solusi     = $this->input->post('solusi', true);

            $data = array(
                'nama_jenis'       => $kerusakan,
                'detail_jenis'     => $detail,
                'solusi_jenis'     => $solusi
            );

            $this->m_kerusakan->editData($id_jenis, $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Kerusakan Berhasil di Ubah</div>');
            redirect('jenis');
        }
    }

    public function hapus($id_jenis)
    {
        $this->db->where('id_jenis', $id_jenis);
        $this->db->delete('tb_jenis1');
        $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Data Kerusakan Berhasil di Hapus</div>');
        redirect('jenis');
    }
}
