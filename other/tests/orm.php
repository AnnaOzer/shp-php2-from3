<?php

abstract class Model {
    static protected $table;
    static public function getTableName() {
        return self::$table;
    }
}

class Article extends Model {
    static protected $table = 'articles';
}
echo Article::getTableName();

// ничего не выводит