<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->model('Mahasiswa_model');

    }

    public function index(){

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function mahasiswa(){

        $data['title'] = 'Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();

        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambahMahasiswa(){
        $data['title'] = 'Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();

        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if($this->form_validation->run() == FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/mahasiswa', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data Mahasiswa Berhasil ditambah</div>');
            redirect('admin/mahasiswa');
        }
    }

    // public function detailMahasiswa($id){
    //     $data['title'] = 'Detail Mahasiswa';
    //     $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();

    //     $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
    // }

}