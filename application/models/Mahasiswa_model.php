<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model{
    public $table = 'mahasiswa';
    public $id = 'mahasiswa.id';
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    public function get(){
        $this->db->from($this->table);
        $query = $this->db->get();
        // return $query->result_array();
        // $query = $this->db->get();
        $data = array();
        if($query !== FALSE && $query->num_rows() > 0){
            $data = $query->result_array();
        }
        return $data;
    }
    public function getById($id){
        $this->db->select('m.*,p.nama as prodi');
        $this->db->from('mahasiswa m');
        $this->db->join('prodi p','m.prodi = p.id');
        $this->db->where('m.id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update($where,$data){
        $this->db->update($this->table,$data,$where);
        return $this->db->affected_rows();
    }
    public function insert($data){
        $this->db->insert($this->table,$data);
        return $this->db->insert_id();
    }
    public function delete($id){
        $this->db->where($this->id,$id);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }
}
?>