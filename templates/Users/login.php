<?= $this->Flash->render() ?>
<h1>Connexion à la bibli de jeux</h1>
<?= $this->Form->create() ?>	
<?= $this->Form->control('login', ['label' => 'login :', 'required' => true]) ?>
<?= $this->Form->control('pass', ['label' => 'Mot de passe :', 'required' => true, 'type' => 'password']) ?>
<?= $this->Form->submit('Se connecter'); ?>	
<?= $this->Form->end() ?>