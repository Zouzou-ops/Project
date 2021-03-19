<article class="picture">
		<figure>
			<?= $this->Html->image('data/avatar/'.$info->avatar, ['alt' => $info->login]) ?>

			<figcaption>
				<?= $info->login ?>
			</figcaption>

			<?php
			if($games->isEmpty()){ ?>
		 	<p>L'utilisateur ne possede aucun jeu</p>
		 	<?php }
		 	else { ?>
		 <p>L'utilisateur possede ces jeux :</p>
		 

			<?php 	foreach ($games as $g) : ?>
			<div class="card">
				<figure>
					<?= $this->Html->image('data/poster/'.$g->game->poster, ['alt' => $g->game->title]) ?>		</figure>
				<h1><?= $this->Html->link($g->game->title, ['controller' => 'Games', 'action' => 'view', $g->id]) ?></h1>


				<p>Genre : <?=$g->game->style?></p>
				<p>Editeur : <?=$g->game->publisher?></p>
				<?= $this->Form->postLink('Ajouter à ma bibliothèque', ['controller' => 'libraries', 'action' => 'new', $g->game->id]) ?>
			</div>

			<?php endforeach; } ?>	

		</figure>
	</article>