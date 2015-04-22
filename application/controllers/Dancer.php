<?php
class Dancer extends CI_Controller{
	private $tableName;
	
	public function __construct(){
		parent::__construct();
		
		$this -> load -> database();
		$this -> tableName = 'dancer';
	}
	
	public function index(){$this -> view();}
	
	public function fetchAll(){
		$query = $this -> db -> get($this -> tableName);
		
		return $query -> result_array();
	}
	
	public function addDancer(){
		$data = array();
		$data['Fname'] = $this -> input -> post('fname');
		$data['Lname'] = $this -> input -> post('lname');
		$data['shirtSize'] = $this -> input -> post('shirtSize');
		$data['shoeSize'] = $this -> input -> post('shoeSize');
		$data['pantSize'] = $this -> input -> post('pantSize');
		$data['braSize'] = $this -> input -> post('braSize');
		$data['bust'] = $this -> input -> post('bustMeasurement');
		$data['hip'] = $this -> input -> post('hipMeasurement');
		$data['waist'] = $this -> input -> post('waistMeasurement');
		$data['chest'] = $this -> input -> post('chestMeasurement');
		
		foreach($data as &$d){
			$d = htmlspecialchars($d);
		}
		
		$this -> db -> insert($this -> tableName, $data);
		redirect('dancer/view');
	}
	
	public function editDancer(){
		$data = array();
		$data['Fname'] = $this -> input -> post('fname');
		$data['Lname'] = $this -> input -> post('lname');
		$data['shirtSize'] = $this -> input -> post('shirtSize');
		$data['shoeSize'] = $this -> input -> post('shoeSize');
		$data['pantSize'] = $this -> input -> post('pantSize');
		$data['braSize'] = $this -> input -> post('braSize');
		$data['bust'] = $this -> input -> post('bustMeasurement');
		$data['hip'] = $this -> input -> post('hipMeasurement');
		$data['waist'] = $this -> input -> post('waistMeasurement');
		$data['chest'] = $this -> input -> post('chestMeasurement');
		
		foreach($data as &$d){
			$d = htmlspecialchars($d);
		}
		
		$this -> db -> where('dancerId', $this -> input -> post('dancerId'));
		$this -> db -> update($this -> tableName, $data);
		redirect('dancer/view');
	}
	
	public function deleteDancer($id){
		$this -> db -> delete($this -> tableName, array('dancerId' => $id));
		redirect('dancer/view');
	}
	
	public function add(){
		$this -> load -> view('template/header');
		$this -> load -> view('dancer/add');
		$this -> load -> view('template/footer');
	}
	
	public function edit($dancerId){
		$dancers = $this -> db -> get_where($this -> tableName, array('dancerId' => $dancerId)) -> result_array();
		$content['dancer'] = $dancers[0];
		
		$this -> load -> view('template/header');
		$this -> load -> view('dancer/edit', $content);
		$this -> load -> view('template/footer');
	}
	
	public function view(){
		$dancers = $this -> fetchAll();
		$content['dancers'] = $dancers;
		
		$this -> load -> view('template/header');
		$this -> load -> view('dancer/view', $content);
		$this -> load -> view('template/footer');
	}
}
