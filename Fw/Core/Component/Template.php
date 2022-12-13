<?php

namespace Fw\Core\Component;

use Fw\Core\Application;
use Fw\Core\Multiton;

class Template
{
    private string $__path;
    private string $__relativePath;
    private string $id;
    private $component;

    public function __construct(Base $component,string $id = 'default')
    {
        $this->id = $id;
        $this->component = $component;
    }

    public function getID()
    {
        return $this->id;
    }

    public function getComponent()
    {
        return $this->component;
    }

    public function render($page = "template")
    {
        $result_modifier = $this->__path . "result_modifier.php";
        $template = $this->__path . "{$page}.php";
        $component_epilog = $this->__path . "component_epilog.php";
        $styleCss = $this->__path . "style.css";
        $scriptJs = $this->__path . "script.js";

        if (file_exists($result_modifier)) require_once $result_modifier;
        if (file_exists($template)) require_once $template;
        if (file_exists($component_epilog)) require_once $component_epilog;

        $application = Multiton::get(Application::class);
        $pager = $application->getPager();

        if (file_exists($styleCss)) $pager->addCss($this->__relativePath . $styleCss);

        if (file_exists($scriptJs)) $pager->addJs($this->__relativePath . $scriptJs);
    }

    public function getPath()
    {
        return $this->__path;
    }

    public function setPath(string $path)
    {
        $this->__path = $path;
    }

    public function getRelativePath()
    {
        return $this->__relativePath;
    }

    public function setRelativePath(string $relativePath)
    {
        $this->__relativePath = $relativePath;
    }
}
