<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$header_front_page = new FieldsBuilder('header_front_page');

$header_front_page
    ->addGroup('header_home')
        ->addGroup('header_links', [ 'wrapper' => [ 'width' => '50', ]])
            ->addText('title')
            ->addTextarea('text')
            ->addLink('link')
        ->endGroup()
        ->addGroup('header_rechts', [ 'wrapper' => [ 'width' => '50', ]])
            ->addFile('video')
        ->endGroup()
    ->endGroup();

return $header_front_page;