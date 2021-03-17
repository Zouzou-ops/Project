<?php //entity/Quote.php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Quote extends Entity{

//on lui indique qu'il peut modifier toutes les colonnes sauf l'id
protected $_accessible = [
	'*' => true,
	'id' => false
	];
	
}