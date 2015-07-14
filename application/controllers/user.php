<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends Pixolo_Controller {

	public function __construct(){
        parent::__construct();
    }
    
    public function login(){
        $rules = $this->user_model->rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE)
        {
            //LOGIN
            if($this->user_model->login() == TRUE){
                redirect('welcome/tables');
            }else{
                $this->session->set_flashdata('error', 'email and password dont match');
                redirect('user/login');
            };
        };
        
        $this->user_model->loggedin() == FALSE || redirect('welcome/tables');
        
        $this->load->view('login', $this->data);
    }
    
    public function logout(){
        $this->user_model->logout();
        redirect('user/login');
    }
}
