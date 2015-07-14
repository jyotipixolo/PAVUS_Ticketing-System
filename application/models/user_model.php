<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class User_model extends MY_Model
{
    protected $_table_name = 'users';
    protected $_order_by = 'name';
    public $rules = array(
    'email' => array('field'=> 'email', 'label'=> 'email', 'rules'=>'trim|required|valid_email'),
    'password' => array('field'=> 'password', 'label'=> 'password', 'rules'=>'trim|required'),
    );
    
    function construct() {
        parent::__construct();
    }
    
    
    
    public function login(){
        $user = $this->getby(array(
            'email'=>$this->input->post('email'),
            'password'=>$this->hash($this->input->post('password'))
        ), TRUE);
        
        if(count($user)){
            $data = array(
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'loggedin' => TRUE                
            );
            $this->session->set_userdata($data);
        }
    }
    public function logout(){
        $this->session->sess_destroy();
    }
    public function loggedin(){
        return (bool) $this->session->userdata('loggedin');
    }
    public function hash($string){
        return hash('sha512', $string . config_item('encryption_key'));
    }
}
	
?>
    


