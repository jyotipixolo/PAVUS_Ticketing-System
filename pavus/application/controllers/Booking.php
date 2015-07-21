<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

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
		$this->load->view('welcome_message');
	}
	public function login()
    {
        $user=$this->input->get('user');
        $user = json_decode($user);

        $this->load->model('booking_model','',TRUE);
        $message['json'] = $this->booking_model->login($user->name, $user->password);
            $this->load->view('json', $message);
            
    }
    
    public function bookingform()
    {
        $this->load->model('booking_model','',TRUE);
        
        $totaltickets['earlybird'] = 20;
        $totaltickets['silver'] = 20;
        $totaltickets['gold'] = 30;
        $totaltickets['diamond'] = 20;
        $totaltickets['vip'] = 20;
        
        $message['earlybird'] = $this->booking_model->tcount('earlybird');
        $message['silver'] = $this->booking_model->tcount('silver');
        $message['gold'] = $this->booking_model->tcount('gold');
        $message['diamond'] = $this->booking_model->tcount('diamond');
        $message['vip'] = $this->booking_model->tcount('vip');
        
        $message['json'] = new stdClass();
        $message['json']->earlybird = $totaltickets['earlybird'] - $message['earlybird'];
        $message['json']->silver = $totaltickets['silver'] - $message['silver'];
        $message['json']->gold = $totaltickets['gold'] - $message['gold'];
        $message['json']->diamond = $totaltickets['diamond'] - $message['diamond'];
        $message['json']->vip = $totaltickets['vip'] - $message['vip'];
        
        $this->load->view('json', $message);
    }
    
    public function confirmation()
    {

        $this->load->model('booking_model','',TRUE);
        
        $ticketinitial['earlybird'] = "E";
        $ticketinitial['silver'] = "S";
        $ticketinitial['gold'] = "G";
        $ticketinitial['diamond'] = "D";
        $ticketinitial['vip'] = "V";

        $totaltickets['earlybird'] = 20;
        $totaltickets['silver'] = 20;
        $totaltickets['gold'] = 30;
        $totaltickets['diamond'] = 20;
        $totaltickets['vip'] = 20;
        
        $input=$this->input->get('ticketinput');
        $input=json_decode($input);
        $inputdata['name']=$input->name;
        $inputdata['contactnumber']=$input->contactnumber;
        $inputdata['email']=$input->email;
        $inputdata['category']=$input->category;
        $inputdata['quantity']=$input->quantity;
        $inputdata['cost']=$input->cost;
        $inputdata['sales']=$input->sales;
        $count = $this->booking_model->tcount($inputdata['category']);
        if($count + $inputdata['quantity'] <= $totaltickets[$inputdata['category']])
        {

            $orderid=$this->booking_model->createorder($inputdata);
            $ticketid = $this->booking_model->getlastticketnumber($inputdata['category']);
            if($ticketid == false)
            {
                $ticketid = $ticketinitial[$inputdata['category']]."000";
            };
            
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
                //array_push($ticketnumbers,$ticketbookedid);
               
            }
            
            //ARRAY THAT CONTAINS ALL THE TICKET NUMBER TO PUT IN RECEIPT - $ticketnumbers
             

              $message['json'] = new stdClass();
              $message['json']->tickets = $this->booking_model->getorderticket($orderid);
              $message['json']->user = $this->booking_model->getorderuser($orderid);
        
            $this->load->view('json', $message);
                
        }
        else{
            print_r("false");
        }
        
    }
}
