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

    public function __construct(string $id, Base $component)
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
        $params = $this->component->getParams();
        $fullPath = $this->__path . '/templates/' . $this->id . "/";
        $result_modifier = $fullPath . "result_modifier.php";
        $template = $fullPath . "{$page}.php";
        $component_epilog = $fullPath . "component_epilog.php";
        $styleCss = $fullPath . "style.css";
        $scriptJs = $fullPath . "script.js";

        if (file_exists($result_modifier)) require_once $result_modifier;
        if (file_exists($template)) require_once $template;
        if (file_exists($component_epilog)) require_once $component_epilog;

        $application = Multiton::get(Application::class);
        $pager = $application->getPager();

        if (file_exists($styleCss)) $pager->addCss($fullPath. "style.css");

        if (file_exists($scriptJs)) $pager->addJs($fullPath . "script.js");
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
