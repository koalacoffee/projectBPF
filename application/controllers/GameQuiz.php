<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class GameQuiz extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->model('Quiz_model');
        $this->load->model('Soal_model');
    }
    public function index(){
        $data['judul'] = "Game Quiz";
        $data['player'] = $this->User_model->get();
        $data['soal'] = $this->Soal_model->get();
        $data['user'] = $this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        if($data['user']==null){
            $this->load->view("user/vw_indexgame",$data);
        } else{
            $this->load->view("layout/header",$data);
            $this->load->view("user/vw_indexgame",$data);
            $this->load->view("layout/footer");
        }
    }
    public function getKartuIndukData() {
        $Data = $this->Soal_model->get();
        echo json_encode($Data);
    }
}