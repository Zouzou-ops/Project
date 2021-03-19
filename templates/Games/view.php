<article class="content">
	<h1><?= $game->title ?></h1>
	<h4><?= $game->publisher ?></h4>
	<p><?= $game->style ?></p>
	<figure>
		<?= $this->Html->image('date/pictures/'.$game->poster, ['alt => $game->title']) ?>
		<figcaption>
			<?= $game->title ?>
		</figcaption>
			</figure>
		 </article>
		 <p>Les utilisateur qui possede ce jeu :</p>
		 <?php foreach ($game->libraries as $a) { ?>

		 	<p><?= $a->user->login ?></p>
		 <?php  } ?>	
		