<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$data=array(
			'name'=>'dipesh');
		$this->load->_render_page('test');
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */