<?php
class Model extends CI_Controller {

    public function index()
    {
        $this->load->database();
        $this->load->model('ModelModel');
        $models=$this->ModelModel->get_last_ten_entries();
        $this->load->view('model/modellist',array('models'=>$models));
    }
    public function add()
    {
        $this->load->database();
        $this->load->model('ModelModel');
        $models=$this->ModelModel->get_last_ten_entries();
        $this->load->view('model/modeladd',array('models'=>$models));
    }
    public function edit($model_id)
    {
        $this->load->database();
        $this->load->model('ModelModel');
        $model=$this->ModelModel->get($model_id);
        $this->load->view('model/modeledit',array('model'=>$model));
    }
    public function insert()
    {

        $this->load->database();
        $this->load->model('ModelModel');
        $this->ModelModel->insert_entry();
                
        $models=$this->ModelModel->get_last_ten_entries();
        $this->load->view('model/modellist',array('models'=>$models));
                           
    }
        public function update()
    {

        $this->load->database();
        $this->load->model('ModelModel');
        $this->ModelModel->update_entry();
                
        $models=$this->ModelModel->get_last_ten_entries();
        $this->load->view('model/modellist',array('models'=>$models));
                           
    }
          public function delete($model_id)
    {

        $this->load->database();
        $this->load->model('ModelModel');
        $this->ModelModel->delete_entry($model_id);
                
        $models=$this->ModelModel->get_last_ten_entries();
        $this->load->view('model/modellist',array('models'=>$models));
                           
    }
}
?>