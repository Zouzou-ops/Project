<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Games extends Entity{
	//On lui indique qu'il peut modifier toutes les colonnes sauf l'id
	protected $_accessible = [
		'*' => true,
		'id' => false
	];
}