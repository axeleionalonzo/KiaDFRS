<?php
class Report extends CI_Controller {

    public function index()
    {   

        $this->load->database();
        $this->load->model('ReportModel');
        if (isset($_POST['report']))
            $reports=$this->ReportModel->search($_POST['report']); 
        else
            $reports=$this->ReportModel->get_last_ten_entries();
        
        $models=$this->ReportModel->getModel();
        $terms=$this->ReportModel->getTerm();
        $this->load->view('report/reportlist',array('reports'=>$reports,'terms'=>$terms,'models'=>$models));
    }
    public function add()
    {
        $this->load->database();
        $this->load->model('ReportModel');
        $models=$this->ReportModel->getModel();
        $terms=$this->ReportModel->getTerm();
        $this->load->view('report/reportadd',array('models'=>$models,'terms'=>$terms));
    }
    public function edit($report_id)
    {
        $this->load->database();
        $this->load->model('ReportModel');
        $report=$this->ReportModel->get($report_id);
        $models=$this->ReportModel->getModel();
        $terms=$this->ReportModel->getTerm();
        $this->load->view('report/reportedit',array('models'=>$models,'terms'=>$terms,'report'=>$report));
    }
    public function view($report_id)
    {
        $this->load->database();
        $this->load->model('ReportModel');
        $report=$this->ReportModel->get($report_id);
        $models=$this->ReportModel->getModel();
        $reports=$this->ReportModel->get_last_ten_entries();
        $this->load->view('report/reportview',array('models'=>$models,'report'=>$report));
    }
    public function insert()
    {

        $this->load->database();
        $this->load->model('ReportModel');
        $this->ReportModel->insert_entry();
                
        $reports=$this->ReportModel->get_last_ten_entries();
        $models=$this->ReportModel->getModel();
        $terms=$this->ReportModel->getTerm();
        $this->load->view('report/reportlist',array('models'=>$models,'terms'=>$terms,'reports'=>$reports));
                           
    }
    public function update()
    {

        $this->load->database();
        $this->load->model('ReportModel');
        $this->ReportModel->update_entry();

        $terms=$this->ReportModel->getTerm();

        $this->index();                  
    }
    public function delete($report_id)
    {

        $this->load->database();
        $this->load->model('ReportModel');
        $this->ReportModel->delete_entry($report_id);
        $models=$this->ReportModel->getModel();
        $reports=$this->ReportModel->get_last_ten_entries();

        $this->load->view('report/reportlist',array('models'=>$models,'reports'=>$reports));
                           
    }
}
?>