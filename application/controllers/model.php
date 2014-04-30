<?php
class Model extends CI_Controller {

    public function index()
    {
        $this->load->model('ModelModel');
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');

        $username = $this->session->userdata('username');
        $reports=$this->ReportModel->get_last_ten_entries();
        $models=$this->ModelModel->get_last_ten_entries();
        $data['query'] = $this->ConsultantModel->getConsultantData($username);

        $data['data']=$data;
        $data['reports']=$reports;
        $data['models']=$models;
        
        $this->load->view('report/reportlist', $data);      
    }
    public function view($model_id)
    {
        $this->is_logged_in();
        $this->load->model('ModelModel');
        $this->load->model('ConsultantModel');
        $model=$this->ModelModel->get($model_id);

        $username = $this->session->userdata('username');
        $data['query'] = $this->ConsultantModel->getConsultantData($username);

        $data['data']=$data;
        $data['model']=$model;
        $this->load->view('model/modelview', $data);
    }
    public function add()
    {
        $this->load->model('ModelModel');
        $models=$this->ModelModel->get_last_ten_entries();

        $this->load->view('model/modeladd',array('models'=>$models));
    }
    public function edit($model_id)
    {
        $this->is_logged_in();
        $this->load->model('ModelModel');
        $model=$this->ModelModel->get($model_id);

        $this->load->view('model/modeledit',array('model'=>$model));
    }
    public function insert()
    {   
        $this->is_logged_in();
        $this->load->model('ModelModel');
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');

        $username = $this->session->userdata('username');
        $reports=$this->ReportModel->get_last_ten_entries();
        $models=$this->ModelModel->get_last_ten_entries();
        $data['query'] = $this->ConsultantModel->getConsultantData($username);

        $this->form_validation->set_rules('name', 'Model Name', 'trim|required|is_unique[model.name]|xss_clean');

        $data['data']=$data;
        $data['reports']=$reports;
        $data['models']=$models;
        if ($this->form_validation->run() == FALSE) {
            
            $this->index();
        } else {

            $this->ModelModel->insert_entry();
            $this->index(); 
        }        
    }
    public function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in != true)
        {
            echo 'You don\'t have permission to access this page. <a href="http://localhost/KiaDFRS/index.php/report/home"></br><font color="red">Back</font></a>';
            die();
        }
    }
    public function update()
    {
        $this->is_logged_in();
        $this->load->model('ModelModel');
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');

        $username = $this->session->userdata('username');
        $reports=$this->ReportModel->get_last_ten_entries();
        $models=$this->ModelModel->get_last_ten_entries();
        $data['query'] = $this->ConsultantModel->getConsultantData($username);

        $this->form_validation->set_rules('name', 'Model Name', 'trim|required|is_unique[model.name]|xss_clean');

        $data['data']=$data;
        $data['reports']=$reports;
        $data['models']=$models;
        if ($this->form_validation->run() == FALSE) {
            
            $this->index();
        } else {

            $this->ModelModel->update_entry();
            $this->index(); 
        }  
    }
    public function delete($model_id)
    {
        $this->load->model('ModelModel');
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');
        $this->ModelModel->delete_entry($model_id);

        $username = $this->session->userdata('username');
        $reports=$this->ReportModel->get_last_ten_entries();
        $models=$this->ModelModel->get_last_ten_entries();
        $data['query'] = $this->ConsultantModel->getConsultantData($username);

        $data['data']=$data;
        $data['reports']=$reports;
        $data['models']=$models;
        
        $this->load->view('report/reportlist', $data);                   
    }
}
?>