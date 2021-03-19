<?php 

namespace App\Controller;

class CommentsController extends AppController {


	public function new(){

		if ($this->request->is('post')) {
			$n = $this->Comments->newEmptyEntity();
			$n = $this->Comments->patchEntity($n, $this->request->getData());

			$n->user_id = $this->request->getAttribute('identity')->id;
			
			if ($this->Comments->save($n)) {
				$this->Flash->success('Sauvegardé');
			}else

				$this->Flash->error('Sauvegarde impossible');

			return $this->redirect(['controller' => 'Games', 'action' => 'view', $n->game_id]);
		}
	}

}