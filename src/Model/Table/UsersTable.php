<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
	
class  UsersTable extends Table{

	public function initialize(array $config): void{
		parent::initialize($config);

		$this->addBehavior('Timestamp');

		$this->hasMany('Librairies', ['foreignKey' => 'user_id']);
		$this->hasMany('Comments', ['foreignKey' => 'game_id']);
	}

	public function validationDefault(Validator $v): Validator{
		$v->maxLength('login', 30);

		return $v;
	}
}
