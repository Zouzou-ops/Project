<?php //templates/Quotes/index.php ?>

<p>
	<?= $this->Html->link('Ajouter une citation', ['controller' => '
		Quotes', 'action' =>'add'])
		?>

		<?= $this->Html->link('Hello', ['controller' => '
		Quotes', 'action' =>'add'])
		?>

		<?= $this->Html->link('Salut', ['controller' => '
		Quotes', 'action' =>'add'])
		?>

		<?= $this->Html->link('Bye Michelle', ['controller' => '
		Quotes', 'action' =>'add'])
		?>

		<?= $this->Html->link('Bye Hubert', ['controller' => '
		Quotes', 'action' =>'add'])
		?>

<table>
	<thead>
		<tr>
			<th>Citation</th>
			<th>Auteur</th>
			<th>Action</th>
		</tr>
	</thead>
<tbody>

<?php foreach ($tQuotes as $q) { ?>
	<tr>
		<td><?= $q->content ?></td>
		<td><?= $q->author ?></td>
		<td>
			<?= $this->Html->link('lien', ['controller' =>
		'Quotes', 'action' =>'view', $q->id]) ?>

			<?= $this->Html->link('editer', ['action' => 'edit', $q->id]) ?>

			<?= $this->Form->postLink('supprimer', ['action' => 'delete', $q->id], ['confirm' => 'Etes-vous sur de vouloir supprimer cette citation ?']) ?>
		</td>
	</tr>
<?php } ?>
</tbody>
</table>
