<?php //QuotesTable.php


namespace App\Model\Table;

use Cake\ORM\Table;

class QuotesTable extends Table{
	
	public function initialize (array $config) :void {
	//Lui indique qu'il doit gérer tout seul les colonnes created et modified
	$this->addBehavior('Timestamp');
	}
}



