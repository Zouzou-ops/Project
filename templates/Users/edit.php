<h1>Modifier mon compte</h1>

<?= $this->Form->create($user, ['enctypage' => 'multipart/form-data']) ?>
	
	<?=$this->form->control('login', [
		'label' => 'Nom d\'utilisateur',
		'error' => ' Veuillez renseigner le champ'
	]) ?>

	<?= $this->Form->control('avatar', [
		'label' => 'Modifier votre avatar',
			'type' =>'file'
			]) 	?>

			<?= $this->Form->button('Modifier mes infos') ?>
			<?= $this Form->end () ?>