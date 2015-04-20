<?php
class CostumePart extends CI_Controller{
	public $tableName;
	
	public function __construct(){
		parent::__construct();
		
		$this -> load -> database();
		
		$this -> tableName = 'costumePart';
	}
	
	public function index(){$this -> view();}
	
	public function fetchAll(){
		$sql = 'SELECT * FROM costumePart';
		$query = $this -> db -> query($sql);
		
		return $query -> result_array();
	}
	
	public function addPart(){
		$data = array();
		$data['type'] = $this -> input -> post('type');
		$data['purchasePrice'] = $this -> input -> post('purchasePrice');
		$data['salePrice'] = $this -> input -> post('salePrice');
		$data['description'] = $this -> input -> post('description');
		
		foreach($data as &$d){
			$d = htmlspecialchars($d);
		}
		
		$this -> db -> insert($this -> tableName, $data);
		
		$this -> view();
		
		//$query = $this -> db -> query();
		//foreach()
	}
	
	public function editPart(){
		$data = array();
		$data['type'] = $this -> input -> post('type');
		$data['purchasePrice'] = $this -> input -> post('purchasePrice');
		$data['salePrice'] = $this -> input -> post('salePrice');
		$data['description'] = $this -> input -> post('description');
		
		foreach($data as &$d){
			$d = htmlspecialchars($d);
		}
		
		$this -> db -> where('costumePartId', $this -> input -> post('costumePartId'));
		$this -> db -> update($this -> tableName, $data);
		
		$this -> view();
		
		//$query = $this -> db -> query();
		//foreach()
	}
	
	public function deletePart($id){
		$this -> db -> delete($this -> tableName, array('costumePartId' => $id));
		$this -> view();
	}
	
	public function add(){
		$this -> load -> view('template/header');
		$this -> load -> view('costume-part/add');
		$this -> load -> view('template/footer');
	}
	
	public function edit($costumePartId){
		$parts = $this -> db -> get_where($this -> tableName, array('costumePartId' => $costumePartId)) -> result_array();
		$content['part'] = $parts[0];
		
		$this -> load -> view('template/header');
		$this -> load -> view('costume-part/edit', $content);
		$this -> load -> view('template/footer');
	}
	
	public function view(){
		$costumeParts = $this -> fetchAll();
		$content['costumeParts'] = $costumeParts;
		
		$this -> load -> view('template/header');
		$this -> load -> view('costume-part/view', $content);
		$this -> load -> view('template/footer');
	}
}
