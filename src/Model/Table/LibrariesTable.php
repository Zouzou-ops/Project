<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
	
class LibrariesTable extends Table{

	public function initialize(array $config): void{
		parent::initialize($config);
		$this->addBehavior('Timestamp');

		$this->belongsTo('Users', ['foreignKey' => 'user_id', 'joinType' => 'INNER']);

		$this->belongsTo('Games', ['foreignKey' => 'game_id', 'joinType' => 'INNER']);
	}

	public function validationDefault(Validator $v): Validator{

		$v->notEmptyString('user_id')
		  ->notEmptyString('game_id');

		return $v;
	}
}