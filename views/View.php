<?php

require_once __DIR__ . '/../Storage.php';

class View
    extends Storage
{
    public $dirtemplates;

    public function __construct($dirtemplates){
        $this->dirtemplates = $dirtemplates;
    }
}