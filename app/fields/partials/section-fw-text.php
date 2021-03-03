<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$section_fw_text = new FieldsBuilder('section_fw_text');

$section_fw_text
    ->addGroup('fullwidth_text')
        ->addWysiwyg('text')
        ->addLink('link')
    ->endGroup();

return $section_fw_text;