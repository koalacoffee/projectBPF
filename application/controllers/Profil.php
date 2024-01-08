<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model','userrole');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }
    public function index(){
        $data['judul']="Halaman Profile";
        $data['user']=$this->userrole->getBy();
        $data['active_tab'] = $this->input->get('tab') ? $this->input->get('tab') : 'edit-profile';
        if ($data['user']!==null){
            $this->load->view("layout/header",$data);
            $this->load->view("user/vw_profil",$data);
            $this->load->view("layout/footer");
        } else{
            redirect('Auth/');
        }
    }
    public function edit(){
        $data['judul']="Halaman Profile";
        $this->form_validation->set_rules('nama','Nama','required',[
            'required'=>'Nama Wajib diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
            'valid_email' => 'Email Harus Valid!',
            'required' => 'Email Wajib diisi!'
        ]);
        if ($this->form_validation->run()==false){
            $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
            $this->load->view("layout/header",$data);
            $this->load->view("user/vw_profil",$data);
            $this->load->view("layout/footer",$data);    
        } else{
            $data= [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $old_image = $data['user']['gambar'];
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/img/profile/' . $old_image);
            }
            $new_image = $this->upload->data('file_name');
            $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
            }
            $id = $this->input->post('id');
            $this->User_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Profil Berhasil diubah!</div>');
            redirect('Profil');
        }
    }

    public function editpw() {
        $data['judul']="Halaman Profile";
        $data['active_tab'] = $this->input->get('tab') ? $this->input->get('tab') : 'edit-profile';
        // Define validation rules
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]',[
            'required' => 'Password Wajib diisi!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',[
            'required' => 'Password Wajib diisi!',
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',[
            'required' => 'Password Konfirmasi Wajib Di Isi!'
        ]);
    
        // Run validation
        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Ubah Password';
            $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
            $data['active_tab'] = 'change-password';
            $this->load->view("layout/header",$data);
            $this->load->view("user/vw_profil",$data);
            $this->load->view("layout/footer",$data); 
            error_log(validation_errors());
        } else {
            // Fetch user data based on the logged-in user's email
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
            // Check if the entered old password matches the hashed password from the database
            if (!password_verify($this->input->post('password'), $user['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama tidak sesuai!</div>');
                $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
                $data['judul'] = 'Ubah Password';
                redirect('Profil?tab=change-password');
            }
    
            // If old password matches, proceed to update the password
            $data = [
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];
            
            $id = $this->input->post('id');
            $this->User_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil diubah!</div>');
            redirect('Profil');
        }
    }
    
}
?>