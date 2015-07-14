<?php

class Pixolo_Controller extends MY_Controller {
    
    function __construct(){
        parent::__construct();
        
        $this->data['title'] = "Pixolo ADmin Panel";
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        
        $this->load->model('user_model');
        
        //GO TO LOGIN PAGE IF NO SESSION
        $exception_uris = array("user/login", "user/logout");
        if(in_array(uri_string(),$exception_uris) == FALSE)
           {
                if($this->user_model->loggedin() == FALSE){
                    redirect('user/login');
                }
           }
    }
}