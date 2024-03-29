<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$home = new FieldsBuilder('page_home', [
    'position' => 'acf_after_title',
    'hide_on_screen'    => [
        'the_content'
    ]
]);
// Loading partials here
$header_front_page = get_field_partial('partials.header-front-page');
$section_lesson_row = get_field_partial('partials.section-lesson-row');
$section_fw_text = get_field_partial('partials.section-fw-text');
$section_img_text = get_field_partial('partials.section-img-text');
$header_fw_img = get_field_partial('partials.header-fw-img');

$home->setLocation('page_type', '==', 'front_page');

$home
    ->addFlexibleContent('header', ['button_label' => 'Add Content Row'])
        ->addLayout($header_front_page)
        ->addLayout($header_fw_img)
    ->endFlexibleContent()
    ->addFlexibleContent('content', ['button_label' => 'Add Content Row'])
        ->addLayout($section_lesson_row)
        ->addLayout($section_fw_text)
        ->addLayout($section_img_text)
    ->endFlexibleContent();

return $home;