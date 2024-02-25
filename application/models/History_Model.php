<?php
defined('BASEPATH') or exit('No direct script access allowed');
class History_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_history()
    {
        $user_id = $this->session->userdata('user_id');
        $data = $this->db->get_where('history', ['user_id' => $user_id])->result_array();
        return $data;
    }
    public function shortened($teks)
    {
        $kata_kata = explode(" ", $teks);
        $teks_pendek = implode(" ", array_slice($kata_kata, 0, 15));
        $teks_pendek .= "...";
        return $teks_pendek;
    }
}
