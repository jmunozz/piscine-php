<?php
class NightsWatch {
	private $_watch = array();

	public function recruit($someone) {
		$this->_watch[] = $someone;
	}

	public function fight() {
		foreach ($this->_watch as $fighter) {
			if (in_array("IFighter", class_implements($fighter)))
				$fighter->fight();
		}
	}
}
