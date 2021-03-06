<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav">
     <?= $this->Html->link('Accueil', ['controller' => 'Users', 'action' => 'login']) ?>
    

     <?php if($this->request->getAttribute('identity') == null) { ?>
     <?= $this->Html->link('Se connecter', ['controller' => 'Users', 'action' => 'login']) ?>
     <?= $this->Html->link('Créer un compte', ['controller' => 'Users', 'action' => 'new']) ?>

     <?php } else { ?>

      <?php  
    if($this->request->getAttribute('identity')->level != 'user'){?>
     <?= $this->Html->link('Ajouter un jeu', ['controller' => 'games', 'action' => 'new']) ?>
    <?php }?>
     <?= $this->Html->link('Mon compte', ['controller' => 'Users', 'action' => 'view', $this->request->getAttribute('identity')->id]) ?>

     <?= $this->Html->link('Se deconnecter', ['controller' => 'Users', 'action' => 'logout']) ?>



      <?php } ?>
      
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
