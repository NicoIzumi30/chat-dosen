<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ask_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->Auth_Model->cek_session();
    }
    public function index()
    {
        $this->load->view('layout/header.php');
        $this->load->view('pages/ask.php');
        $this->load->view('layout/footer.php');
    }

    public function generate_pesan()
    {

          $nama = htmlspecialchars($this->input->post('nama', true));
          $nim = htmlspecialchars($this->input->post('nim', true));
          $prodi = htmlspecialchars($this->input->post('prodi', true));
          $fakultas = htmlspecialchars($this->input->post('fakultas', true));
          $angkatan = htmlspecialchars($this->input->post('angkatan', true));
          $jk = htmlspecialchars($this->input->post('jk', true));
          $salam = htmlspecialchars($this->input->post('salam', true));
          $pesan = htmlspecialchars($this->input->post('pesan', true));
          $penutup = htmlspecialchars($this->input->post('penutup', true));
    
          $waktu_sekarang = date('H');
          if ($waktu_sekarang >= 5 && $waktu_sekarang < 10) {
            $waktu = "Selamat pagi ";
          } elseif ($waktu_sekarang >= 10 && $waktu_sekarang < 15) {
            $waktu = "Selamat siang ";
          } elseif ($waktu_sekarang >= 15 && $waktu_sekarang < 18) {
            $waktu = "Selamat sore ";
          } else {
            $waktu = "Selamat malam ";
          }
          if ($salam === '0') {
            $salam = "";
          } else {
            $salam = "Assalamu’alaikum, ";
          }
    
          if ($jk === 'laki-laki') {
            $jk = "Bapak.";
          } else {
            $jk = "Ibu.";
          }
    
          if ($penutup === '1') {
            $penutup = "Terima kasih 🙏🙏";
          } else {
            $penutup = "";
          }
    
          $output = $salam . $waktu . $jk . ' Mohon maaf mengganggu waktu nya. Saya ' . $nama . ' dengan NIM ' . $nim . ' dari Prodi ' . $prodi . ' Fakultas ' . $fakultas . ', angkatan ' . $angkatan . '. ' . $pesan . ' <br>' . $penutup;
    
          $dataInsert = [
            'user_id' => $this->session->userdata('user_id'),
            'message' => $output,
            'created_at' => date('Y-m-d'),
          ];
          $this->db->insert('history', $dataInsert);
          $data = [
            'status' => true,
            'output' => $output,
          ];
          header('Content-Type: application/json');
          echo json_encode($data);
    }
}
