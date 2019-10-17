<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		if ( !$this->session->has_userdata('is_login')) {
			redirect('login');
		}
	}
	public function hit_curl($url_hit = '') {
        $url = $url_hit;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
		curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_TIMEOUT,10);
		$output = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		return  $httpcode;
	}
	
	public function get_status_curl($code = '') {
		if ($code == 200) {
			return 1;
		}
		return 0;
	}
 }