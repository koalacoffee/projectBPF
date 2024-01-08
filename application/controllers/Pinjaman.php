<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Pinjaman extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Pinjaman_model');
    }
    public function index(){
        $data['judul'] = "Halaman Pinjaman";
        $data['pinjaman']= $this->Pinjaman_model->get();
        $this->load->view("layout/header");
        $this->load->view("pinjaman/vw_pinjaman",$data);
        $this->load->view("layout/footer");
    }
    public function tambah(){
        $data['judul']="Halaman Tambah Pinjaman";
        $this->load->view("layout/header");
        $this->load->view("pinjaman/vw_tambah_pinjaman",$data);
        $this->load->view("layout/footer");
    }
    public function hapus($id){
        $this->Pinjaman_model->delete($id);
        redirect('Pinjaman');
    }
    public function upload(){
        $data= [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'besar_pinjaman' => $this->input->post('besar_pinjaman'),
            'durasi' => $this->input->post('durasi')
        ];
        $this->Pinjaman_model->insert($data);
        redirect('Pinjaman');
    }
    public function edit($id){
        $data['judul']="Halaman Edit Pinjaman";
        $data['pinjaman']= $this->Pinjaman_model->getById($id);
        $this->load->view("layout/header");
        $this->load->view("pinjaman/vw_ubah_pinjaman",$data);
        $this->load->view("layout/footer");
    }
    public function update(){
        $data= [
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'nik' => $this->input->post('nik'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'besar_pinjaman' => $this->input->post('besar_pinjaman'),
            'durasi' => $this->input->post('durasi')
        ];
        $id = $this->input->post('nik');
        $this->Pinjaman_model->update(['nik' => $id], $data);
        redirect('Pinjaman');
    }
}
?>
