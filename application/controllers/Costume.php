<?php
class Costume extends CI_Controller{
	private $tableName;
	private $costumePartsTableName;
	private $costumeAndPartsTableName;
	
	public function __construct(){
		parent::__construct();
		
		$this -> load -> database();
		$this -> tableName = 'costume';
		$this -> costumePartsTableName = 'costumePart';
		$this -> costumeAndPartsTableName = 'Costume_And_Parts';
	}
	
	public function index(){$this->view();}
	
	public function fetchAll(){
		$query = $this -> db -> get($this -> tableName);
		
		return $query -> result_array();
	}
	
	public function addCostume(){
		$data = array();
		$data['name'] = htmlspecialchars($this -> input -> post('costumeName'));
		
		$this -> db -> insert($this -> tableName, $data);
		$costumeId = $this -> db -> insert_id();
		foreach($this -> input -> post('costumePartId') as $partId){
			$data = array();
			$data['costumeId'] = $costumeId;
			$data['costumePartId'] = $partId;
			$this -> db -> insert($this -> costumeAndPartsTableName, $data);
		}
		
		redirect('costume/view');
	}
	
	public function editCostume(){
		$data = array();
		$data['name'] = htmlspecialchars($this -> input -> post('costumeName'));
		
		$this -> db -> where('costumeId', $this -> input -> post('costumeId'));
		$this -> db -> update($this -> tableName, $data);
		$costumeId = $this -> input -> post('costumeId');
		// Remove all previous associations, then just add new ones
		$this -> db -> delete($this -> costumeAndPartsTableName, array('costumeId' => $costumeId));
		
		foreach($this -> input -> post('costumePartId') as $partId){
			$data = array();
			$data['costumeId'] = $costumeId;
			$data['costumePartId'] = $partId;
			$this -> db -> insert($this -> costumeAndPartsTableName, $data);
		}
		
		redirect('costume/view');
		
	}
	
	public function deleteCostume($id){
		$this -> db -> delete($this -> tableName, array('costumeId' => $id));
		$this -> db -> delete($this -> costumeAndPartsTableName, array('costumeId' => $id));
		
		redirect('costume/view');
	}
	
	public function add(){
		$query = $this -> db -> get($this -> costumePartsTableName);
		$costumeParts = $query -> result_array();
		
		$options = array();
		foreach($costumeParts as $part){
			$options[$part['costumePartId']] = $part['type'];
		}
		$content['options'] = $options;
		
		$this -> load -> view('template/header');
		$this -> load -> view('costume/add', $content);
		$this -> load -> view('template/footer');
	}
	
	public function edit($costumeId){
		$costumes = $this -> db -> get_where($this -> tableName, array('costumeId' => $costumeId)) -> result_array();
		$costume = $costumes[0];
		$content['costume'] = $costume;
		
		$rel = $this -> db -> get_where($this -> costumeAndPartsTableName, array('costumeId' => $costume['costumeId']));
		$rels = $rel -> result_array();
		$associatedParts = array();
		foreach($rels as $r){
			$associatedParts[] = $r['costumePartId'];
		}
		$content['associatedParts'] = $associatedParts;
		
		$query = $this -> db -> get($this -> costumePartsTableName);
		$costumeParts = $query -> result_array();
		
		$options = array();
		foreach($costumeParts as $part){
			$options[$part['costumePartId']] = $part['type'];
		}
		$content['options'] = $options;
		
		$this -> load -> view('template/header');
		$this -> load -> view('costume/edit', $content);
		$this -> load -> view('template/footer');
	}
	
	public function view(){
		$costumes = $this -> fetchAll();
		foreach($costumes as &$costume){
			$costume['parts'] = '';
			$relQuery = $this -> db -> get_where($this -> costumeAndPartsTableName, array('costumeId' => $costume['costumeId']));
			$rels = $relQuery -> result_array();
			foreach($rels as $rel){
				$partsQuery = $this -> db -> get_where($this -> costumePartsTableName, array('costumePartId' => $rel['costumePartId']));
				$parts = $partsQuery -> result_array();
				foreach($parts as $part){
					$costume['parts'] .= $part['type'] . ', ';
				}
			}
			if(empty($costume['parts'])){
				$costume['parts'] = 'none';
			}else{
				$costume['parts'] = rtrim($costume['parts'], ', ');
			}
		}
		$content['costumes'] = $costumes;
		
		$this -> load -> view('template/header');
		$this -> load -> view('costume/view', $content);
		$this -> load -> view('template/footer');
	}
}
