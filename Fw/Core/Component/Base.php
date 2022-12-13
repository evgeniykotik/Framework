<?php

namespace Fw\Core\Component;

abstract class Base
{
    private array $result;//массив с результатами работы компонента
    private string $id;//строковой ид компонента
    private array $params;//входящие параметры компонента
    private string $template;//экземпляр класса шаблона компонента
    private string $__path;//путь к файловой структуре компонента


    public function __construct($params, $__path, $id = "default")
    {
        $this->id = $id;
        $this->params = $params;
        $this->__path = $__path;
    }

    public function setTemplate(string $idTemplate, Base $component)
    {
        $this->template = new Template($idTemplate, $component);
    }

    public function executeComponent()
    {
        $this->template->render;
    }

    public function getResult()
    {
        return $this->result;
    }
}
