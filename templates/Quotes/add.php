<?php //tempplates/Quotes/add.php ?>

<h1>Ajouter une citation</h1>

<?= $this->form->create($new) ?>

	<?= $this->Form->control('content') ?>

	<?= $this->Form->control('author') ?>

	<?= $this->Form->button('Enregistrer') ?>

<?= $this->Form->end() ?>

