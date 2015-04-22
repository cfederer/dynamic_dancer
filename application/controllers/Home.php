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
		$this -> costumePartTableName = 'costumePart';
		$this -> costumesDanceTableName = 'Costumes_In_Dance';
		$this -> costumePartsTableName = 'Costume_And_Parts';
		$this -> costumeTableName = 'costume';
		$this -> dancersDanceTableName = 'Dancers_In_Dance';
		$this -> dancerCostumesTableName = 'Dancer_In_Costumes';
		$this -> dancerDanceCostumeTableName = 'Dancer_Dance_Costumes';
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
		$query = $this -> db -> get_where($this -> dancerDanceCostumeTableName, array('dancerId' => $dancerId));
		$dancesAndCostumes = $query -> result_array();
		foreach($dancesAndCostumes as $rel){
			$d = array();
			$query = $this -> db -> get_where($this -> danceTableName, array('danceId' => $rel['danceId']));
			$dance = $query -> result_array();
			$query = $this -> db -> get_where($this -> costumeTableName, array('costumeId' => $rel['costumeId']));
			$costume = $query -> result_array();
			$query = $this -> db -> get_where($this -> costumePartsTableName, array('costumeId' => $rel['costumeId']));
			$costumeParts = $query -> result_array();
			$parts = array();
			foreach($costumeParts as $part){
				$query = $this -> db -> get_where($this -> costumePartTableName, array('costumePartId' => $part['costumePartId']));
				$costumePart = $query -> result_array();
				$parts[] = $costumePart[0]['type'];
			}
			
			$d['dance'] = $dance[0]['name'];
			$d['costume'] = $costume[0]['name'];
			$d['costumeParts'] = $parts;
			$dances[] = $d;
		}
		
		$content['dancer'] = $dancer[0];
		$content['dances'] = $dances;
		$this -> load -> view('template/header');
		$this -> load -> view('home/view-dancer', $content);
		$this -> load -> view('template/footer');
	}

	public function viewDance(){
		$danceId = (int) $this -> input -> post('dance');
		$query = $this -> db -> get_where($this -> danceTableName, array('danceId' => $danceId));
		$dance = $query -> result_array();
		
		$dancers = array();
		$query = $this -> db -> get_where($this -> dancerDanceCostumeTableName, array('danceId' => $danceId));
		$dancersAndCostumes = $query -> result_array();
		foreach($dancersAndCostumes as $rel){
			$d = array();
			$query = $this -> db -> get_where($this -> dancerTableName, array('dancerId' => $rel['dancerId']));
			$dancer = $query -> result_array();
			$query = $this -> db -> get_where($this -> costumeTableName, array('costumeId' => $rel['costumeId']));
			$costume = $query -> result_array();
			
			$d['dancer'] = $dancer[0]['Fname'] . ' ' . $dancer[0]['Lname'];
			$d['costume'] = $costume[0]['name'];
			$dancers[] = $d;
		}
		
		$content['dance'] = $dance[0];
		$content['dancers'] = $dancers;
		$this -> load -> view('template/header');
		$this -> load -> view('home/view-dance', $content);
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
