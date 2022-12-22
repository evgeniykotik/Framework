<?php

use Fw\Core\Component\Base;

class RenderForm extends Base
{
    const ATTR = ["type", "name", "additional_class", "value", "size"];
    const ATTRWITHOUTVALUE = ['multiple', 'selected'];

    public function executeComponent()
    {
        $this->template->render();
    }

    private function getAttrString($array)
    {
        $attr = "";
        foreach ($array as $key => $value) {
            if ($key == 'attr') {
                foreach ($value as $k => $v) {
                    $this->appendKeyValue($attr, $k, $v);
                }
            } elseif (in_array($key, self::ATTRWITHOUTVALUE)) {
                $this->appendKey($attr, $key);
            } elseif (in_array($key, self::ATTR)) {
                $this->appendKeyValue($attr, $key, $value);
            }
        }
        return $attr;
    }

    private function appendKeyValue(&$str, $key, $value)
    {
        $str .= $key . "=" . "$value ";
    }

    private function appendKey(&$str, $key)
    {
        $str .= $key . " ";
    }

    public function handleForm($array)
    {
        echo "<form " . $this->getAttrString($array) . ">";
        foreach ($array['elements'] as $element) {
            $this->handleInput($element);
        }
        echo "</form>";
    }

    private function handleInput($element)
    {
        $this->outputTitle($element);
        $type = $element['type'];
        if ($type == 'select') {
            echo "<select " . $this->getAttrString($element) . ">";
            foreach ($element['list'] as $value) {
                $this->handleSelectItem($value);
            }
            echo "</select>";
        } elseif ($type == "textarea") {
            echo "<textarea " . $this->getAttrString($element) . ">";
            echo "</textarea>";
        } elseif ($type == "checkbox multiple") {
            foreach ($element['list'] as $value) {
                $this->handleCheckboxtItem($value);
                $this->br();
            }
        } else {
            echo "<input " . $this->getAttrString($element) . ">";
        }
        $this->br();
    }

    private function handleSelectItem($item)
    {
        if (isset($item['title'])) {
            echo "<option " . $this->getAttrString($item) . ">";
            echo $item['title'];
            echo "</option>";
        }
    }

    private function handleCheckboxtItem($item)
    {
        if (isset($item['title'])) {
            echo "<input " . $this->getAttrString($item) . ">";
            echo $item['title'];
            echo "</input>";
        }
    }

    private function outputTitle($params)
    {
        if (isset($params['title'])) {
            echo $params['title'];
            $this->br();
        }
    }

    private function br()
    {
        echo "<br>";
    }
}