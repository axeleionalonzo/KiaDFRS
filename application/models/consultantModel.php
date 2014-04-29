<?php
class ConsultantModel extends CI_Model {

    var $username = '';
    var $password = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function validate($username, $password) 
    {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('consultant');

        if($query->num_rows == 1) {
            return true;
        }
    }

    function getConsultantData($username) 
    {
        $this->db->where('username', $username);
        $query = $this->db->get('consultant');
        return $query->result_array();
    }
}
?>