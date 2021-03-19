<article class="content">
	<h1><?= $game->title ?></h1>
	<h4><?= $game->publisher ?></h4>
	<p><?= $game->style ?></p>

	<figure>
		<?= $this->Html->image('data/poster/'.$game->poster, ['alt' => $game->title]) ?>
		
			</figure>
			<?= $this->Form->postLink('Ajouter à ma bibliothèque', ['controller' => 'libraries', 'action' => 'new', $game->id]) ?>
		 </article>
		 <?php 

		 if($user->isEmpty()){ ?>
		 	<p>Personne ne possede ce jeu</p>
		 	<?php }
		 	else { ?>
		 <p>Les utilisateurs qui possede ce jeu :</p>
		 <?php foreach ($user as $a) { ?>

		 	<p><?= $a->user->login ?></p>
		 <?php  } } ?>	
		