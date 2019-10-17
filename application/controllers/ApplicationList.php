<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApplicationList extends MY_Controller {
    public function index()
	{
		$msg = '';

		if (isset($_GET['m'])) {
			$msg = $_GET['m']; 
		}
		
		$data['view'] = 'add_app';
		$data['msg'] = $msg;

		$this->load->view('template', $data);
	}
	public function tes() {

	}
	public function create() {
		$this->load->model('aams');

		$app_name = $this->input->post('name');
		$id_app = $this->aams->insert_app($app_name);
		
		$app_link = $this->input->post('link');
		$insert = $this->aams->insert_app_link($id_app, $app_link);

		if ($insert) {
			redirect('applications-list/?m=success');
		}
		else {
			redirect('applications-list/?m=error');
		}

	}
}
