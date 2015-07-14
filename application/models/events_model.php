<?php
if ( !defined( 'BASEPATH' ) )
	exit( 'No direct script access allowed' );
class Events_model extends MY_Model
{
    protected $_table_name = 'events';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = '';
    public $rules = array();
    protected $_timestamps = 'FALSE';
	
    public function getallevents()
	{
		$query = $this->db->query("SELECT * FROM `events`")->result();
        return $query;
	}
}
	
?>
    


