<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class booking_model extends MY_Model
{
   
    public function tcount($cat)
    {
        $this->db->where('category',$cat);
        $this->db->from('tickets');
        $data=$this->db->count_all_results();
        return $data;
    }
    
    public function createorder($data){
            $this->db->set($data);
            $this->db->insert('orders');
            $data = $this->db->insert_id();
            return $data;
    
}
    
    public function getlastticketnumber($cat)
    {
        $this->db->select_max('id');
        $this->db->where('category',$cat);
        $id=$this->db->get('tickets')->row();
        print_r($id);
        print_r("is the ID");
        
        if($id->id > 0)
        {
            $this->db->select('ticket');
            $this->db->where('id', $id->id);
            $data = $this->db->get('tickets')->row();
            print_r($data);
            return $data->ticket;
        }
        return false;
    }
    
    public function incrementticketnumber($number, $cat) {
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
}

?>
    


