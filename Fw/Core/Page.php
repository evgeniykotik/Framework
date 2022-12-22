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
        $srcPrepared = str_replace(" ", "", $src);
        if (!in_array($srcPrepared, $this->headerValuesArray) && !empty($srcPrepared)) {
            $this->headerValuesArray[] = $srcPrepared;
            $this->macrosToValueArrayHeader[$this->macros(MacrosType::JS, $this->macrosIndex())] = "<script type='text/javascript' src='$srcPrepared'></script>";
        }
    }

    public function addCss(string $link)
    {
        $linkPrepared = str_replace(" ", "", $link);
        if (!in_array($linkPrepared, $this->headerValuesArray) && !empty($linkPrepared)) {
            $this->headerValuesArray[] = $linkPrepared;
            $this->macrosToValueArrayHeader[$this->macros(MacrosType::CSS, $this->macrosIndex())] = "<link rel='stylesheet' href='$linkPrepared'>";
        }
    }

    public function addString(string $str)
    {
        $strPrepared = str_replace(" ", "", $str);
        if (!in_array($strPrepared, $this->macrosToValueArrayHeader) && !empty($strPrepared)) {
            $this->macrosToValueArrayHeader[$this->macros(MacrosType::STRING, $this->macrosIndex())] = $strPrepared;
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
