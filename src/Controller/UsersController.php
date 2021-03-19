<?php //UsersController.php

namespace App\Controller;

class UsersController extends AppController {

    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);
        // pour ce controller, l'action login est autorisée meme si on est pas connecté
        $this->Authentication->addUnauthenticatedActions(['login', 'new']);
    }
    // Notre page d'accueil
    public function index(){

    }
    // fonction pour la créeation d'un nouveau compte
    public function new(){
        $n = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {

            $n = $this->Users->patchEntity($n, $this->request->getData());
            
            if ($this->Users->save($n)) {
                $this->Flash->success('Bienvenue');
                return $this->redirect(['controller' => 'Games', 'action' => 'index']);
            }
            $this->Flash->error('Impossible de créer le compte');
        }
        $this->set(compact('n'));
    }
    // fonction pour la connexion d'utilisateur
    public function login() {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Games',
                'action' => 'index'
            ]);
            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Votre identifiant ou votre mot de passe est incorrect.');
        }
    }
    // fonction pour la déconnexion d'un utilisateur
    public function logout(){
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            $this->Flash->success('A bientôt');
        }
        return $this->redirect(['controller' => 'Games', 'action' => 'index']);
    }
    // fonction pour voir les jeux d'un utilisateur
    public function view($id = null){
        if($id == null)
            return $this->redirect(['controller' => 'Games','action' => 'index']);

        $info = $this->Users->findById($id)->contain(['Librairies']);

        if($info->isEmpty())
            return $this->redirect(['controller' => 'Games','action' => 'index']);

        $info = $info->first();

        //on récupère les jeux liées à cet utilisatuer, dans le module paginator
        $games = $this->paginate(
            $this->Users->Libraries->findByUser_id($id),
            [ 'limit' => 5, 'contain' => 'Games'  ]
        );
        $this->set(compact('info', 'games'));
    }
}