<?php

class View
    extends Storage
{
    public function display($template)
    {

        foreach ($this as $k => $v) {
            $$k = $v;
        }
        include $template;
    }
}