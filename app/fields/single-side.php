<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$lesSide = new FieldsBuilder('single_les_side', [
    'position' => 'side',
]);


$lesSide->setLocation('post_type', '==', 'lessen');

$lesSide
 
    ->addGroup('samenvatting', [ 'wrapper' => [ 'width' => '100', ]])
        ->addText('sub_titel')
        ->addText('titel')
        ->addText('samenvatting')
        ->addText('knop_text')
    ->endGroup();

return $lesSide;