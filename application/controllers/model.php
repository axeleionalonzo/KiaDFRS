<?php
class Model extends CI_Controller {

    public function index()
    {
        $this->is_logged_in();
        $this->load->model('ModelModel');
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');
        $this->load->library('pagination');

        $config['base_url'] = 'http://192.168.1.33/KiaDFRS/index.php/report/index';
        $config['total_rows'] = $this->ReportModel->recordsCount();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';
        $config['next_link'] = '»';
        $config['prev_link'] = '«';

        $limit = $config['per_page'] = 20;
        $start = $this->uri->segment(3);
        $config['num_links'] = 40;

        $this->pagination->initialize($config);

        $username = $this->session->userdata('username');
        $reports=$this->ReportModel->get_last_ten_entries($limit, $start);
        $models=$this->ModelModel->get_last_ten_entries();
        $terms=$this->ReportModel->getTerm();
        $all_status=$this->ReportModel->getStatus();
        $consultants=$this->ReportModel->getConsultant();
        $consultant_requests=$this->ConsultantModel->getConsultantRequestData();
        $data['query'] = $this->ConsultantModel->getConsultantData($username);
        $recordsbyconsultatnt=$this->ReportModel->getrecordby($username);


        $data['control']='Model';
        $data['data']=$data;
        $data['reports']=$reports;
        $data['models']=$models;
        $data['terms']=$terms;
        $data['consultant_requests']=$consultant_requests;
        $data['all_status']=$all_status;
        $data['consultants']=$consultants;
        $data['recordsbyconsultatnt']=$recordsbyconsultatnt;
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
    public function rank($username) 
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');

        return $ranks=$this->ReportModel->getrecordby($username);
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

        $this->form_validation->set_rules('name', 'Model Name', 'trim|required|is_unique[model.name]|xss_clean');
        $this->form_validation->set_rules('price', 'Unit Price', 'trim|required|xss_clean');

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
            echo 'You don\'t have permission to access this page. <a href="http://192.168.1.33/KiaDFRS/index.php/report/home"></br><font color="red">Back</font></a>';
            die();
        }
    }
    public function update()
    {
        $this->is_logged_in();
        $this->load->model('ModelModel');

        $this->form_validation->set_rules('price', 'Unit Price', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            
            $this->index();
        } else {

            $this->ModelModel->update_entry();
            $this->index(); 
        }  
    }
    public function delete($model_id)
    {
        $this->is_logged_in();
        $this->load->model('ModelModel');
        $this->ModelModel->delete_entry($model_id);
        
        $this->index();               
    }
}
?>