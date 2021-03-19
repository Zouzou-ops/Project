<h1>Créer un compte</h1>

<?= $this->Form->create($n) ?>
	<?= $this->Form->control('login', ['label' => 'Votre pseudo']) ?>
	<?= $this->Form->control('pass', ['label' => 'Mot de passe', 'type' => 'password']) ?>
	<?= $this->Form->hidden('level', ['value' => 'user']) ?>
	<?= $this->Form->hidden('avatar', ['value' => 'default.jpg']) ?>

	<?= $this->Form->button('Créer') ?>
<?= $this->Form->end() ?>

