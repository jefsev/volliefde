<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$options = new FieldsBuilder('options_footer');

$options
    ->setLocation('options_page', '==', 'footer-instellingen');
  
$options
        ->addGroup('footer_rij_1', ['wrapper' => ['width' => '50']])
            ->addText('footer_rij_titel')
            ->addRepeater('footer_top_links')
                ->addLink('footer_top_link')
            ->endRepeater()
        ->endGroup()
        ->addGroup('footer_rij_2', ['wrapper' => ['width' => '50']])
            ->addText('footer_rij_titel')
            ->addRepeater('footer_top_links')
                ->addLink('footer_top_link')
            ->endRepeater()
        ->endGroup()
        ->addGroup('footer_rij_3', ['wrapper' => ['width' => '50']])
            ->addText('footer_rij_titel')
            ->addRepeater('footer_top_links')
                ->addLink('footer_top_link')
            ->endRepeater()
        ->endGroup()
        ->addGroup('footer_rij_4', ['wrapper' => ['width' => '50']])
            ->addText('footer_rij_titel')
            ->addRepeater('footer_top_links')
                ->addLink('footer_top_link')
            ->endRepeater()
        ->endGroup();
            


;return $options;