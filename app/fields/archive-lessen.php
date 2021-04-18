<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$archiveLessen = new FieldsBuilder('archive_lessen');

$archiveLessen
    ->setLocation('options_page', '==', 'lessen-archief-page');
  
$archiveLessen    
    ->addGroup('header_img')
        ->addImage('image')
    ->endGroup()        
    ->addText('title')
    ->addTextarea('text');


;return $archiveLessen;