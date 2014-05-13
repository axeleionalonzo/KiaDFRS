<?php


class QuotationModel extends CI_Model {

    var $quotation_date = '';
    var $client = '';
    var $address = '';
    var $model = '';
    var $contactno = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get($quotation_id){
        $sql = "SELECT * FROM quotation WHERE quotation_id = ?";
        $query =$this->db->query($sql, array($quotation_id)); 
       
        return $query->result();
    }

    function getQuotation(){
        $query = $this->db->get('quotation');

        return $query->result();
    }

    function insert_entry()
    {
        $this->quotation_date = $_POST['report_date']; // please read the below note
        $this->client = $_POST['client'];
        $this->address = $_POST['address'];
        $this->contactno = $_POST['contactno'];
        $this->model = $_POST['model_name'];
        
        $this->db->insert('quotation', $this);
    }

    function update_entry()
    {
        $this->quotation_date = $_POST['quotation_date']; // please read the below note
        $this->client = $_POST['client'];
        $this->address = $_POST['address'];
        $this->contactno = $_POST['contactno'];
        $this->model = $_POST['model'];
        $this->unit_price = $_POST['unit_price'];
        $this->amount_financed = $_POST['amount_financed'];
        $this->down_payment = $_POST['down_payment'];
        $this->freight_and_handling = $_POST['freight_and_handling'];
        $this->comprehensive_insurance = $_POST['comprehensive_insurance'];
        $this->lto_registration = $_POST['lto_registration'];
        $this->chattel_mortgage_fee = $_POST['chattel_mortgage_fee'];
        $this->other_services = $_POST['other_services'];
        $this->total_cash_outlay = $_POST['total_cash_outlay'];
        $this->monthly_installment = $_POST['monthly_installment'];
        $this->monthly_rate = $_POST['monthly_rate'];

        $this->db->update('quotation', $this, array('quotation_id' => $_POST['quotation_id']));
    }

    function update_entry_from_report()
    {
        $this->quotation_date = $_POST['report_date']; // please read the below note
        $this->client = $_POST['client'];
        $this->address = $_POST['address'];
        $this->contactno = $_POST['contactno'];
        $this->model = $_POST['model_name'];

        $this->db->update('quotation', $this);
    }
    function delete_entry($quotation_id)
    {
        $this->db->delete('quotation', array('quotation_id' => $quotation_id));
    }
}
?>