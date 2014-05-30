<?php
class Report extends CI_Controller {

    public function index()
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');
        $this->load->library('pagination');

        $config['base_url'] = 'http://greencar-99c5fe/KiaDFRS/index.php/report/index';
        $config['total_rows'] = $this->ReportModel->recordsCount();
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';
        $config['next_link'] = '»';
        $config['prev_link'] = '«';

        $limit = $config['per_page'] = 20;
        $start = $this->uri->segment(3);
        $config['num_links'] = 40;

        $this->pagination->initialize($config);

        if (isset($_POST['report'])){
            $reports=$this->ReportModel->search($_POST['report']);
        } else {
            $reports=$this->ReportModel->get_last_ten_entries($limit, $start);
        }

        $models=$this->ReportModel->getModel();
        $terms=$this->ReportModel->getTerm();
        $consultants=$this->ReportModel->getConsultant();
        $consultant_requests=$this->ConsultantModel->getConsultantRequestData();
        $all_status=$this->ReportModel->getStatus();

        $username = $this->session->userdata('username');
        $data['query'] = $this->ConsultantModel->getConsultantData($username);
        $recordsbyconsultatnt=$this->ReportModel->getrecordby($username);

        $data['control']='Report';
        $data['data']=$data;
        $data['reports']=$reports;
        $data['terms']=$terms;
        $data['models']=$models;
        $data['consultants']=$consultants;
        $data['consultant_requests']=$consultant_requests;
        $data['all_status']=$all_status;
        $data['recordsbyconsultatnt']=$recordsbyconsultatnt;
        $this->load->view('report/reportlist', $data);
    }
    public function home() 
    {
        $this->load->view('home');
    }
    public function rank($username) 
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');

        return $ranks=$this->ReportModel->getrecordby($username);
    }
    public function edit($report_id)
    {   
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $report=$this->ReportModel->get($report_id);
        $models=$this->ReportModel->getModel();
        $terms=$this->ReportModel->getTerm();
        $consultants=$this->ReportModel->getConsultant();
        $all_status=$this->ReportModel->getStatus();

        $this->load->view('report/reportedit',array('all_status'=>$all_status, 'consultants'=>$consultants, 'models'=>$models,'terms'=>$terms,'report'=>$report));
    }
    public function editQuotation($quotation_id)
    {   
        $this->is_logged_in();
        $this->load->model('QuotationModel');
        $this->load->model('ReportModel');
        $this->load->model('ModelModel');
        $monthly_installment=$this->ReportModel->getmonthly_installment();
        $quotation=$this->QuotationModel->get($quotation_id);
        $models=$this->ModelModel->get_last_ten_entries();

        $data['quotation']=$quotation;
        $data['models']=$models;
        $data['monthly_installment']=$monthly_installment;
        $this->load->view('quotation/quotationedit', $data);
    }
    public function editConsultant($consultant_id)
    {
        $this->is_logged_in();
        $this->load->model('ConsultantModel');
        $consultant=$this->ConsultantModel->getConsultantById($consultant_id);
        $username = $this->session->userdata('username');
        $this->load->model('ReportModel');

        $data['query'] = $this->ReportModel->getConsultantData($username);
        $data['consultant']=$consultant;
        $this->load->view('consultant/consultantedit', $data);
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
    public function viewconsultantby($username)
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');

        $trimed = str_replace("%20"," ",$username);
        $recordsbyconsultatnt=$this->ReportModel->getrecordby($trimed);
        $productivity=$this->ReportModel->getallrecords();
        $consultants=$this->ReportModel->getConsultant();

        $data['username'] = $trimed;
        $data['query'] = $this->ReportModel->getConsultantData($trimed);
        $data['recordsbyconsultatnt']=$recordsbyconsultatnt;
        $data['productivity']=$productivity;
        $data['consultants']=$consultants;
        $this->load->view('consultant/consultantview', $data);        
    }
    public function viewQuotation($quotation_id)
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->load->model('QuotationModel');
        $this->load->model('ConsultantModel');
        $this->load->model('ModelModel');
        $quotation=$this->QuotationModel->get($quotation_id);
        $report=$this->ReportModel->get($quotation_id);
        $models=$this->ModelModel->get_last_ten_entries();

        $username = $this->session->userdata('username');
        $data['query'] = $this->ConsultantModel->getConsultantData($username);

        $data['models']=$models;
        $data['data']=$data;
        $data['report']=$report;
        $data['quotation']=$quotation;
        $this->load->view('quotation/quotationview', $data);
    }
    public function view_request($cr_id)
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');
        $consultant_data=$this->ConsultantModel->getConsultantRequest($cr_id);

        $username = $this->session->userdata('username');
        $data['query'] = $this->ConsultantModel->getConsultantData($username);

        $data['data']=$data;
        $data['consultant_data']=$consultant_data;
        $this->load->view('consultant/consultant_requestview', $data);
    }
    public function insert()
    {   
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->load->model('QuotationModel');

        $this->form_validation->set_rules('sales_consultant', 'Sales Consultant', 'trim|required|xss_clean');
        $this->form_validation->set_rules('report_date', 'Report Date', 'trim|required');
        $this->form_validation->set_rules('client', 'Client Name', 'trim|required|is_unique[report.client]|xss_clean');
        $this->form_validation->set_rules('address', 'Client Address', 'trim|required');
        $this->form_validation->set_rules('contactno', 'Client Contact #', 'trim|required');
        $this->form_validation->set_rules('status', 'Client Status', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            
            $this->index();
        } else {
            $this->QuotationModel->insert_entry();
            $this->ReportModel->insert_entry();
            $this->index();
        }
        
    }
    public function viewConsultant()
    {
        $this->is_logged_in();
        $username = $this->session->userdata('username');
        $this->load->model('ReportModel');

        $recordsbyconsultatnt=$this->ReportModel->getrecordby($username);
        $productivity=$this->ReportModel->getallrecords();
        $consultants=$this->ReportModel->getConsultant();

        $data['query'] = $this->ReportModel->getConsultantData($username);
        $data['recordsbyconsultatnt']=$recordsbyconsultatnt;
        $data['productivity']=$productivity;
        $data['consultants']=$consultants;
        $this->load->view('consultant/consultantview', $data);
    }
    public function update()
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->load->model('QuotationModel');
        $report_id = $_POST['report_id'];

        $this->form_validation->set_rules('sales_consultant', 'Sales Consultant', 'trim|required|xss_clean');
        $this->form_validation->set_rules('report_date', 'Report Date', 'trim|required');
        $this->form_validation->set_rules('client', 'Client Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Client Address', 'trim|required');
        $this->form_validation->set_rules('contactno', 'Client Contact #', 'trim|required');
        $this->form_validation->set_rules('status', 'Client Status', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            
            $this->view($report_id);
        } else {
            $this->ReportModel->update_entry();
            $this->QuotationModel->update_entry_from_report();
            $this->view($report_id);
        }               
    }
    public function updateQuotation()
    {
        $this->is_logged_in();
        $this->load->model('QuotationModel');
        $quotation_id = $_POST['quotation_id'];

        $quotation=$this->QuotationModel->get($quotation_id);

        $this->form_validation->set_rules('unit_price', 'Unit Price', 'trim|required');
        $this->form_validation->set_rules('amount_financed', 'Amount Financed', 'trim|required');
        $this->form_validation->set_rules('down_payment', 'Down Payment', 'trim|required');
        $this->form_validation->set_rules('monthly_installment', 'Monthly Installment', 'trim|required');
        $this->form_validation->set_rules('monthly_rate', 'Monthly Rate', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            
            $this->viewQuotation($quotation_id);
        } else {
            $this->QuotationModel->update_entry();
            $this->viewQuotation($quotation_id);
        }               
    }
    public function updateConsultant()
    {
        $this->is_logged_in();
        $this->load->model('ConsultantModel');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            
            $this->index();
        } else {
            $this->ConsultantModel->update_consultant();
            echo "<div class=\"container\"><center><div class=\"alert alert-dismissable alert-success\"></div><div class=\"alert alert-dismissable alert-success\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
              <h4>Congratulations!</h4>
              <p>You just successfully updated your Account details!</p>
            </div></center></div>";
            $this->index();
        }               
    }
    public function deleteConsultant($consultant_id)
    {
        $this->load->model('ReportModel');
        $this->ReportModel->deleteConsultant($consultant_id);
        echo "<div class=\"container\"><center><div class=\"alert alert-dismissable alert-success\"></div><div class=\"alert alert-dismissable alert-success\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            <h4>Congratulations!</h4>
            <p>You just successfully deleted your Account! Create a new Account by Signing up!</p>
            </div></center></div>";
        $this->logout();
    }
    public function deleteConsultantbyADMIN($consultant_id)
    {
        $this->load->model('ReportModel');
        $this->ReportModel->deleteConsultant($consultant_id);
        echo "<div class=\"container\"><center><div class=\"alert alert-dismissable alert-success\"></div><div class=\"alert alert-dismissable alert-success\">
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
            <h4>Congratulations!</h4>
            <p>You just successfully removed the Consultant's Account!</p>
            </div></center></div>";
        $this->index();
    }
    public function deleteRequest($cr_id)
    {
        $this->load->model('ConsultantModel');
        $this->ConsultantModel->deleteConsultant($cr_id);
            echo "<div class=\"container\"><center><div class=\"alert alert-dismissable alert-success\"></div><div class=\"alert alert-dismissable alert-success\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
              <h4>Congratulations!</h4>
              <p>You just successfully Rejected the request!</p>
            </div></center></div>";
        $this->index();
    }
    public function delete($report_id)
    {
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->load->model('QuotationModel');
        $this->ReportModel->delete_entry($report_id);
        $this->QuotationModel->delete_entry($report_id);

        $this->index();  
    }
    public function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in != true)
        {
            echo 'You don\'t have permission to access this page. <a href="http://greencar-99c5fe/KiaDFRS/index.php/report/home"></br><font color="red">Sign in</font></a>';
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
    public function request() 
    {
        $this->load->model('ConsultantModel');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[50]|is_unique[consultant_request.username]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('home');
        } else {
        $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );

        $this->ConsultantModel->requestConsultant($data);
            echo "<div class=\"container\"><center><div class=\"alert alert-dismissable alert-success\"></div><div class=\"alert alert-dismissable alert-success\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
              <h4>Congratulations!</h4>
              <p>You just successfully Requested an account! Please wait or contact the System Administrator to approve your Request!</p>
            </div></center></div>";
        $this->load->view('home');

        }
    }
    public function signup() 
    {   
        $this->is_logged_in();
        $this->load->model('ReportModel');
        $this->load->model('ConsultantModel');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[70]|is_unique[consultant.username]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else {
        $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

        $id = $this->input->post('cr_id');
        $this->ReportModel->addConsultant($data);
        $this->ConsultantModel->deleteConsultant($id);
            echo "<div class=\"container\"><center><div class=\"alert alert-dismissable alert-success\"></div><div class=\"alert alert-dismissable alert-success\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
              <h4>Congratulations!</h4>
              <p>You just successfully accepted the request! You can now inform the Consultant that the Account is ready to use!</p>
            </div></center></div>";
        $this->index();
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
        $this->load->view('home');
    }
}
?>