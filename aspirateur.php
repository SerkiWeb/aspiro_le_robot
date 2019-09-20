<?php

class Aspirateur {

	private $x;
	private $y;
	private $orientation;

	public function __construct($x, $y, $orientation) {
		$this->x = $x;
		$this->y = $y;
		$this->orientation = $orientation;
	}

	public function getX() {
		return $this->x;
	}

	public function getY() {
		return $this->y;
	}

	public function getOrientation()
	{
		return $this->orientation;
	}

	public function changerOrientation($cote)
	{
		if ($this->orientation == 'N') {
			$this->orientation = ($cote == 'D') ? 'E' : 'O';
		} else if ($this->orientation == 'O') {
			$this->orientation = ($cote == 'D') ? 'N' : 'S';
		} else if ($this->orientation == 'S') {
			$this->orientation = ($cote == 'D') ? 'O' : 'E';
		}else if ($this->orientation == 'E') {
			$this->orientation = ($cote == 'D') ? 'S' : 'N';
		} else {
			throw new Exception("bad orientation " . $this->orientation, 1);
		}
	}

	public function avancer()
	{
		if ($this->orientation == 'N') 
		{
			$this->y++;
		} else if ($this->orientation == 'S') {
			$this->y--;
		} else if ($this->orientation == 'E') {
			$this->x--;
		} else if ($this->orientation == 'O') {
			$this->x++;
		} else {
			throw new Exception("Unknow orientation", 1);
		}
	}
}