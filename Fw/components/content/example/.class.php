<?php

use Fw\Core\Component\Base;

class Example extends Base
{
    public function executeComponent()
    {
        $this->template->render();
        foreach ($this->getParams() as $k => $v) {
            if ($k != 'title')
                echo "" . $v;
        }
    }
}