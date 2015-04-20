<?php
class Costume extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	
	public function add(){
		$this -> load -> view('template/header');
		$this -> load -> view('costume/add');
		$this -> load -> view('template/footer');
	}
}
