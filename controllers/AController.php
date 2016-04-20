<?php

abstract class AController {

    public function action($name)
    {
        /*
        all
        actionAll
        */
        $actionName = 'action'. ucfirst($name);
        if (method_exists($this, $actionName)) {
            // вызвать метод, чье название содержится в переменной $actionName
            $this->$actionName();
        }
    }

} 