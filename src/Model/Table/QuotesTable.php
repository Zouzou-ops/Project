<?php //QuotesTable.php


namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class QuotesTable extends Table{
	
	public function initialize (array $config) :void {
	//Lui indique qu'il doit gérer tout seul les colonnes created et modified
	$this->addBehavior('Timestamp');
	}


public function validationDefault(Validator $v) : Validator{
		$v->notEmptyString('content')
			->allowEmptyString('author')
			->maxLength('author', 50);

		return $v;
	}

}