<?php

class View
{
    public function display($template)
    {
        include $template; // хотим вернуть из метода, не выводить пока
    }
}

$view = new View();
$view->display('template.html');