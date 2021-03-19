<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Librairie extends Entity{
    
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
