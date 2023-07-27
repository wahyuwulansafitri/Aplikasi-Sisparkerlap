<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_konsultasi extends CI_Model
{

    public function getData()
    {
        $query = "SELECT A.*, (SELECT COUNT(id_jenis) FROM tb_klasifikasi1 WHERE id_jenis = A.id_jenis) AS jumlah, tb_jenis1.nama_jenis, tb_ciri1.nama_ciri
        FROM tb_klasifikasi1 A
        JOIN tb_jenis1 ON tb_jenis1.id_jenis = A.id_jenis
        JOIN tb_ciri1 ON tb_ciri1.id_ciri = A.id_ciri";

        return $this->db->query($query)->result_array();
    }

    public function getJenis()
    {
        $query = "SELECT tb_klasifikasi1.* FROM tb_klasifikasi1 GROUP BY id_jenis";
        return $this->db->query($query)->result_array();
    }

    public function getKerusakan($jenis)
    {
        $query = "SELECT tb_jenis1.* FROM tb_jenis1 WHERE id_jenis ='$jenis'";
        return $this->db->query($query)->row_array();
    }

    public function getCiri($ciri)
    {
        $query = "SELECT tb_ciri1.* FROM tb_ciri1 WHERE id_ciri ='$ciri'";
        return $this->db->query($query)->row_array();
    }

    public function getSama($jenis, $ciri)
    {
        $query = "SELECT tb_klasifikasi1.*, tb_ciri1.bobot 
        FROM tb_klasifikasi1
        JOIN tb_ciri1 ON tb_ciri1.id_ciri = tb_klasifikasi1.id_ciri  
        WHERE tb_klasifikasi1.id_jenis='$jenis' AND tb_klasifikasi1.id_ciri='$ciri'";

        return $this->db->query($query)->row_array();
    }

    public function getJmlCiri($jenis)
    {

        $this->db->from('tb_klasifikasi1');
        $this->db->where('id_jenis', $jenis);
        return $this->db->count_all_results();
    }

    public function getPembagi($jenis)
    {
        $query = "SELECT SUM(tb_ciri1.bobot) AS TOTAL
                FROM tb_klasifikasi1 
                JOIN tb_ciri1 ON tb_ciri1.id_ciri = tb_klasifikasi1.id_ciri
                WHERE id_jenis='$jenis'";
        $bagi = $this->db->query($query)->row_array();
        return $bagi['TOTAL'];
    }
}
