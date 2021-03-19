<?php 

namespace App\Controller;

class LibrariesController extends AppController {
	public function new($game_id) {

		$l = $this->Libraries->newEmptyEntity();
			if ($this->request->is('post')) {

				$l->user_id = $this->request->getAttribute('identity')->id;
				$l->game_id = $game_id;

				//$l = $this->Libraries->patchEntity($l, $this->request->getData());
							
					if($this->Libraries->save($l)){
						//on deplace le fichier vers le dossier data avec le nouveau nom
						//on flash success
						$this->Flash->success('Ajouter dans votre bibliothèque');
						return $this->redirect(['controller' => 'Games', 'action' => 'index']);
				}
				else{
					$this->Flash->error('Impossible d\'ajouter le jeu à votre bibliothèque');
				}
			
		}
	}
}