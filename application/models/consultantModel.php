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

    function getConsultantRequest($cr_id){
        $sql = "SELECT * FROM consultant_request WHERE cr_id = ?";
        $query =$this->db->query($sql, array($cr_id)); 
       
        return $query->result();
    }

    function getConsultantData($username) 
    {
        $this->db->where('username', $username);
        $query = $this->db->get('consultant');
        return $query->result_array();
    }

    function requestConsultant($data) 
    {
        $this->db->insert('consultant_request', $data);
        return;
    }

    function getConsultantRequestData() 
    {
        $query = $this->db->get('consultant_request');

        return $query->result();
    }

    function deleteConsultant($cr_id) 
    {
        $this->db->where('cr_id', $cr_id);
        $this->db->delete('consultant_request');
    }
}
?>