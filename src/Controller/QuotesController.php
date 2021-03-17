<?php //controller/quotescontroller.php

namespace App\Controller;

use App\Controller\AppController;

class QuotesController extends AppController{

	public function initialize()	: void{
	parent::initialize();
}

public function index(){
		$tQuotes = $this->Quotes->find();

		$this->set(compact('tQuotes'));	
}

public function hello(){
}

public function salut(){
$name = 'toi';
//on transmet la variable a la vue
$this->set(compact('name'));
}

public function bye($t){
	$this->set(compact('t'));
}

public function view($id){
	$quote = $this->Quotes->get($id);

	$this->set(compact('quote'));
}

public function add(){
	//on crée un objet Quote vide pour notre form
	$new = $this->Quotes->newEmptyEntity();

	//si on a recu un formulaire
	if($this->request->is('post')){  //AAAAA

		//on recup les donnees fournies dans le formulaire et on les place dans l'objet $new qui est vide
		$new = $this->Quotes->patchEntity($new, 
			$this->request->getData() );

		if($this->Quotes->Save($new)){ //BBBB
			$this->Flash->success('Ok, c\'est enregistré');

			//on redirigre vers la liste
			return $this->redirect(['action' =>'index']);
			}//BBB

			//si ca a rat", on fais le message d'erreur
			$this->Flash->error('planté, essaie encore');	



		} //fin reception form /AAAA
		$this->set(compact('new'));
	} //fin de la fct add

	public function delete($id){


		//on bloque l'éxecution si on n'est pas en post ou delete
		//cela bloque les tricheries en changeant l'adresse
		$this->request->allowMethod(['post', 'delete']);

		//on cree un objet Quote initatliser avec l'id
		$quote = $this->Quotes->get($id);

		if($this->Quotes->delete($quote)){
			$this->Flash->success('Effacé !');
		}

		return $this->redirect(['action' => 'index']);
	}

	public function edit($id){

		$quote = $this->Quotes->get($id);

		//si on est en post ou en put
		if($this->request->is(['post', 'put'])){
			$this->Quotes->patchEntity($quote, $this->request->getData());

			if($this->Quotes->save($quote)){
				$this->Flash->success('c\'est modifié');
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error('Modif plantée');		
		}
		$this->set(compact('quote'));
	}
}	

