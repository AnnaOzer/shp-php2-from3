<?php

class View
    extends Storage
{
    public function display($template)
    {
        ob_start();
        foreach ($this as $k => $v) {
            $$k = $v;
        }
        include $template;
        $ret = ob_get_contents();
        ob_end_clean();
        return $ret;
    }
}

/*
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
*/