<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Quiz_model');
        $this->load->model('Soal_model');
        $this->load->model('User_model');
    }
    
    private function check_role(){
        $role = $this->session->userdata('role');
        
        // Check if the user role is 'admin'
        if($role !== 'admin'){
            // Redirect to a different page or show an error message
            redirect('Unauthorized'); // You can create a view for 'Unauthorized' access
        }
    }
    public function index(){
        $data['error']=false;
        $this->check_role();
        $data['judul'] = "Dashboard Admin";
        $data['player'] = $this->User_model->get();
        $data['quiz'] = $this->Quiz_model->get();
        $data['quiz_count'] = $this->Quiz_model->get_quiz_count(); 
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header",$data);
        $this->load->view("admin/vw_index.php",$data);
        $this->load->view("layout/footer");
    }
    public function soal($id){
        $this->check_role();
        $data['judul'] = "Tambah Soal";
        $data['player'] = $this->User_model->get();
        $data['soal'] = $this->Soal_model->get();
        $data['quiz'] = $this->Quiz_model->getById($id);
        $data['quiz_count'] = $this->Quiz_model->get_quiz_count(); 
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $data['error']=false;
        $this->load->view("layout/header",$data);
        $this->load->view("admin/vw_addsoal",$data);
        $this->load->view("layout/footer");
    }
    public function tambahQuiz(){
        $data['player'] = $this->User_model->get();
        $data['quiz'] = $this->Quiz_model->get();
        $data['quiz_count'] = $this->Quiz_model->get_quiz_count(); 
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Quiz', 'required', [
        'required' => 'Nama Quiz Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['error'] = "tambah";  
            $this->load->view("layout/header",$data);
            $this->load->view("admin/vw_index.php",$data);
            $this->load->view("layout/footer");
        } else {
        $data = [
        'nama' => $this->input->post('nama'),
        ];
        $this->Quiz_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
        role="alert">Quiz Berhasil Ditambahkan!</div>');
        redirect('Admin');
        }
        
    }
    public function tambahSoal($id){
        $data['judul'] = "Tambah Soal";
        $data['player'] = $this->User_model->get();
        $data['soal'] = $this->Soal_model->get();
        $data['quiz'] = $this->Quiz_model->getById($id);
        $data['quiz_count'] = $this->Quiz_model->get_quiz_count(); 
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $data['error']=false;
        $this->form_validation->set_rules('kartuinduk', 'Nama Kartu Induk', 'required', [
            'required' => 'Nama Kartu Induk Wajib Diisi!'
            ]);
        $this->form_validation->set_rules('kartukimia', 'Nama Perubahan Kimia', 'required', [
            'required' => 'Nama Perubahan Kimia Wajib Diisi!'
            ]);
        $this->form_validation->set_rules('kartufisika', 'Nama Perubahan Fisika', 'required', [
            'required' => 'Nama Perubahan Fisika Wajib Diisi!'
            ]);

            if ($this->form_validation->run() == false) {
                 // Set general error message for flashdata
                $this->session->set_flashdata('tambah_error_message', 'Validasi Gagal! Pastikan Semua Kolom Telah Terisi!');
                // Redirect back to the form view
                $this->load->view("layout/header",$data);
                $this->load->view("admin/vw_addsoal",$data);
                $this->load->view("layout/footer");
            } 
            else {
                // Prepare data for 'soal' table
                $soalData = [
                    'quiz' => $id,
                    'nama' => $this->input->post('kartuinduk'),
                    'gambar' => $this->uploadImage($id,'kartuIndukImg', './assets/img/kartu/induk/'),
                    'nama_fisika' => $this->input->post('kartufisika'),
                    'fisika' => $this->uploadImage($id,'kartuFisikaImg', './assets/img/kartu/fisika/'),
                    'nama_kimia' => $this->input->post('kartukimia'),
                    'kimia' => $this->uploadImage($id,'kartuKimiaImg', './assets/img/kartu/kimia/')
                ];
                $this->Soal_model->insert($soalData);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil Ditambah!</div>');
                redirect('Admin/soal/' .$id);
            }
    }
    public function editSoal($id,$quizid){
        $data['judul'] = "Tambah Soal";
        $data['player'] = $this->User_model->get();
        $data['soal'] = $this->Soal_model->get();
        $data['quiz'] = $this->Quiz_model->getById($id);
        $data['quiz_count'] = $this->Quiz_model->get_quiz_count(); 
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $data['error']=false;
        $this->form_validation->set_rules('kartuinduk', 'Nama Kartu Induk', 'required', [
            'required' => 'Nama Kartu Induk Wajib Diisi!'
            ]);
        $this->form_validation->set_rules('kartukimia', 'Nama Perubahan Kimia', 'required', [
            'required' => 'Nama Perubahan Kimia Wajib Diisi!'
            ]);
        $this->form_validation->set_rules('kartufisika', 'Nama Perubahan Fisika', 'required', [
            'required' => 'Nama Perubahan Fisika Wajib Diisi!'
            ]);

            if ($this->form_validation->run() == false) {
                 // Set general error message for flashdata
                $this->session->set_flashdata('edit_error_message', 'Validasi Gagal! Pastikan Semua Kolom Telah Terisi!');
                // Redirect back to the form view
                $this->load->view("layout/header",$data);
                $this->load->view("admin/vw_editsoal/".$id,$data);
                $this->load->view("layout/footer");
            } 
            else {
                $oldIndukImage = $this->Soal_model->getById($id)['gambar']; // Retrieve old induk image filename
                $oldFisikaImage = $this->Soal_model->getById($id)['fisika']; // Retrieve old fisika image filename
                $oldKimiaImage = $this->Soal_model->getById($id)['kimia']; // Retrieve old kimia image filename
                // Prepare data for 'soal' table
                $soalData = [
                    'nama' => $this->input->post('kartuinduk'),
                    'gambar' => $this->updateImage('gambar', './assets/img/kartu/induk/', $oldIndukImage),
                    'nama_fisika' => $this->input->post('kartufisika'),
                    'fisika' => $this->updateImage('fisika', './assets/img/kartu/fisika/', $oldFisikaImage),
                    'nama_kimia' => $this->input->post('kartukimia'),
                    'kimia' => $this->updateImage('kimia', './assets/img/kartu/kimia/', $oldKimiaImage)
                ];
                $this->Soal_model->update(['id' => $id], $soalData);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Soal Berhasil Diedit!</div>');
                redirect('Admin/soal/' .$quizid);
            }
    }

// Function to handle image upload
private function uploadImage($id,$inputName, $directory) {
    log_message('debug', 'Directory received: ' . $directory);  // Log the directory
    $config['upload_path'] = $directory;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = '2048';

    $this->load->library('upload', $config);

    if ($this->upload->do_upload($inputName)) {
        $data = $this->upload->data();
        return $data['file_name'];
    } else {
        $upload_errors = $this->upload->display_errors();
        $this->session->set_flashdata('error_message', $upload_errors);
        redirect('Admin/soal/' . $id);
        return null; // Or handle the error accordingly
    }
}
private function updateImage($inputName, $directory, $oldImage = null) {
    $config['upload_path'] = $directory;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = '2048';
    
    $this->load->library('upload', $config);

    if ($this->upload->do_upload($inputName)) {
        if ($oldImage && file_exists(FCPATH . $directory . $oldImage)) {
            unlink(FCPATH . $directory . $oldImage); // Delete old image if exists
        }
        $data = $this->upload->data();
        return $data['file_name'];
    } elseif (!$this->upload->do_upload($inputName) && $oldImage) {
        return $oldImage; // Return old image if no new image uploaded
    } else {
        $upload_errors = $this->upload->display_errors();
        $this->session->set_flashdata('error_message', $upload_errors);
        return null;
    }
}
    public function editQuiz(){
        $data['player'] = $this->User_model->get();
        $data['quiz'] = $this->Quiz_model->get();
        $data['quiz_count'] = $this->Quiz_model->get_quiz_count(); 
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama Quiz', 'required', [
        'required' => 'Nama Quiz Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['error'] = "edit";  
            $this->load->view("layout/header",$data);
            $this->load->view("admin/vw_index.php",$data);
            $this->load->view("layout/footer");
        } else {
        $data = [
        'nama' => $this->input->post('nama'),
        ];
        $id = $this->input->post('id');
        $this->Quiz_model->update(['id' => $id], $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success"
        role="alert">Nama Quiz Berhasil DiUbah!</div>');
        $data['error'] = false;  
        redirect('Admin');
        }
    }

    public function hapus($id){
        $this->Quiz_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="bi bi-info-circle-fill"></i>  Quiz tidak dapat dihapus!</div>');
        } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
        class="bi bi-check-circle"></i>  Data Quiz Berhasil Dihapus!</div>');
        }
        redirect('Admin');
    }

    public function hapusSoal($quizId, $soalId) {
        $this->Soal_model->delete($soalId);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="bi bi-info-circle-fill"></i>  Soal tidak dapat dihapus!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="bi bi-check-circle"></i>  Data Soal Berhasil Dihapus!</div>');
        }
        redirect('Admin/soal/' . $quizId);
    }

    public function vwEdit($id,$quiz){
        $this->check_role();
        $data['judul'] = "Tambah Soal";
        $data['player'] = $this->User_model->get();
        $data['soal'] = $this->Soal_model->getById($id);
        $data['quiz_id']=$quiz;
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $data['error']=false;
        $this->load->view("layout/header",$data);
        $this->load->view("admin/vw_editsoal",$data);
        $this->load->view("layout/footer");
    }
}