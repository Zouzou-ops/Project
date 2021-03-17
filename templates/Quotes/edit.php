<?php //tempplates/Quotes/edit.php ?>

<h1>Ajouter une citation</h1>

<?= $this->Form->create($quote) ?>

	<?= $this->Form->control('content') ?>

	<?= $this->Form->control('author') ?>

	<?= $this->Form->button('Enregistrer') ?>

<?= $this->Form->end() ?>

