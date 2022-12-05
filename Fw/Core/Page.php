<?php

namespace Fw\Core;

class Page
{
    public $macrosToValueArrayHeader = array();
    public $macrosToValueArray = array();

    private function macrosIndex()
    {
        return count($this->macrosToValueArrayHeader);
    }

    public function addJs(string $src)
    {
        $this->macrosToValueArrayHeader[$this->macros(MacrosType::JS, $this->macrosIndex())] = "<script type='text/javascript' src='$src'></script>";
    }

    public function addCss(string $link)
    {
        $this->macrosToValueArrayHeader[$this->macros(MacrosType::CSS, $this->macrosIndex())] = "<link rel='stylesheet' href='$link'>";
    }

    public function addString(string $str)
    {
        $this->macrosToValueArrayHeader[$this->macros(MacrosType::STRING, $this->macrosIndex())] = $str;
    }

    public function showHead()
    {
        foreach ($this->macrosToValueArrayHeader as $macros => $value) {
            echo $macros;
        }
    }

    private function macros($macrosType, $id)
    {
        return "#FW_PAGE_{$macrosType}_{$id}#";
    }

    public function setProperty(string $id, $value)
    {
        $this->macrosToValueArray[$this->macros(MacrosType::PROPERTY, $id)] = $value;
    }

    public function getProperty(string $id)
    {
        return $this->macrosToValueArray[$this->macros(MacrosType::PROPERTY, $id)];
    }

    public function showProperty(string $id)
    {
        echo $this->macros(MacrosType::PROPERTY, $id);
    }

    public function getAllReplace()
    {
        return array_merge($this->macrosToValueArray, $this->macrosToValueArrayHeader);
    }
}

class MacrosType
{
    const JS = "JS";
    const CSS = "CSS";
    const STRING = "STRING";
    const PROPERTY = "PROPERTY";
}