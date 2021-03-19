<h1>Nouveau jeu</h1>

<?= $this->Form->create($n) ?>
	<?= $this->Form->control('name', ['label' => 'Titre']) ?>
	<?= $this->Form->control('description', ['label' => 'Description']) ?>
	<?= $this->Form->control('status', ['label' => 'Album privé']) ?>

	<?= $this->Form->button('Ajouter le jeu') ?>
<?= $this->Form->end() ?>