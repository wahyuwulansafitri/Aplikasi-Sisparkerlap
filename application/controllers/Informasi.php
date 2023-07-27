<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

    public function index()
    {
        $data['judul']      = 'Informasi Kerusakan';
        $data['sub_judul']  = 'Informasi Kerusakan';
        $data['macam']      = $this->db->get('tb_jenis1')->result_array();
        $this->load->view('user/v_header', $data);
        $this->load->view('user/v_sidebar');
        $this->load->view('v_informasi', $data);
        $this->load->view('user/v_footer');
    }
}
