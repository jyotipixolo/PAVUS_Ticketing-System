<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Booking_model extends CI_Model
{
   public $rules = array(
    'email' => array('field'=> 'email', 'label'=> 'email', 'rules'=>'trim|required|valid_email'),
    );

   public function login($user, $pass)
   {
        $data = $this->db->query('SELECT * FROM `users` WHERE `name` = "'.$user.'"')->row();
        if($data != false)
        {
            if($data->password == $pass)
                {
                    return $data;
                }else{
                    return false;   
                };
        }else{
            return false;
        };
        
   }

    public function tcount($cat)
    {
        $this->db->where('category',$cat);
        $this->db->from('tickets');
        $data=$this->db->count_all_results();
        return $data;
    }
    
    public function createorder($data)
    {
            $this->db->set($data);
            $this->db->insert('orders');
            $data = $this->db->insert_id();
            return $data;
    
    }

    public function getall()
    {
        $data = $this->db->query('SELECT * FROM tickets')->result();
        return $data;
    }

    public function getlastticketnumber($cat)
    {
        $this->db->select_max('id');
        $this->db->where('category',$cat);
        $id=$this->db->get('tickets')->row();
        
        if($id->id > 0)
        {
            $this->db->select('ticket');
            $this->db->where('id', $id->id);
            $data = $this->db->get('tickets')->row();
            return $data->ticket;
        }
        return false;
    }
    
    public function incrementticketnumber($number, $cat) 
    {
        $number = substr($number, 1);
        $number = intval($number);
        $number = $number +1;
        $number = (string)$number;
         $len = strlen($number);
        if($len < 3)
        {
            for($i=0; $i<3-$len; $i++)
            {
                $number = "0".$number;
            };
            $number = $cat.$number;
        };
        return $number;
    }
    
    public function createtickets($data){
            $this->db->set($data);
            $this->db->insert('tickets');
            $id = $this->db->insert_id();
            if($id > 0)
            {
                return $data['ticket'];
            }
    }

    public function getorderticket($order)
    {
        $data = $this->db->query('SELECT `ticket` FROM `tickets` WHERE `orderid` = '.$order)->result();
        return $data;
    }

    public function getorderuser($order)
    {
        $data = $this->db->query('SELECT * FROM `orders` WHERE `id` = '.$order)->row();
        return $data;
    }
}

?>
    


