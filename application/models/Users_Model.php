<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        include_once APPPATH . "../vendor/autoload.php";
    }
    public function get_user(){
        $user_id = $this->session->userdata('user_id');
        $data = $this->db->get_where('users', ['id' => $user_id])->row_array();
        return $data;
    } 
    public function update_profile($data){
        $user_id = $this->session->userdata('user_id');
        $this->db->where('id', $user_id);
        $query = $this->db->update('users',$data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Update');
            return redirect('profile');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('profile');
        }
    } 
    public function update_password($data){
        $user_id = $this->session->userdata('user_id');
        $this->db->where('id', $user_id);
        $query = $this->db->update('users',$data);
        if ($query) {
            $this->session->set_flashdata('flash', 'Di Update');
            return redirect('profile');
        } else {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('profile');
        }
    } 
    public function save_visitor($ip_address)
    {
        $today_date = date('Y-m-d');
        $existing_visitor = $this->db
            ->where('ip_address', $ip_address)
            ->where('visit_date', $today_date)
            ->get('visitors')
            ->row();
        if (!$existing_visitor) {
            $data = array(
                'ip_address' => $ip_address,
                'visit_date' => $today_date
            );
            $this->db->insert('visitors', $data);
        }
    }
}