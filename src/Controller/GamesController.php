<?php //GamesController.php

namespace App\Controller;

use App\Controller\AppController;

class GamesController extends AppController{
	public function initialize() : void{
		parent::initialize();
	}
	public function index() {

		$games = $this->paginate($this->Games, [
			'limit' => 5,
        	'order' => [
	            'Games.title' => 'asc'
	        ]]);

		$this->set(compact('games'));
	}
	public function new(){

		if($this->request->getAttribute('identity')->level == 'user')
			return $this->redirect(['controller' => 'Games', 'action' => 'index']);
		else{
			$n = $this->Games->newEmptyEntity();
		if ($this->request->is('post')) {
			$n->title = $this->request->getData('title');
			$n->style = $this->request->getData('style');
			$n->publisher = $this->request->getData('publisher');
			if(
				empty($this->request->getData('poster')->getClientFilename()) ||
				!in_array($this->request->getData('poster')->getClientMediaType(), ['image/png', 'image/jpg', 'image/jpeg'])
			){
				//flash error
				$this->Flash->error('L\'image doit être au format png ou jpg');

			}else{ //sinon
				//on recup l'extension
				$ext = pathinfo($this->request->getData('poster')->getClientFilename(), PATHINFO_EXTENSION);
				//on cree un nouveau nom
				$newName = 'pic-'.rand(0, 999).'-'.time().'.'.$ext;
				//on place le nouveau nom dans l'entité 
				$n->poster = $newName;

				//on tente la sauvegarde
				if($this->Games->save($n)){
					//on deplace le fichier vers le dossier data avec le nouveau nom
					$this->request->getData('poster')->moveTo(WWW_ROOT.'img/data/poster/'.$newName);
					//on flash success
					$this->Flash->success('Ok');
					return $this->redirect(['controller' => 'Games', 'action' => 'index']);
				}else{ //sinon 
					//error
					$this->Flash->error('Planté, try again');
				}//fin si sauvegarde
			}//fin si format
		}
		$this->set(compact('n'));
		}	
	}
	public function view($game_id = null){
		if($game_id == null)
			return $this->redirect(['controller' => 'Games','action' => 'index']);

		$game = $this->Games->findById($game_id);

		if($game->isEmpty())
			return $this->redirect(['controller' => 'Games','action' => 'index']);

		$game = $game->first();

		$user = $this->paginate(
			$this->Games->Librairies->findByGame_id($game_id),
			[ 'limit' => 5, 'contain' => 'Users']
		);
		$this->set(compact('game', 'user'));
	}
	
}