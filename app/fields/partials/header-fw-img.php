<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$header_fw_img = new FieldsBuilder('header_fw_img');

$header_fw_img
    ->addGroup('header_img')
        ->addImage('image')
    ->endGroup();

return $header_fw_img;