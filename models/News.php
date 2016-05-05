<?php

class News
    extends AbstractModel
{
    static protected $table = "newsarticles";
    static protected $columns = ['title', 'author', 'text'];
}