<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$contact_content = new FieldsBuilder('contact_content');

$contact_content
    ->addGroup('contact_image', [ 'wrapper' => [ 'width' => '50', ]])
        ->addImage('image')
    ->endGroup()
    ->addGroup('contact_text', [ 'wrapper' => [ 'width' => '50', ]])
        ->addWysiwyg('text')
    ->endGroup();

return $contact_content;