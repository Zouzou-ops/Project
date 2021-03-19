<?php 

namespace App\Controller;

class AlbumsController extends AppController {
	

	public function index() {
		//$albums = $this->Albums->find('all', ['contain' => ['Users', 'Pictures']]);

		//on utilise le module paginate qui se charge de faire la séparation en pages, en lui passant les parametre que l'on souhaite (limite du nombre d'éléments par page, les contain à importer en plus , etc
		$albums = $this->paginate($this->Albums, [
			'limit' => 9,
        	'order' => [
	            'Albums.name' => 'asc'
	        ],
	        'contain' => ['Users', 'Pictures']
	    ]);

		$this->set(compact('albums'));
	}

	public function random(){
		$a = $this->Albums->find('all', ['order' => 'rand()'])->first();
		return $this->redirect(['action' => 'view', $a->id]);
	}


	public function add(){
		$n = $this->Albums->newEmptyEntity();
		if ($this->request->is('post')) {
			$n = $this->Albums->patchEntity($n, $this->request->getData());

			$n->user_id = $this->request->getAttribute('identity')->id;

			if ($this->Albums->save($n)) {
				$this->Flash->success('Album créé');

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('Impossible de créer l\'album');
		}
		$this->set(compact('n'));
	}


	public function view($id = null){

		if($id == null)
			return $this->redirect(['action' => 'index']);
		
		
		$info = $this->Albums->findById($id)->contain(['Users']);


		//pour pouvoir utiliser le isEmpty() il faut d'abord faire un findById() (et pas un get())
		if($info->isEmpty())
			return $this->redirect(['action' => 'index']);

		/*
		find nous fournissait un groupe d'objet.
		pour accéder au premier élément de ce groupe, on applique la methode first().
		C'est ce premier élément que l'on transmet à la vue
		*/
		$info = $info->first();

		$n = $this->Albums->Pictures->newEmptyEntity();

		//on récupère les pictures liées à cet album, dans le module paginator
		$pictures = $this->paginate(
			$this->Albums->Pictures->findByAlbum_id($id),
			[ 'limit' => 2,  'contain' => ['Users']  ]
		);

		$this->set(compact('info', 'n', 'pictures'));
	}

}