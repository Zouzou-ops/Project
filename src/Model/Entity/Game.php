<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Game extends Entity{
	//On lui indique qu'il peut modifier toutes les colonnes sauf l'id
	protected $_accessible = [
		'*' => true,
		'id' => false
	];
}