<?php

namespace Fw\Core;

class Application
{
    private $pager;
    private $template = null;
    private const TEMPLATE_ID="myStudy/templatesID";


    public function __construct()
    {
        $this->pager = Multiton::get(Page::class);
    }

    private function startBuffer()
    {
        ob_start();
    }

    private function endBuffer()
    {
        $contentPage = ob_get_contents();
        foreach ($this->pager->getAllReplace() as $macros => $value) {
            $contentPage = str_replace($macros, $value, $contentPage);
        }
        $this->restartBuffer();
        echo $contentPage;
    }

    private function restartBuffer()
    {
        ob_end_clean();
    }

    private function getId()
    {
        $config = Multiton::get(Config::class);
        return $config->getValue(Application::TEMPLATE_ID);

    }

    public function header()
    {
        $this->startBuffer();
        require_once __DIR__ . "/../templates/" . $this->getId() . "/header.php";
    }

    public function footer()
    {
        require_once __DIR__ . "/../templates/" . $this->getId() . "/footer.php";
        $this->endBuffer();
    }

    public function getPager()
    {
        return $this->pager;
    }
}
