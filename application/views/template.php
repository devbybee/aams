<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('header');
$this->load->view($view, $msg);
$this->load->view('footer');