<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$section_img_text = new FieldsBuilder('section_img_text');

$section_img_text
    ->addGroup('block_img_text')
        ->addImage('image', [ 'wrapper' => [ 'width' => '50', ]])
        ->addGroup('text_rechts', [ 'wrapper' => [ 'width' => '50', ]])
            ->addText('titel')
            ->addWysiwyg('text')
            ->addLink('link')
        ->endGroup()
    ->endGroup();

return $section_img_text;