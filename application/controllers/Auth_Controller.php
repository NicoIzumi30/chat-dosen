<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        include_once APPPATH . "../vendor/autoload.php";
        $this->load->model('Auth_Model');
    }
    public function index()
    {
        $google_client = $this->Auth_Model->get_google_client();
        $data['auth_url'] = $google_client->createAuthUrl();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        if ($this->form_validation->run() == true) {
            $email = htmlspecialchars($this->input->post('email', true));
            $password = $this->input->post('password');
            $this->Auth_Model->login($email, $password);
        }elseif(isset($_GET["code"])){
            $this->Auth_Model->google_login($google_client, $_GET["code"]);
        } else {
            $this->load->view('pages/auth/login.php', $data);
        }
    }
    public function register()
    {
        $google_client = $this->Auth_Model->get_google_client();
        $data['auth_url'] = $google_client->createAuthUrl();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('university', 'University', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', ['is_unique' => 'This email has already registered!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'Password too short!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('pages/auth/register.php', $data);
        } else {
            $last_login = date('Y-m-d H:i:s');
            $data = [
                'full_name' => htmlspecialchars($this->input->post('name', true)),
                'university' => htmlspecialchars($this->input->post('university', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' =>   password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'login_type' => 'normal',
                'last_login' => $last_login
            ];
            $this->Auth_Model->register($data);
        }
    }


    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout Success!</div>');
        redirect('login');
    } 

}
