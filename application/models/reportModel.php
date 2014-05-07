<?php


class ReportModel extends CI_Model {

    var $report_date = '';
    var $client = '';
    var $address = '';
    var $contactno = '';
    var $term = '';
    var $remarks = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries($limit, $start)
    {
        $this->db->order_by('report_date','desc');
        $query = $this->db->get('report', $limit, $start);

        return $query->result();
    }

    function recordsCount() {
        //create query to show number row on database
        return $this->db->count_all('report');
    }

    function search($report)
    {
        $sql = "SELECT * FROM report WHERE client || report_date || model_name || sales_consultant || address || contactno || term || remarks || status LIKE ('%$report%') order by report_date";
        $query =$this->db->query($sql, array($report)); 
       
        return $query->result();
    }

    function get($report_id){
        $sql = "SELECT * FROM report WHERE report_id = ?";
        $query =$this->db->query($sql, array($report_id)); 
       
        return $query->result();
    }

    function getConsultant(){
        $query = $this->db->get('consultant');

        return $query->result();
    }

    function addConsultant($data)
    {
        $this->db->insert('consultant', $data);
        return;
    }

    function getModel(){
        $query = $this->db->get('model');

        return $query->result();
    }

    function getTerm(){
        $query = $this->db->get('term');

        return $query->result();
    }

    function getStatus(){
        $query = $this->db->get('status');

        return $query->result();
    }

    function insert_entry()
    {
        $this->report_date = $_POST['report_date']; // please read the below note
        $this->client = $_POST['client'];
        $this->address = $_POST['address'];
        $this->contactno = $_POST['contactno'];
        $this->model_name = $_POST['model_name'];
        $this->sales_consultant = $_POST['sales_consultant'];
        $this->term = $_POST['term'];
        $this->remarks = $_POST['remarks'];
        $this->status = $_POST['status'];
        
        $this->db->insert('report', $this);
    }

    function getConsultantData($username) 
    {
        $this->db->where('username', $username);
        $query = $this->db->get('consultant');

        return $query->result_array();
    }

    function deleteConsultant($consultant_id) 
    {
        $this->db->where('consultant_id', $consultant_id);
        $this->db->delete('consultant');
    }

    function update_entry()
    {
        $this->report_date = $_POST['report_date']; // please read the below note
        $this->client = $_POST['client'];
        $this->address = $_POST['address'];
        $this->contactno = $_POST['contactno'];
        $this->model_name = $_POST['model_name'];
        $this->sales_consultant = $_POST['sales_consultant'];
        $this->term = $_POST['term'];
        $this->remarks = $_POST['remarks'];
        $this->status = $_POST['status'];

        $this->db->update('report', $this, array('report_id' => $_POST['report_id']));
    }
    function delete_entry($report_id)
    {
        $this->db->delete('report', array('report_id' => $report_id));
    }
}
?>