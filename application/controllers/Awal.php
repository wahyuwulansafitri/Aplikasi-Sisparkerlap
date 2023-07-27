<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Awal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username')) {
            redirect('home');
        }
    }

    public function index()
    {
        $data['judul']      = 'Sistem Pakar Metode CBR';
        $data['sub_judul']  = 'Halaman Beranda';
        $this->load->view('user/v_header', $data);
        $this->load->view('user/v_sidebar');
        $this->load->view('v_awal', $data);
        $this->load->view('user/v_footer');
    }
}
