<?php

require_once __DIR__ . '/../Storage.php';
require_once __DIR__ . '/../models/Article.php';

class View
    extends Storage
{
    public $dirTemplates;

    public function __construct($dirTemplates){
        $this->dirTemplates = $dirTemplates;
    }

    public function display($template)
    {
        ob_start();

        foreach ($this as $k => $v) {
            $$k = $v;
        }

        include $this->dirTemplates . '/' . $template;
        $ret = ob_get_contents();
        ob_end_clean();
        return $ret;
    }
}

$view = new View(__DIR__ . '/templates');
/*
 * Путь получения текстов статей через заглушку
$view->articles = [
    ['title'=>'Первая новость', 'text'=>'Текст первой новости'],
    ['title'=>'Вторая новость', 'text'=>'Текст второй новости'],
];
*/

/*
 * Путь получения текстов статей через базу данных
 * */
$newsArticle = new NewsArticle();
$view->articles = $newsArticle->getAll();
echo $view->display('template.php');
