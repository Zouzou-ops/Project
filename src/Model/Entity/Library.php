<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Library extends Entity{
    
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
