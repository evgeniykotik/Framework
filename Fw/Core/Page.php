<?php

namespace Fw\Core;

class Page
{
    private $arrayJs = array();
    private $arrayCss = array();
    private $arrayString = array();
    public $variables = array();

    public function addJs(string $src)
    {
        $this->arrayJs[] = $src;
    }

    public function addCss(string $link)
    {
        $this->arrayCss[] = $link;
    }

    public function addString(string $str)
    {
        $this->arrayString[] = $str;
    }

    public function showHead()
    {
        foreach ($this->arrayCss as $link) {
            echo "<link rel='stylesheet' href='$link'>";
        }

        foreach ($this->arrayJs as $src) {
            echo "<script type='text/javascript' src='$src'></script>";
        }

        foreach ($this->arrayString as $str) {
            echo "$str";
        }
    }

    public function setProperty(string $id, $value)
    {
        $this->variables[$id] = $value;
    }

    public function getProperty(string $id)
    {
        return $this->variables[$id];
    }

    public function showProperty(string $id)
    {
        return "#FW_PAGE_PROPERTY_{$id}#";
    }

    public function getAllReplace()
    {
        $replaceValue = array();
        foreach ($this->variables as $id => $value) {
            $replaceValue[$this->showProperty($id)] = $value;
        }
        return $replaceValue;
    }
}