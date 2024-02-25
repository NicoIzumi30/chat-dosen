<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->Auth_Model->cek_session();
    }
    public function index()
    {
        $data['user'] = $this->Users_Model->get_user();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('university', 'University', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header.php');
            $this->load->view('pages/profile.php', $data);
            $this->load->view('layout/footer.php');
        } else {
            $data = [
                'full_name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'university' => htmlspecialchars($this->input->post('university', true)),
            ];
            $this->Users_Model->update_profile($data);
        }
    }
    public function update_password()
    {
        $user = $this->Users_Model->get_user();
        if ($user['password'] !== null) {
            $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        }
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[6]');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('profile');
        } else {
            $new_password = $this->input->post('new_password');
            if($user['password'] == null){
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $data = [
                    'password' => $password_hash
                ];
                $this->Users_Model->update_password($data);
            }else{
                $current_password = $this->input->post('current_password');
                if (!password_verify($current_password, $user['password'])) {
                    $this->session->set_flashdata('flash-gagal', 'Di Update');
                    return redirect('profile');
                } else {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $data = [
                        'password' => $password_hash
                    ];
                    $this->Users_Model->update_password($data);
                }
            }
            
        }
    }
}
