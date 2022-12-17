<?php

namespace Fw\Core\Component;

abstract class Base
{
    private array $result;//массив с результатами работы компонента
    private string $id;//строковой ид компонента
    private array $params;//входящие параметры компонента
    private $template;//экземпляр класса шаблона компонента
    private string $__path;//путь к файловой структуре компонента


    public function __construct($id, $params, $__path)
    {
        $this->id = $id;
        $this->params = $params;
        $this->__path = $__path;
    }

    public function setTemplate(string $idTemplate)
    {
        $this->template = new Template($idTemplate, $this);
        $this->template->setPath($this->__path);
    }

    public function executeComponent()
    {
        $this->template->render();
    }

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getPath()
    {
        return $this->__path;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getId()
    {
        return $this->id;
    }
}
