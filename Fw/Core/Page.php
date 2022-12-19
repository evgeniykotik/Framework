<?php

namespace Fw\Core;

class Page
{
    public $macrosToValueArrayHeader = array();
    public $macrosToValueArray = array();
    public $headerValuesArray = array();

    private function macrosIndex()
    {
        return count($this->macrosToValueArrayHeader);
    }

    public function addJs(string $src)
    {
        if (!in_array($src, $this->headerValuesArray)) {
            $this->headerValuesArray[] = $src;
            $this->macrosToValueArrayHeader[$this->macros(MacrosType::JS, $this->macrosIndex())] = "<script type='text/javascript' src='$src'></script>";
        }
    }

    public function addCss(string $link)
    {
        if (!in_array($link, $this->headerValuesArray)) {
            $this->headerValuesArray[] = $link;
            $this->macrosToValueArrayHeader[$this->macros(MacrosType::CSS, $this->macrosIndex())] = "<link rel='stylesheet' href='$link'>";
        }
    }

    public function addString(string $str)
    {
        if (!in_array($str, $this->macrosToValueArrayHeader)) {
            $this->macrosToValueArrayHeader[$this->macros(MacrosType::STRING, $this->macrosIndex())] = $str;
        }
    }

    public function showHead()
    {
        foreach ($this->macrosToValueArrayHeader as $macros => $value) {
            if ($value !== null) {
                echo $macros;
            }
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

