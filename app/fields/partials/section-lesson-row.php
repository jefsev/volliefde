<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$section_lesson_row = new FieldsBuilder('section_lesson_row');

$section_lesson_row
    ->addGroup('lesson_row')
        ->addText('title')
        ->addTextarea('text')
    ->endGroup();

return $section_lesson_row;