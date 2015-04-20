<?php
class Dance extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	
	public function add(){
		$this -> load -> view('template/header');
		$this -> load -> view('dance/add');
		$this -> load -> view('template/footer');
	}
}
