<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Prodi_model');
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
        $this->check_role();
        $data['judul'] = "Halaman Prodi";
        $data['prodi']= $this->Prodi_model->get();
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $this->load->view("layout/header",$data);
        $this->load->view("prodi/vw_prodi",$data);
        $this->load->view("layout/footer",$data);
    }
    public function tambah(){
        $this->check_role();
        $data['judul']="Halaman Tambah Prodi";
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama','Nama Prodi','required',[
            'required'=>'Nama Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('ruangan','Ruangan','required',[
            'required'=>'Ruangan Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('jurusan','Jurusan','required',[
            'required'=>'Jurusan Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('akreditasi','Akreditasi','required',[
            'required'=>'Akreditasi Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('kaprodi','Kaprodi','required',[
            'required'=>'Alamat Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('tahun_berdiri','Tahun Berdiri','required|integer',[
            'required'=>'Tahun Berdiri Prodi Wajib diisi!',
            'integer' => 'Tahun Berdiri harus Angka!'
        ]);
        $this->form_validation->set_rules('output','Output Lulusan','required',[
            'required'=>'Output Lulusan Wajib diisi'
        ]);
        if ($this->form_validation->run()==false){
            $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
            $this->load->view("layout/header",$data);
            $this->load->view("prodi/vw_tambah_prodi",$data);
            $this->load->view("layout/footer",$data);    
        } else{
            $data= [
                'nama' => $this->input->post('nama'),
                'ruangan' => $this->input->post('ruangan'),
                'jurusan' => $this->input->post('jurusan'),
                'akreditasi' => $this->input->post('akreditasi'),
                'nama_kaprodi' => $this->input->post('kaprodi'),
                'tahun_berdiri' => $this->input->post('tahun_berdiri'),
                'output_lulusan' => $this->input->post('output')
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/prodi/';
                $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $new_image = $this->upload->data('file_name');
                $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
            $this->Prodi_model->insert($data,$upload_image);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Prodi Berhasil ditambah!</div>');
            redirect('Prodi');
            }
        }
    }
    public function hapus($id){
        $this->check_role();
        $this->Prodi_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="bi bi-info-circle-fill"></i>  Data Prodi tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
        class="bi bi-check-circle"></i>  Data Prodi Berhasil Dihapus!</div>');
        }
        redirect('Prodi');
    }
    public function edit($id){
        $this->check_role();
        $data['judul']="Halaman Edit Prodi";
        $data['prodi']= $this->Prodi_model->getById($id);
        $this->form_validation->set_rules('nama','Nama Prodi','required',[
            'required'=>'Nama Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('ruangan','Ruangan','required',[
            'required'=>'Ruangan Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('jurusan','Jurusan','required',[
            'required'=>'Jurusan Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('akreditasi','Akreditasi','required',[
            'required'=>'Akreditasi Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('kaprodi','Kaprodi','required',[
            'required'=>'Alamat Prodi Wajib diisi!'
        ]);
        $this->form_validation->set_rules('tahun_berdiri','Tahun Berdiri','required|integer',[
            'required'=>'Tahun Berdiri Prodi Wajib diisi!',
            'integer' => 'Tahun Berdiri harus Angka!'
        ]);
        $this->form_validation->set_rules('output','Output Lulusan','required',[
            'required'=>'Output Lulusan Wajib diisi'
        ]);
        if ($this->form_validation->run()==false){
            $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
            $this->load->view("layout/header",$data);
            $this->load->view("prodi/vw_ubah_prodi",$data);
            $this->load->view("layout/footer",$data);    
        } else{
            $data= [
                'nama' => $this->input->post('nama'),
                'ruangan' => $this->input->post('ruangan'),
                'jurusan' => $this->input->post('jurusan'),
                'akreditasi' => $this->input->post('akreditasi'),
                'nama_kaprodi' => $this->input->post('kaprodi'),
                'tahun_berdiri' => $this->input->post('tahun_berdiri'),
                'output_lulusan' => $this->input->post('output')
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/prodi/';
                $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $old_image = $data['prodi']['gambar'];
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/img/prodi/' . $old_image);
            }
            $new_image = $this->upload->data('file_name');
            $this->db->set('gambar', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
            }
            $id = $this->input->post('id');
            $this->Prodi_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Data Prodi Berhasil diubah!</div>');
            redirect('Prodi');
        }
    }
}
?>