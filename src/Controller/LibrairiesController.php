<?php //GamesController.php

namespace App\Controller;

class LibrariesController extends AppController {
	public function new($game_id) {

		$l = $this->Librairies->newEmptyEntity();
			if ($this->request->is('post')) {

				$l->user_id = $this->request->getAttribute('identity')->id;
				$l->game_id = $game_id;

				$l = $this->Librairies->patchEntity($l, $this->request->getData());
							
					if($this->Librairies->save($l)){
						//on deplace le fichier vers le dossier data avec le nouveau nom
						//on flash success
						$this->Flash->success('Ajouté dans votre bibliothèque');
						return $this->redirect(['controller' => 'Games', 'action' => 'index']);
				}
				else{
					$this->Flash->error('Impossible d\'ajouté le jeu à votre bibliothèque');
				}
			
		}
	}
}