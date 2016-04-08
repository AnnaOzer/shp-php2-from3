<?php

class GetConfig
{
    protected $config;

    public function getConfig()
    {
        return $this->config;
    }

    public function __construct()
    {
        $this->config = include __DIR__ . '/../config.php';
    }
}
