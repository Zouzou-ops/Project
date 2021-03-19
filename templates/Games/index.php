
<h1>Les albums</h1>

<section class="game">
	
<?php

if($games->count() == 0)
	echo '<p>Aucun jeu actuellement</p>';

else {
	
	foreach ($games as $a) : ?>
	<article class="game">
		<figure>
			<img src="">
		</figure>
		<h1><?= $this->Html->link($a->name, ['controller' => 'Games', 'action' => 'view', $a->id]) ?></h1>
		<i class="fas fa-<?= ($a->status) ? 'lock' : 'lock-open' ?>" aria-hidden="true"></i>

		<footer class="infos">
			<div class="content"><?= $a->description ?></div>
			<p>jeu créé par <?= $this->Html->link($a->user->pseudonym, ['controller' => 'Users', 'action' => 'view', $a->user_id]) ?>
			</p>
		</footer>
	</article>

<?php endforeach;

} ?>

</section>
<ul class="pagination">
    <?= $this->Paginator->numbers() ?>
</ul>