<?php
class Report extends CI_Controller {

    public function index()
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');

        if (isset($_POST['report'])){
            $reports=$this->ReportModel->search($_POST['report']); 
        } else {
            $reports=$this->ReportModel->get_last_ten_entries();
        }
        
        $models=$this->ReportModel->getModel();
        $terms=$this->ReportModel->getTerm();
        $all_status=$this->ReportModel->getStatus();

        $username = $this->session->userdata('username');
        $data['query'] = $this->ConsultantModel->getConsultantData($username);

        //$this->load->view('report/reportlist', $data);
        //$this->load->view('report/reportlist', array('reports'=>$reports,'terms'=>$terms,'models'=>$models));
        $data['data']=$data;
        $data['reports']=$reports;
        $data['terms']=$terms;
        $data['models']=$models;
        $data['all_status']=$all_status;
        $this->load->view('report/reportlist', $data);
    }
    public function home() 
    {
        $this->load->view('home');
    }
    public function edit($report_id)
    {   
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $report=$this->ReportModel->get($report_id);
        $models=$this->ReportModel->getModel();
        $terms=$this->ReportModel->getTerm();
        $all_status=$this->ReportModel->getStatus();


        $this->load->view('report/reportedit',array('all_status'=>$all_status, 'models'=>$models,'terms'=>$terms,'report'=>$report));
    }
    public function view($report_id)
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');
        $report=$this->ReportModel->get($report_id);

        $username = $this->session->userdata('username');
        $data['query'] = $this->ConsultantModel->getConsultantData($username);

        $data['data']=$data;
        $data['report']=$report;
        $this->load->view('report/reportview', $data);
    }
    public function insert()
    {   
        $this->is_logged_in();
        $this->load->model('ReportModel');
        
        $this->form_validation->set_rules('report_date', 'Report Date', 'trim|required');
        $this->form_validation->set_rules('client', 'Client Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Client Address', 'trim|required');
        $this->form_validation->set_rules('contactno', 'Client Contact #', 'trim|required');
        $this->form_validation->set_rules('status', 'Client Status', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            
            $this->index();
        } else {

            $this->ReportModel->insert_entry();
            $this->index();
        }
    }
    public function update()
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');

        $this->form_validation->set_rules('report_date', 'Report Date', 'trim|required');
        $this->form_validation->set_rules('client', 'Client Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Client Address', 'trim|required');
        $this->form_validation->set_rules('contactno', 'Client Contact #', 'trim|required');
        $this->form_validation->set_rules('status', 'Client Status', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            
            $this->index();
        } else {

            $this->ReportModel->update_entry();
            $this->index();
        }               
    }
    public function delete($report_id)
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->ReportModel->delete_entry($report_id);

        $this->index();  
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
    public  function validate_credentials() 
    {
        $this->load->model('ConsultantModel');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $query = $this->ConsultantModel->validate($username, $password);
        
        if($query) {
            $data = array(
                'username' => $this->input->post('username'),
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect('report');
        }
        else {
            $this->session->set_flashdata('flashError', 'Incorrect Username/Password Combination');
            redirect('report/home');
        }
    }

    public function signup() 
    {   
        $this->load->model('ReportModel');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|is_unique[consultant.username]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('home');
        }
        else {
        $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );

        $this->ReportModel->addConsultant($data);
        redirect('report/home');
        }
    }

    public function logout()  
    {
        $this->is_logged_in();
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('report/home');
    }
}
?>