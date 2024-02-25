<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Template_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_template()
    {
        $this->db->select('template.*,users.full_name');
        $this->db->from('template');
        $this->db->join('users', 'users.id = template.user_id');
        $data = $this->db->get()->result_array();
        return $data;
    }
    public function shortened($teks)
    {
        $kata_kata = explode(" ", $teks);
        $teks_pendek = implode(" ", array_slice($kata_kata, 0, 25));
        $teks_pendek .= "...";
        return $teks_pendek;
    }
    public function insert_template($data){
        $query = $this->db->insert('template', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Tambahkan');
            return redirect('template');
        }else{
            $this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
            return redirect('template');
        }
    }
    public function update_template($data, $id){
        $this->db->where('id', $id);
        $query = $this->db->update('template', $data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Update');
            return redirect('template');
        }else{
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('template');
        }
    }

    public function delete_template($id){
        $this->db->where('id', $id);
        $query = $this->db->delete('template');
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Hapus');
            return redirect('template');
        }else{
            $this->session->set_flashdata('flash-gagal', 'Di Hapus');
            return redirect('template');
        }
    } 
}
