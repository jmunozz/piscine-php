<?php

class UnholyFactory {
	private $_absorbed = array();

	private function _is_absorbed($type) {
		$is_absorbed = false;
		foreach ($this->_absorbed as $obj) {
			if (!strcmp($type, $obj->type)) {
				$is_absorbed = $obj;
			}
		}
		return ($is_absorbed);
	}
	
	public function absorb($something) {
		if ($something instanceof Fighter) {
			if ($this->_is_absorbed($something->type) === false) {
				array_push($this->_absorbed, clone $something);
				print("(Factory absorbed a fighter of type ".$something->type.")".PHP_EOL);
			}
			else {
				print("(Factory already absorbed a fighter of type ".$something->type.")".PHP_EOL);
			}
		}
		else
			print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
	}

	public function fabricate($requested_fighters) {
		if (($instance = $this->_is_absorbed($requested_fighters)) === false)
			print("(Factory hasn't absorbed any fighter of type ".$requested_fighters.")".PHP_EOL);
		else {
			print("(Factory fabricates a fighter of type ".$requested_fighters.")".PHP_EOL);
			return (clone $instance);
		}
	}
}
