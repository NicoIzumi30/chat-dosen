<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->Auth_Model->cek_session();
    }
    public function index()
    {
        $waktu_sekarang = date('H');
        if ($waktu_sekarang >= 5 && $waktu_sekarang < 10) {
            $pesan = "Selamat pagi!";
        } elseif ($waktu_sekarang >= 10 && $waktu_sekarang < 15) {
            $pesan = "Selamat siang!";
        } elseif ($waktu_sekarang >= 15 && $waktu_sekarang < 18) {
            $pesan = "Selamat sore!";
        } else {
            $pesan = "Selamat malam!";
        }
        $ip_address = $this->input->ip_address();
        $this->Users_Model->save_visitor($ip_address);
        $data['user'] = $this->Users_Model->get_user();
        $data['ucapan'] = $pesan;
        $this->load->view('layout/header.php');
        $this->load->view('pages/index.php', $data);
        $this->load->view('layout/footer.php');
    }
}
