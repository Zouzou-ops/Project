<h1>Nouveau jeu</h1>

<?= $this->Form->create($n, ['enctype' => 'multipart/form-data']) ?>
	<?= $this->Form->control('title', ['label' => 'Titre']) ?>
	<?= $this->Form->control('style', ['label' => 'Genre']) ?>
	<?= $this->Form->control('publisher', ['label' => 'Editeur']) ?>
	<?= $this->Form->control('poster', [
		'label' => 'Affiche',
			'type' =>'file'
			]) 	?>
	<?= $this->Form->button('Ajouter le jeu') ?>
<?= $this->Form->end() ?>

