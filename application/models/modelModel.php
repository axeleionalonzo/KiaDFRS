<?php


class ModelModel extends CI_Model {

    var $name = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $this->db->order_by('name','asc');
        $query = $this->db->get('model');
        
        return $query->result();
    }
    
    function get($model_id){
        $sql = "SELECT * FROM model WHERE model_id = ?";
        $query =$this->db->query($sql, array($model_id)); 

        return $query->result();
    }

    function insert_entry()
    {
        $this->name = $_POST['name'];
        $this->price = $_POST['price']; 
        $this->db->insert('model', $this);
    }

    function update_entry()
    {
        $this->name = $_POST['name'];
        $this->price = $_POST['price'];
        $this->db->update('model', $this, array('model_id' => $_POST['model_id']));
    }
    function delete_entry($model_id)
    {
        $this->db->delete('model', array('model_id' => $model_id));
    }

}
?>