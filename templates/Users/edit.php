<h1>Modifier mon compte</h1>

<?= $this->Form->create($u, ['enctype' => 'multipart/form-data']) ?>
	
	<?=$this->form->control('login', [
		'label' => 'Nom d\'utilisateur',
		'error' => ' Veuillez renseigner le champ', 
		'value' => $u->login
	]) ?>

	<?= $this->Form->control('avatar', [
		'label' => 'Modifier votre avatar',
			'type' =>'file',
			'value' => $u->avatar
			]) 	?>

			<?= $this->Form->button('Modifier mes infos') ?>
			<?= $this->Form->end () ?>

			