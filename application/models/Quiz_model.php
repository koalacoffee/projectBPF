<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Quiz_model extends CI_Model{
    public $table = 'quiz';
    public $id = 'quiz.id';
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    public function get(){
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getAll(){
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
        $this->db->from($this->table);
        $this->db->where($this->id,$id);
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
    public function get_quiz_count() {
        return $this->db->count_all('quiz'); 
    }
    /**
     * Get the current soal count for a specific quiz.
     *
     * @param int $quizId The ID of the quiz.
     * @return int The current soal count for the quiz.
     */
    public function getSoalCount($quizId) {
        // Select the soal column for the specific quiz
        $this->db->select('soal');
        $this->db->where('id', $quizId);
        $query = $this->db->get($this->table);

        // Check if a row exists
        if ($query->num_rows() > 0) {
            // Return the soal value
            $row = $query->row();
            return $row->soal;
        }

        // Return 0 if no row is found
        return 0;
    }

    /**
     * Update the soal count for a specific quiz.
     *
     * @param int $quizId The ID of the quiz.
     * @param int $newCount The new soal count to be updated.
     * @return bool True if the update was successful, false otherwise.
     */
    public function updateSoalCount($quizId, $newCount) {
        // Update the soal for the specific quiz
        $this->db->set('soal', $newCount);
        $this->db->where('id', $quizId);
        $this->db->update($this->table);

        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            return true;
        }

        return false;
    }
}
?>