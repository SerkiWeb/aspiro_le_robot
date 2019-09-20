<?php

require_once('piece.php');

class IAspiro {

	private $piece;
	private $longueur;
	private $largeur;
	private $aspiX;
	private $aspiY;
	private $aspiO;
	private $instructions;

	public function __construct($file) {
		$this->lireInstructions($file);
		$this->piece = new Piece($this->longueur, $this->largeur);
		$this->aspiro = new Aspirateur(
			$this->aspiX,
			$this->aspiY,
			$this->aspiO
		);
		$this->piece->ajouterAspirateur($this->aspiro);
	}

	public function afficherPiece()
	{
		$this->piece->afficherPiece();
	}

	public function lireInstructions($file) {
		$cpt = 1;
		$fp = fopen($file, 'r');
		while (!feof($fp)) {
			$line = fgets($fp);
			$chaine = explode(' ', $line);
			if ($cpt == 1) {
				$this->longueur = (int)$chaine[0];
				$this->largeur = (int)$chaine[1];
			} else if ($cpt == 2) {
				print_r($chaine);
				$this->aspiX = (int) $chaine[0];
				$this->aspiY = (int) $chaine[1];
				$this->aspiO = trim($chaine[2]);
			} else if ($cpt == 3) {
				$this->instructions = $chaine[0];
				var_dump($this->instructions);
			}
			$cpt++;
		}
		fclose($fp);
	}

	public function execInstructions() 
	{
		$this->afficherPiece();
		echo($this->aspiro->getOrientation());
		for ($i=0; $i < strlen($this->instructions); $i++) { 
			//echo($this->instructions[$i]);
			if ($this->instructions[$i] == 'A') {
				$this->aspiro->avancer();
			} else {
				$this->aspiro->changerOrientation($this->instructions[$i]);
			}
			$this->afficherPiece();
			echo($this->aspiro->getOrientation());
		}
		echo("X : " . $this->aspiro->getX());
		echo("Y : " . $this->aspiro->getY());
	}
}

$appli = new IAspiro('inst.txt');
echo('<br>');
$appli->execInstructions();
echo('<br>');

