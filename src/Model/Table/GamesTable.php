<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class GamesTable extends Table{

	public function initialize(array $config) :void{
		$this->addBehavior('Timestamp');

		$this->hasMany('Libraries', ['foreignKey' => 'game_id']);
		$this->hasMany('Comments', ['foreignKey' => 'game_id']);
	}

	public function validationDefault(Validator $v) : Validator{
		$v->maxLength('title', 30)
		  ->allowEmptyString('published');

		return $v;
	}
}