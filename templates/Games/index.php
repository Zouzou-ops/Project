<section id="games">
	<h1>Les jeux</h1>	

	<div class="wrapper">
		<?php
		if($games->count() == 0)
			echo '<p>Aucun jeu actuellement</p>';

		else {
			foreach ($games as $g) : ?>
			<div class="card">
				<figure>
					<?= $this->Html->image('data/poster/'.$g->poster, ['alt' => $g->title]) ?>		</figure>
				<h1><?= $this->Html->link($g->title, ['controller' => 'Games', 'action' => 'view', $g->id]) ?></h1>
				<p>Genre : <?=$g->style?></p>
				<p>Editeur : <?=$g->publisher?></p>
				<?= $this->Form->postLink('Ajouter à ma bibliothèque', ['controller' => 'libraries', 'action' => 'new', $g->id]) ?>
			</div>

			<?php endforeach;

		} ?>
	</div>
</section>
<ul class="pagination">
    <?= $this->Paginator->numbers() ?>
</ul>