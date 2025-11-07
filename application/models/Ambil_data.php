<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ambil_data extends CI_Model {

    private $table = 'anggota'; // nama tabel di database

    public function __construct()
    {
        parent::__construct();
    }

    // === DELETE ===
     public function get_data()
    {
        return $this->db->get($this->table)->result();
    }

    public function insert($data){
        $nim = $this ->db->escape($data['NIM']);
        $nama = $this ->db->escape($data['Nama']);
        $offering = $this ->db->escape($data['Offering']);

        $sql="INSERT INTO $this->table(NIM, Nama,Offering)
                VALUES ($nim,$nama,$offering)";
        return $this->db->query($sql);

    }
    public function delete($nim) {
        $nim = $this->db->escape($nim);
        $sql = "delete from $this->table WHERE NIM = $nim";
        return $this->db->query($sql);
    }
}
