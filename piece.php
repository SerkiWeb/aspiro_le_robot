<?php

require_once('aspirateur.php');

class Piece {

	private $longueur;
	private $largeur;
	private $piece;
	private $aspirateurs;

	function __construct($longueur, $largeur) {
		$this->aspirateur = array();
		$this->longueur = $longueur;
		$this->largeur  = $largeur;
		$this->piece = array_fill(0, $longueur, array_fill(0, $largeur, 0));
	}

	public function ajouterAspirateur($aspiro)
	{
		$this->aspirateurs[] = $aspiro;
	}

	public function getPiece()
	{
		return $this->piece;
	}

	public function afficherPiece()
	{
		foreach ($this->aspirateurs as $aspirateur) {
			$this->piece[$aspirateur->getX()][$aspirateur->getY()] = 'x';
		}
		for ($i=0; $i<10; $i++) {
			echo('<br>');
			for ($j=0; $j<10 ; $j++) {
				echo($this->piece[$i][$j]);
			}
		}
	}
}