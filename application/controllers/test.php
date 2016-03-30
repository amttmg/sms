<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('m_class','class');
	}

	public function index()
	{
		$data=array(
			'name'=>'dipesh');
		$this->load->view('test');
	}

	public function save()
	{
		$this->load->library('form_validation');
		$master['status'] = True;
        $data = array();
        $master = array();
        $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[5]|max_length[12]');
		if ($this->form_validation->run() == True) 
		{
			$this->class->insert($this->insert_data());
			$master['status'] = True;
			$master['message']="successfully saved data";
		} 
		else 
		{
			$master['status'] = false;
            foreach ($_POST as $key => $value) 
            {
                if (form_error($key) != '') 
                {
                    $data['error_string'] = $key;
                    $data['input_error'] = form_error($key);
                    array_push($master, $data);
                }
            }
		}
		echo(json_encode($master));
	}

	public function classlist()
	{
		print_r($this->class->get_all(array('class_name')));
	}

	public function insert_data()
	{
		$data=array(
			'class_name'=>$this->input->post('name'),
			'status'=>1
			);
		return $data;
	}
	public function update_data()
	{
		$data=array(
			'class_name'=>$this->input->post('name'),
			'status'=>1
			);
		return $data;
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */