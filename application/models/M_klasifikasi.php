<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_klasifikasi extends CI_Model
{

    public function getData()
    {
        $query = "SELECT tb_klasifikasi1.*, tb_jenis1.nama_jenis, tb_ciri1.nama_ciri
                    FROM tb_klasifikasi1  
                    JOIN tb_jenis1 ON tb_klasifikasi1.id_jenis = tb_jenis1.id_jenis 
                    JOIN tb_ciri1 ON tb_klasifikasi1.id_ciri = tb_ciri1.id_ciri
                    GROUP BY id_jenis
                ";

        return $this->db->query($query)->result_array();
    }

    public function getKerusakan()
    {
        $query = "SELECT * FROM tb_jenis1";
        return $this->db->query($query)->result_array();
    }

    public function getKerusakanById($id_jenis)
    {
        $query = "SELECT * FROM tb_jenis1 WHERE id_jenis='$id_jenis' ";
        return $this->db->query($query)->row_array();
    }

    public function getGejala()
    {
        $query = "SELECT * FROM tb_ciri1";
        return $this->db->query($query)->result_array();
    }

    public function getById($id_jenis)
    {
        $query = "SELECT tb_klasifikasi1.*, tb_jenis1.nama_jenis, tb_ciri1.nama_ciri, tb_ciri1.bobot
                    FROM tb_klasifikasi1  
                    JOIN tb_jenis1 ON tb_klasifikasi1.id_jenis = tb_jenis1.id_jenis 
                    JOIN tb_ciri1 ON tb_klasifikasi1.id_ciri = tb_ciri1.id_ciri
                    WHERE tb_klasifikasi1.id_jenis = '$id_jenis'
                ";

        return $this->db->query($query)->result_array();
    }

    public function cekGejala($kerusakan, $gejala)
    {
        $query = "SELECT * FROM tb_klasifikasi1 WHERE id_jenis='$kerusakan' AND id_ciri='$gejala'";
        return $this->db->query($query)->row_array();
    }

    public function getOption($id_jenis)
    {
        $query = " SELECT tb_ciri1.id_ciri, nama_ciri, bobot FROM tb_ciri1 LEFT JOIN tb_klasifikasi1 ON tb_ciri1.id_ciri = tb_klasifikasi1.id_ciri 
                   EXCEPT 
                   SELECT tb_ciri1.id_ciri, nama_ciri, bobot FROM tb_ciri1 RIGHT JOIN tb_klasifikasi1 ON tb_ciri1.id_ciri = tb_klasifikasi1.id_ciri WHERE tb_klasifikasi1.id_jenis = '$id_jenis'
                ";
        return $this->db->query($query)->result_array();
    }
}
