<?php
require_once '../ex00/Color.class.php';

Class Vertex {

	private			$_x;
	private			$_y;
	private			$_z;
	private			$_w;
	private			$_color;
	static public	$verbose = False;

	function		__construct(Array $ar) {
		$error = 0;

		if (array_key_exists('x', $ar) && array_key_exists('y', $ar) &&
			array_key_exists('z', $ar))
		{
			$this->set_x($ar['x']);
			$this->set_y($ar['y']);
			$this->set_z($ar['z']);
			if(array_key_exists('w', $ar))
				$this->set_w($ar['w']);
			else 
				$this->set_w(1);
			if (array_key_exists('color', $ar) && is_a($ar['color'], 'Color'))
				$this->set_color($ar['color']);
			else
				$this->set_color(new Color(array('blue' => 255, 'green' => 255, 'red'=> 255)));
		}
		else
			$error = 1;
		if (self::$verbose == True)
		{
			if ($error)
				echo "Parameters to __construct are wrong.\n";
			else
				echo "Vertex ( x: ".number_format($this->get_x(), 2).
			", y: ".number_format($this->get_y(), 2).
				", z: ".number_format($this->get_z(), 2).
				", w: ".number_format($this->get_w(), 2).
				", ".$this->get_color()." ) constructed\n";
		}
	}
	
	function		get_x(){
		return $this->_x;
	}
	
	function		get_y(){
		return $this->_y;
	}

	function		get_z(){
		return $this->_z;
	}

	function		get_w(){
		return $this->_w;
	}

	function		get_color(){
		return $this->_color;
	}

	function		set_x($x){
		$this->_x = $x;
	}
	
	function		set_y($y){
		$this->_y = $y;
	}
	
	function		set_z($z){
		$this->_z = $z;
	}
	
	function		set_w($w){
		$this->_w = $w;
	}
	
	function		set_color(Color $color){
		$this->_color = $color;
	}

	function		__toString() {
		return "Vertex ( x: ".number_format($this->get_x(), 2).
				", y: ".number_format($this->get_y(), 2).
				", z: ".number_format($this->get_z(), 2).
				", w: ".number_format($this->get_w(), 2).
				", ".Color." )";

	}

	static function	doc() {
		return file_get_contents("./Vertex.doc.txt");
	}

	function		__destruct() {
		if (self::$verbose == True)
			echo "Vertex ( x: ".number_format($this->get_x(), 2).
				", y: ".number_format($this->get_y(), 2).
				", z: ".number_format($this->get_z(), 2).
				", w: ".number_format($this->get_w(), 2).
				", ".$this->get_color()." ) destructed\n";
	
	}
}
?>
