<?php

Class Color {

	public static $verbose = False;
	public $red;
	public $green;
	public $blue;

	function __construct(Array $ar) {
		$error = 0;

		if (array_key_exists('rgb', $ar))
		{
			$this->blue = intval($ar['rgb']) & 255;
			$this->green = (intval($ar['rgb']) >> 8) & 255;
			$this->red = (intval($ar['rgb']) >> 16) & 255;
		}
		else if (array_key_exists('blue', $ar) &&
		array_key_exists('green', $ar) && array_key_exists('red', $ar))
		{
			$this->blue = intval($ar['blue']) & 255;
			$this->green = intval($ar['green']) & 255;
			$this->red = intval($ar['red']) & 255;
		}
		else
			$error = 1;
		if (self::$verbose === True)
		{
			if ($error == 1)
				echo "Le paramètre entré est invalide\n";
			else
				echo "Color( red: ".$this->red.", green: ".$this->green.", blue: ".$this->blue." ) constructed.\n";
		}
	}
	// What happen when $add->blue + $this->blue > 255 ?
	function add(Color $add) {
		$res_blue = $add->blue + $this->blue;
		$res_green = $add->green + $this->green;
		$res_red = $add->red + $this->red;
		$result_ar = array( 'blue' => $res_blue, 'green' => $res_green, 'red' => $res_red );
		return (new Color($result_ar));
	}

	// What happen when $add->blue + $this->blue < 0 ?
	function sub(Color $add) {
		$res_blue = $this->blue - $add->blue;
		$res_green = $this->green - $add->green;
		$res_red = $this->red - $add->red;
		$result_ar = array( 'blue' => $res_blue, 'green' => $res_green, 'red' => $res_red );
		return (new Color($result_ar));
	}
	
	function mult($factor) {
		$res_blue = $this->blue * $factor;
		$res_green = $this->green * $factor;
		$res_red = $this->red * $factor;
		$result_ar = array( 'blue' => $res_blue, 'green' => $res_green, 'red' => $res_red );
		return (new Color($result_ar));
	}

	function __toString() {
		return "Color( red: ".$this->red.", green: ".$this->green.", blue: ".$this->blue." )";
	}

	public static function doc() {
		return file_get_contents('./Color.doc.txt');
	}

	function __destruct() {
		if (self::$verbose === True)
			echo "Color( red: ".$this->red.", green: ".$this->green.", blue: ".$this->blue." ) destructed.\n";
	}
}
?>
