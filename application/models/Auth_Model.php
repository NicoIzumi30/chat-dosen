<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        include_once APPPATH . "../vendor/autoload.php";
    }
    public function cek_session()
    {
        if ($this->session->userdata('user_id')) {
            return true;
        } else {
            return redirect('login');
        }
    }
    public function get_google_client(){
        $google_client = new Google_Client();
        $google_client->setClientId('131703746389-mknasouii91pcs3ts1etbrlkqc54oq5j.apps.googleusercontent.com');
        $google_client->setClientSecret('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');
        $google_client->setRedirectUri('http://localhost:8000/login');
        $google_client->addScope('email');
        $google_client->addScope('profile');
        return $google_client;
    } 
    public function login($email, $password){
        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->session->set_userdata('user_id', $user['id']);
                $this->db->set('last_login', date('Y-m-d H:i:s'));
                $this->db->where('email', $email);
                $this->db->update('users');
                redirect('home');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                redirect('login');
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
        }
    } 
    Public function google_login($google_client, $code)
    {
        $token = $google_client->fetchAccessTokenWithAuthCode($code);
        if (!isset($token["error"])) {
            $google_service = new Google_Service_Oauth2($google_client);
            $data = $google_service->userinfo->get();
            $last_login = date('Y-m-d H:i:s');
            $cek_akun = $this->db->get_where('users', ['email' => $data['email']])->num_rows();
            if ($cek_akun > 0) {
                $user_data = $this->db->get_where('users', ['email' => $data['email']])->row_array();
                $user_id = $user_data['id'];
                $this->session->set_userdata('user_id', $user_id);
                $this->db->set('last_login', $last_login);
                $this->db->where('id', $user_id);
                $this->db->update('users');
            } else {
                $user_data = array(
                    'full_name' => $data['given_name'] . ' ' . $data['family_name'],
                    'email' => $data['email'],
                    'image' => $data['picture'],
                    'login_type' => 'google',
                    'last_login' => $last_login
                );
                $this->db->insert('users', $user_data);
                $user_id = $this->db->insert_id();
                $this->session->set_userdata('user_id', $user_id);
            }
            redirect('home');
        }
    }
    public function register($data){
        $this->db->insert('users', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Congratulation! your account has been created. Please Login
        </div>');
        redirect('login');
    } 
}