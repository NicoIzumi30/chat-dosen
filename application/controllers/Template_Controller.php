<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->Auth_Model->cek_session();
        $this->load->model('Template_Model');
    }
    public function index()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('template', 'Template', 'required|trim');
        if($this->form_validation->run() == false){
        $data['template'] = $this->Template_Model->get_template();
        $this->load->view('layout/header.php');
        $this->load->view('pages/template.php', $data);
        $this->load->view('layout/footer.php');
        }else{
            $data = [
                'user_id' => $this->session->userdata('user_id'),
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'template' => htmlspecialchars($this->input->post('template', true)),
            ];
            $this->Template_Model->insert_template($data);
        }
    }

    public function update($id){
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('template', 'Template', 'required|trim');
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('flash-gagal', 'Di Update');
            return redirect('template');
        }else{
            $data = [
                'judul' => htmlspecialchars($this->input->post('judul', true)),
                'template' => htmlspecialchars($this->input->post('template', true)),
            ];
            $this->Template_Model->update_template($data, $id);
        }
    } 
    
    public function delete($id){
        $this->Template_Model->delete_template($id);
    } 
}