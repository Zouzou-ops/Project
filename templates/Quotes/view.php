<?php //templates/Quotes\view.php ?>

<p>
	<?= $quote->content ?>
</p>
<p>Par : <?= $quote->author ?> </p>

<p>
	<?= $this->Html->link('Retour à la liste', ['controller' => '
	Quotes', 'action' => 'index']) ?>		