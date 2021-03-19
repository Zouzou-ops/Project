<article class="picture">
		<figure>
			<?= $this->Html->image('data/avatar/'.$info->avatar, ['alt' => $info->login]) ?>

			<figcaption>
				<?= $info->login ?>
			</figcaption>
		</figure>
	</article>