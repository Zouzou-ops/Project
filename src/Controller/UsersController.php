<?php 

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

        $info = $this->Users->findById($id)->contain(['Libraries']);

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

    public function edit($id = null){
        if ($id == null)
            return $this->redirect(['controller' => 'Games', 'action' => 'index']);
        $u = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) { 
            $u->login = $this->request->getData('login');

            if(empty($this->request->getData('avatar')->getClientFilename()) ||
                !in_array($this->request->getData('avatar')->getClientMediaType(), ['image/png', 'image/jpg', 'image/jpeg', 'image/gif'])
            ){
                //flash error
               $this->Flash->error('L\'image doit être au format png, jpeg ou jpg');
            }else{ //sinon
                //on recup l'extension
                $ext = pathinfo($this->request->getData('avatar')->getClientFilename(), PATHINFO_EXTENSION);
                //on cree un nouveau nom
                $newName = 'pic-'.rand(0, 999).'-'.time().'.'.$ext;
                //on place le nouveau nom dans l'entité 
                $u->avatar = $newName;               

                //on tente la sauvegarde
                if($this->Users->save($u)){
                    //on deplace le fichier vers le dossier data avec le nouveau nom
                    $this->request->getData('avatar')->moveTo(WWW_ROOT.'img/data/avatar/'.$newName);
                    //on flash success
                    $this->Flash->success('Ok');
                }else{ //sinon 
                    //error
                    $this->Flash->error('Planté, try again');
                }//fin si sauvegarde
            }//fin si format
              return $this->redirect(['controller' => 'Users', 'action' => 'view', $u->id]);
            
        
        }//fin si mode
        $this->set(compact('u'));   
        //redirection vers la page de l'album
}
}