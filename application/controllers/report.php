<?php
class Report extends CI_Controller {

    public function index()
    {
        $this->load->database();
        $this->load->model('ReportModel');
        $reports=$this->ReportModel->get_last_ten_entries();
        $this->load->view('report/reportlist',array('reports'=>$reports));
    }
    public function add()
    {
        $this->load->database();
        $this->load->model('ReportModel');
        $reports=$this->ReportModel->get_last_ten_entries();
        $this->load->view('report/reportadd',array('reports'=>$reports));
    }
    public function edit($report_id)
    {
                $this->load->database();
                $this->load->model('ReportModel');
                $report=$this->ReportModel->get($report_id);
        $this->load->view('report/reportedit',array('report'=>$report));
    }
    public function insert()
    {

        $this->load->database();
        $this->load->model('ReportModel');
        $this->ReportModel->insert_entry();
                
                $reports=$this->ReportModel->get_last_ten_entries();
        $this->load->view('report/reportlist',array('reports'=>$reports));
                           
    }
        public function update()
    {

        $this->load->database();
        $this->load->model('ReportModel');
        $this->ReportModel->update_entry();
                
        $reports=$this->ReportModel->get_last_ten_entries();
        $this->load->view('report/reportlist',array('reports'=>$reports));
                           
    }
          public function delete($report_id)
    {

        $this->load->database();
        $this->load->model('ReportModel');
        $this->ReportModel->delete_entry($report_id);
                
                $reports=$this->ReportModel->get_last_ten_entries();
        $this->load->view('report/reportlist',array('reports'=>$reports));
                           
    }
}
?>