<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('awal');
        }
        $this->load->model('m_klasifikasi', 'klas');
    }

    public function index()
    {
        $data['klas']       = $this->klas->getData();
        $data['judul']      = 'Basis Pengetahuan';
        $data['sub_judul']  = 'Basis Pengetahuan';
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('kasus/v_klasifikasi', $data);
        $this->load->view('template/v_footer');
    }

    public function detail($id_jenis)
    {
        $data['detail']     = $this->klas->getById($id_jenis);
        $data['kerusakan']   = $this->klas->getKerusakanById($id_jenis);
        $data['judul']      = 'Detail Basis Pengetahuan';
        $data['sub_judul']  = 'Detail Basis Pengetahuan';
        $data['id_jenis']   = $id_jenis;
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_sidebar');
        $this->load->view('kasus/v_detailklas', $data);
        $this->load->view('template/v_footer');
    }

    public function tambah()
    {
        $data['judul']      = 'Tambah Basis Pengetahuan';
        $data['sub_judul']  = 'Tambah Basis Pengetahuan';
        $data['kerusakan']   = $this->klas->getKerusakan();
        $data['gejala']     = $this->klas->getGejala();

        // aturan validasi
        $this->form_validation->set_rules('kerusakan', 'Kerusakan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('kasus/v_addklas', $data);
            $this->load->view('template/v_footer', $data);
        } else {
            $kerusakan   = $this->input->post('kerusakan', true);

            // Perulangan input gejala
            foreach ($this->input->post('gejala', true) as $selected) {
                $gejala = $selected;

                //Cek Gejala
                $cek_gejala = $this->klas->cekGejala($kerusakan, $gejala);

                //Buat kondisi
                if ($cek_gejala) {
                    true;
                } else {
                    $data = array(
                        'id_jenis'         => $kerusakan,
                        'id_ciri'          => $gejala
                    );

                    //Insert Ke Database
                    $this->db->insert('tb_klasifikasi1', $data);
                }
            }
            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Berhasil di Tambahkan</div>');
            redirect('klasifikasi');
        }
    }

    //Hapus relasi
    public function hapus($id_jenis)
    {
        $this->db->where('id_jenis', $id_jenis);
        $this->db->delete('tb_klasifikasi1');
        $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Data Berhasil di Hapus</div>');
        redirect('klasifikasi');
    }

    //Hapus Gejala Basis Kasus
    public function hapusGejala($id_jenis, $id_ciri)
    {
        $kerusakan = $this->klas->getKerusakanById($id_jenis);
        $namape   = $kerusakan['nama_jenis'];

        $this->db->where('id_jenis', $id_jenis);
        $this->db->where('id_ciri', $id_ciri);
        $this->db->delete('tb_klasifikasi1');
        $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Gejala Kerusakan ' . $namape . ' Berhasil di Hapus</div>');
        redirect('klasifikasi/detail/' . $id_jenis);
    }

    //Tambah Gejala Basis Kasus
    public function tambahGejala($id_jenis)
    {
        $data['judul']      = 'Tambah Gejala Kerusakan';
        $data['sub_judul']  = 'Tambah Gejala Kerusakan';
        $data['kerusakan']   = $this->klas->getKerusakanById($id_jenis);
        $data['detail']     = $this->klas->getById($id_jenis);
        $data['gejala']     = $this->klas->getOption($id_jenis);

        // aturan validasi
        $this->form_validation->set_rules('id_gejala', 'ID Gejala', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_sidebar');
            $this->load->view('kasus/v_editkasus', $data);
            $this->load->view('template/v_footer');
        } else {
            $id_jenis   = $this->input->post('id_jenis', true);
            $id_ciri    = $this->input->post('id_gejala', true);

            $data = array(
                'id_jenis'  => $id_jenis,
                'id_ciri'     => $id_ciri
            );

            $this->db->insert('tb_klasifikasi1', $data);

            $this->session->set_flashdata('info', '<div class="alert alert-success" role="alert">Data Gejala Berhasil di Tambahkan</div>');
            redirect('klasifikasi/detail/' . $id_jenis);
        }
    }
}
