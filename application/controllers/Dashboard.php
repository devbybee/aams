<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('aams');
	}
	
	public function index() {
		// $limit = $this->aams->get_total();
		// $data['monit'] = $this->aams->get_dashboard($limit);
		$data['msg'] = '';
		$data['view'] = 'dashboard';
		$this->load->view('template', $data);
	}

	public function reload_data() {
		$limit = $this->aams->get_total();
		// echo $limit;
		$data_dash = $this->aams->get_dashboard($limit);
		
		usort($data_dash, function($a, $b) {
   		    return $a['name'] <=> $b['name'];
		});	
		$data['monit'] = $data_dash;	
		return $this->load->view('data_dashboard', $data);
	}

	public function hit_app()
	{
		$data_link = $this->aams->get_links();

		$result = array();
		foreach($data_link as $row) {
			/**
			 * get status
			 * 1 = ok
			 * 0 = not ok
			 */
			$status = $this->get_status_curl($this->hit_curl($row['link']));

			$result[] = array(
				'app_link_id' => $row['id'],
				'status' => $status,
				'hitted_at' => date('Y-m-d H:i:s')
			);
		}
		// print_r($result); exit();
		$this->aams->insert_transaction($result);
	}
}
