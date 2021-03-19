<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
	
class GamesTable extends Table{

	public function initialize(array $config): void{
		parent::initialize($config);
		$this->addBehavior('Timestamp');
		
		$this->belongsTo('librairies', ['foreignKey' => 'user_id', 'joinType' => 'INNER']);

		$this->hasMany('librairies', ['foreignKey' => 'game_id']);
	}

	public function validationDefault(Validator $v): Validator{
		$v
			->maxLength('title', 150)
			->notEmptyString('title');

		return $v;
	}
}
