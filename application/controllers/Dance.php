<?php
class Dance extends CI_Controller{
	private $tableName;
	private $dancerTableName;
	private $costumeTableName;
	
	public function __construct(){
		parent::__construct();
		
		$this -> load -> database();
		$this -> tableName = 'dance';
		$this -> dancerTableName = 'dancer';
		$this -> costumeTableName = 'costume';
		$this -> costumesDanceTableName = 'Costumes_In_Dance';
		$this -> dancersDanceTableName = 'Dancers_In_Dance';
		$this -> dancerCostumeTableName = 'Dancer_In_Costumes';
	}
	
	public function index(){$this -> view();}
	
	public function fetchAll(){
		$query = $this -> db -> get($this -> tableName);
		
		return $query -> result_array();
	}
	
	public function getDancerOptions(){
		$query = $this -> db -> get($this -> dancerTableName);
		$dancers = $query -> result_array();
		$options = array();
		foreach($dancers as $dancer){
			$options[$dancer['dancerId']] = $dancer['Fname'] . ' ' . $dancer['Lname'];
		}
		return $options;
	}
	
	public function getCostumeOptions(){
		$query = $this -> db -> get($this -> costumeTableName);
		$costumes = $query -> result_array();
		$options = array();
		foreach($costumes as $costume){
			$options[$costume['costumeId']] = $costume['name'];
		}
		return $options;
	}
	
	public function ajaxAddNewDancer($i){
		$content['i'] = $i;
		$content['dancerOptions'] = $this -> getDancerOptions();
		$content['costumeOptions'] = $this -> getCostumeOptions();
		$this -> load -> view('dance/ajax-add-dancer', $content);
	}
	
	public function addDance(){
		$data = array();
		$data['name'] = $this -> input -> post('danceName');
		$data['date'] = $this -> input -> post('danceDate');
		$data['type'] = $this -> input -> post('danceType');
		$data['level'] = $this -> input -> post('level');
		
		foreach($data as &$d){
			$d = htmlspecialchars($d);
		}
		
		$this -> db -> insert($this -> tableName, $data);
		$danceId = $this -> db -> insert_id();
		
		$danceCostumeInserted = array();
		$numDancers = (int) $this -> input -> post('numDancers');
		for($i = 1; $i <= $numDancers; $i++){
			$dancerId = $this -> input -> post('dancer_' . $i);
			$costumeId = $this -> input -> post('costume_' . $i);
			
			// Prevent duplicates
			if(!in_array($costumeId, $danceCostumeInserted)){
				$this -> db -> insert($this -> costumesDanceTableName, array(
					'danceId' => $danceId,
					'costumeId' => $costumeId
				));
				$danceCostumeInserted[] = $costumeId;
			}
			
			$this -> db -> insert($this -> dancersDanceTableName, array(
				'danceId' => $danceId,
				'dancerId' => $dancerId
			));
			$this -> db -> insert($this -> dancerCostumeTableName, array(
				'dancerId' => $dancerId,
				'costumeId' => $costumeId
			));
			
			$dancers[$i] = array();
			$dancers[$i]['dancerId'] = $this -> input -> post('dancer_' . $i);
			$dancers[$i]['costumeId'] = $this -> input -> post('costume_' . $i);
		}
		
		redirect('dance/view');
	}
	
	public function add(){
		$content['dancerOptions'] = $this -> getDancerOptions();
		$content['costumeOptions'] = $this -> getCostumeOptions();
		
		$this -> load -> view('template/header');
		$this -> load -> view('dance/add', $content);
		$this -> load -> view('template/footer');
	}
	
	public function view(){
		$content['dances'] = $this -> fetchAll();
		
		$this -> load -> view('template/header');
		$this -> load -> view('dance/view', $content);
		$this -> load -> view('template/footer');
	}
}
