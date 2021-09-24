<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model{
    
    public function getAllMahasiswa(){

        return $this->db->get('mahasiswa')->result_array();
    }

    public function tambahDataMahasiswa(){
        $data = [
            'nama' => $this->input->post('nama'),
            'nim' => $this->input->post('nim'),
            'email' => $this->input->post('email'),
            'jurusan' => $this->input->post('jurusan')
        ];

        $this->db->insert('mahasiswa', $data);
    }

}