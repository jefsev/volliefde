<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$les = new FieldsBuilder('single_les', [
    'position' => 'acf_after_title',
    'hide_on_screen'    => [
        'the_content'
    ]
]);


$les->setLocation('post_type', '==', 'lessen');

$les
 
    ->addImage('header_afbeelding')
    ->addImage('afbeelding', [ 'wrapper' => [ 'width' => '50', ]])
    ->addGroup('praktische_info', [ 'wrapper' => [ 'width' => '50', ]])
        ->addText('titel')
        ->addText('waar')
        ->addText('dag')
        ->addText('hoelaat')
        ->addText('prijs')
    ->endGroup()
    ->addGroup('fullwidth_text')
        ->addWysiwyg('text')
    ->endGroup()
    ->addText('shortcode_form');

return $les;