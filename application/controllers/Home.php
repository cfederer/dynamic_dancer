<?php
class Home extends CI_Controller{
	private $dancerTableName;
	private $danceTableName;
	private $costumesDanceTableName;
	private $costumePartsTableName;
	private $dancersDanceTableName;
	private $dancerCostumesTableName;
	
	public function __construct(){
		parent::__construct();
		
		$this -> load -> database();
		$this -> dancerTableName = 'dancer';
		$this -> danceTableName = 'dance';
		$this -> costumesDanceTableName = 'Costumes_In_Dance';
		$this -> costumePartsTableName = 'Costume_And_Parts';
		$this -> dancersDanceTableName = 'Dancers_In_Dance';
		$this -> dancerCostumesTableName = 'Dancer_In_Costumes';
	}
	
	public function index(){$this->view();}
	
	public function getDancerOptions(){
		$query = $this -> db -> get($this -> dancerTableName);
		$dancers = $query -> result_array();
		$options = array();
		foreach($dancers as $dancer){
			$options[$dancer['dancerId']] = $dancer['Fname'] . ' ' . $dancer['Lname'];
		}
		return $options;
	}
	
	public function getDanceOptions(){
		$query = $this -> db -> get($this -> danceTableName);
		$dances = $query -> result_array();
		$options = array();
		foreach($dances as $dance){
			$options[$dance['danceId']] = $dance['name'];
		}
		return $options;
	}
	
	public function viewDancer(){
		$dancerId = (int) $this -> input -> post('dancer');
		$query = $this -> db -> get_where($this -> dancerTableName, array('dancerId' => $dancerId));
		$dancer = $query -> result_array();
		
		$dances = array();
		$query = $this -> db -> get_where($this -> dancersDanceTableName, array('dancerId' => $dancerId));
		$danceIds = $query -> result_array();
		foreach($danceIds as $danceId){
			$query = $this -> db -> get_where($this -> danceTableName, array('danceId' => $danceId['danceId']));
			$thisDance = $query -> result_array();
			$dance = array();
			$dance['name'] = $thisDance[0]['name'];
			/*$query = $this -> db -> get_where($this -> costumesDanceTableName, array('danceId' => $danceId['danceId']));
			$costumesInDance = $query -> result_array();
			$query = $this -> db -> get_where($this -> dancerCostumesTableName, array('dancerId' => $dancerId));
			$dancerInCostumes = $query -> result_array();
			var_dump($costumesInDance);var_dump($dancerInCostumes);exit;
			$dance['costume'] = */
			$dances[] = $dance;
		}
		
		$content['dancer'] = $dancer[0];
		$content['dances'] = $dances;
		$this -> load -> view('template/header');
		$this -> load -> view('home/view-dancer', $content);
		$this -> load -> view('template/footer');
	}
	
	public function view(){
		$content['dancers'] = $this -> getDancerOptions();
		$content['dances'] = $this -> getDanceOptions();
		$this -> load -> view('template/header');
		$this -> load -> view('home/view', $content);
		$this -> load -> view('template/footer');
	}
}
