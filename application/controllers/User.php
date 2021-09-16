<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index(){

        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit(){
        $data['title'] = 'Edit Profil';
        $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        }else{
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // Cek Jika Ada Gambar Yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if($upload_image){
                $config['upload_path'] = './asset/img/profile';
                $config['allowed_types'] = 'gif|jpg|png|svg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if($this->upload->do_upload('image')){

                    $old_image = $data['user']['image'];
                    if($old_image != 'default.svg'){
                        unlink(FCPATH. 'asset/img/profile/'.$old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Profil Berhasil Di Edit <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> </div>');
                redirect('user');
        }

    }

    public function ubahpassword(){

        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim',[
            'required' => 'Password Lama Tidak Boleh Kosong'
        ]);
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]',[
            'required' => 'Password Tidak Boleh Kosong',
            'min_length' => 'Password Terlalu Pendek',
            'matches' => 'Password Tidak Sama'
        ]);
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password', 'required|trim|matches[new_password1]',[
            'required' => 'Konfirmasi Password Tidak Boleh Kosong',
            'min_length' => 'Password Terlalu Pendek',
            'matches' => 'Password Tidak Sama'
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubahpassword', $data);
            $this->load->view('templates/footer');
        }else{
            $current_password = $this->input->post('current_password');
            $new_password1 = $this->input->post('new_password1');

            if(!password_verify($current_password, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Salah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button></div>');
                redirect('user/ubahpassword');
            }else{
                if($current_password == $new_password1){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password Tidak Boleh Sama dengan Password Lama <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button></div>');
                    redirect('user/ubahpassword');
                }else{
                    //Password benar
                    $password_hash = password_hash($new_password1, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password Berhasil di Edit <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> </div>');
                    redirect('user');
                }
            }
        }
    }

}