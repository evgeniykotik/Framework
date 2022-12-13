<?php

namespace Fw\Core;

use Fw\Core\Type\Request;
use Fw\Core\Type\Server;
use Fw\Core\Type\Session;

class Application
{
    private $pager;
    private $request;
    private $session;
    private $server;
    private $template = null;
    private const FOLDER_TEMPLATES = __DIR__ . "/../templates/";
    private const FOLDER_COMPONENTS = __DIR__ . "/../components/";

    public function __construct()
    {
        $this->pager = Multiton::get(Page::class);
        $this->request = Multiton::get(Request::class);
        $this->server = Multiton::get(Server::class);
        $this->session = Multiton::get(Session::class);
    }

    private function startBuffer()
    {
        ob_start();
    }

    private function endBuffer()
    {
        $contentPage = ob_get_contents();
        $replaces = $this->pager->getAllReplace();
        $contentPage = str_replace(array_keys($replaces), array_values($replaces), $contentPage);
        $this->restartBuffer();
        echo $contentPage;
    }

    public function restartBuffer()
    {
        ob_clean();
    }

    private function getTemplatePath()
    {
        $templatePath = Config::getValue("template");
        return $templatePath ?: "default";
    }

    public function header()
    {
        $this->startBuffer();
        require_once Application::FOLDER_TEMPLATES . $this->getTemplatePath() . "/header.php";
    }

    public function footer()
    {
        require_once Application::FOLDER_TEMPLATES . $this->getTemplatePath() . "/footer.php";
        $this->endBuffer();
    }

    public function getPager()
    {
        return $this->pager;
    }

    public function getSession(): Session
    {
        return $this->session;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getServer(): Server
    {
        return $this->server;
    }

    public function includeComponent(string $component = "content:default", string $template = "default", array $params = [])
    {
        $component = $this->getIncludeComponent($component, $params);
        if (is_null($component)) return;
        $componentTemplate = $component->setTemplate($template, $component);
        $componentTemplate->executeComponent();
    }

    private function getIncludeComponent(string $component = "content:default", array $params = [])
    {
        $path = str_replace(":", "/", $component);
        $componentPath = self::FOLDER_COMPONENTS . $path . "/.class.php";
        if (!file_exists($componentPath)) return null;
        require_once $componentPath;
        $componentInstance = new $componentPath($id, $params, $__path);
        return $componentInstance;
    }
}