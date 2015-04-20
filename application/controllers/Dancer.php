<?php
class Dancer extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	
	public function add(){
		$this -> load -> view('template/header');
		$this -> load -> view('dancer/add');
		$this -> load -> view('template/footer');
	}
	
	public function view(){
		$this -> load -> view('template/header');
		$this -> load -> view('dancer/add');
		$this -> load -> view('template/footer');
	}
}
