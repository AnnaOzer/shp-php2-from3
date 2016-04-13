<?php

class View
{
    public function display($template)
    {
        // начали буферизацию
        ob_start();

        // сделали что-то, что приведет к выводу на экран
        include __DIR__ . '/' . $template;

        // сохраняем в переменную что там в буфере накопилось
        $ret = ob_get_contents();

        // выключаем буферизацию
        ob_end_clean();

        // возвращаем из этого метода то что в буфере какопили и сохранили в переменную
        return $ret;
    }
}

$view = new View();
$html = $view->display('template.html');

echo $html;