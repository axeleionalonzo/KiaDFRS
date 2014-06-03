<?php


class BulletinModel extends CI_Model {

    var $description = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function getbulletin()
    {
        $query = $this->db->get('bulletin');

        return $query->result();
    }

    function update_bulletin()
    {
        $this->description = $_POST['description'];

        $this->db->update('bulletin', $this, array('bulletin_id' => $_POST['bulletin_id']));
    }
}
?>