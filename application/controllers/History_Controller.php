<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->Auth_Model->cek_session();
        $this->load->model('History_Model');
    }
    public function index()
    {
        $data['history'] = $this->History_Model->get_history();
        $this->load->view('layout/header.php');
        $this->load->view('pages/history.php', $data);
        $this->load->view('layout/footer.php');
    }
}