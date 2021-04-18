<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$lesd = new FieldsBuilder('single_lesdag', [
    'position' => 'acf_after_title',
    'hide_on_screen'    => [
        'the_content'
    ]
]);


$lesd->setLocation('post_type', '==', 'lesdagen');

$lesd
    ->addPostObject('les', [
        'label' => 'Les',
        'instructions' => 'Kies een les voor deze dag',
        'required' => 1,
        'post_type' => ['lessen'],
        'multiple' => 0,
    ])
    ->addText('dag', [ 'wrapper' => [ 'width' => '25', ]])
    ->addText('maand', [ 'wrapper' => [ 'width' => '25', ]])
    ->addText('jaar', [ 'wrapper' => [ 'width' => '25', ]])
    ->addText('tijd', [ 'wrapper' => [ 'width' => '25', ]])
    ->addText('max_inschrijvingen')
    ->addRepeater('inschrijvingen')
        ->addText('naam')
        ->addText('email')
        ->addText('type')
    ->endRepeater();

return $lesd;