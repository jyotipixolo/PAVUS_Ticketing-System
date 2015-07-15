<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class booking extends Pixolo_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        
	}
    public function bookingform()
    {
        $this->load->model('booking_model','',TRUE);
        
        
        $message['silver'] = $this->booking_model->tcount('silver');
       $message['gold'] = $this->booking_model->tcount('gold');
        $message['diamond'] = $this->booking_model->tcount('diamond');
        $message['vip'] = $this->booking_model->tcount('vip');
        
        
        $this->load->view('bookingform', $message);
    }
    public function confirmation()
    {
        
        
        
         $this->load->model('booking_model','',TRUE);
        
        $cost['silver']=1000;
        $cost['gold']=1500;
        $cost['diamond']=2000;
        $cost['vip']=2500;
        
        $ticketinitial['silver'] = "S";
        $ticketinitial['gold'] = "G";
        $ticketinitial['diamond'] = "D";
        $ticketinitial['vip'] = "V";
        
        $inputdata['name']=$this->input->get('name');
        $inputdata['contactnumber']=$this->input->get('contactnumber');
        $inputdata['email']=$this->input->get('email');
        $inputdata['category']=$this->input->get('category');
        $inputdata['quantity']=$this->input->get('quantity');
        $inputdata['cost']=$inputdata['quantity'] * $cost[$inputdata['category']];
            print_r ($inputdata);
         $count = $this->booking_model->tcount($inputdata['category']);
        if($count + $inputdata['quantity'] <= 20)
        {
            $orderid=$this->booking_model->createorder($inputdata);
            $ticketid = $this->booking_model->getlastticketnumber($inputdata['category']);
            if($ticketid == false)
            {
                $ticketid = $ticketinitial[$inputdata['category']]."000";
            }
            $ticketnumbers = array();
            
            //CREATE TICKETS
            for($q=0; $q<$inputdata['quantity']; $q++)
            {
                //CALL GET LAST TICKET NUMBER FUNCTION
                
                
                //INCREMENT VALUE
                $ticketid = $this->booking_model->incrementticketnumber($ticketid, $ticketinitial[$inputdata['category']]);
                
                //CREATE ARRAY
                $insertdata['category'] = $inputdata['category'];
                $insertdata['orderid'] = $orderid;
                $insertdata['ticket'] = $ticketid;
                
                //INSERT DATA
                $ticketbookedid = $this->booking_model->createtickets($insertdata);
                print_r($ticketbookedid);
                array_push($ticketnumbers,$ticketbookedid);
                print_r($ticketnumbers);
            }
            
            //ARRAY THAT CONTAINS ALL THE TICKET NUMBER TO PUT IN RECEIPT - $ticketnumbers
            print_r($ticketnumbers);
            
        }
        $this->load->model('booking_model','',TRUE);
        $this->load->view('bookingconfirmation', $this->data);
    }
    public function pdf()
    {
        $this->load->view('pdf', $this->data);
    }
    
    
    
    
    
    
    public function create()
	{
        $this->load->model('Events_model','',TRUE);
        $data = array(
            'showimage' => 1
        );
        
        $message['events'] = $this->Events_model->save($data, 3);
        print_r($message);
		//$this->load->view('json', $message);
	}
    public function delete()
	{
        $this->load->model('Events_model','',TRUE);
        $data = array(
            'showimage' => 1
        );
        
        $message['events'] = $this->Events_model->delete(3);
        print_r($message);
		//$this->load->view('json', $message);
	}
    public function tables()
	{
        $this->load->model('Events_model','',TRUE);
        $message['events'] = $this->Events_model->getallevents();
        //print_r(json_encode($this->data));
		$this->load->view('tables', $this->data);
	}
}
