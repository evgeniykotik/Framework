<?php

define("attrWithoutValue", ['multiple', 'selected']);
define("attr", ["type", "name", "additional_class", "value", "size"]);

function getAttrString($array)
{
    $attr = "";
    foreach ($array as $key => $value) {
        if ($key == 'attr') {
            foreach ($value as $k => $v) {
                appendKeyValue($attr, $k, $v);
            }
        } elseif (in_array($key, attrWithoutValue)) {
            appendKey($attr, $key);
        } elseif (in_array($key, attr)) {
            appendKeyValue($attr, $key, $value);
        }
    }
    return $attr;
}

function appendKeyValue(&$str, $key, $value)
{
    $str .= $key . "=" . "$value ";
}

function appendKey(&$str, $key)
{
    $str .= $key . " ";
}

function handleForm($array)
{
    echo "<form " . getAttrString($array) . ">";
    foreach ($array['elements'] as $element) {
        handleInput($element);
    }
    echo "</form>";
}

function handleInput($element)
{
    outputTitle($element);
    $type = $element['type'];
    if ($type == 'select') {
        echo "<select " . getAttrString($element) . ">";
        foreach ($element['list'] as $value) {
            handleSelectItem($value);
        }
        echo "</select>";
    } elseif ($type == "textarea") {
        echo "<textarea " . getAttrString($element) . ">";
        echo "</textarea>";
    } elseif ($type == "checkbox multiple") {
        //echo "<form " . getAttrString($element) . ">";
        foreach ($element['list'] as $value) {
            handleCheckboxtItem($value);
            br();
        }
        //
        //br() echo "</form>";
    } else {
        echo "<input " . getAttrString($element) . ">";
    }
    br();

}

function handleSelectItem($item)
{
    if (isset($item['title'])) {
        echo "<option " . getAttrString($item) . ">";
        echo $item['title'];
        echo "</option>";
    }
}

function handleCheckboxtItem($item)
{
    if (isset($item['title'])) {
        echo "<input " . getAttrString($item) . ">";
        echo $item['title'];
        echo "</input>";
    }
}

function outputTitle($params)
{
    if (isset($params['title'])) {
        echo $params['title'];
        br();
    }
}

function br()
{
    echo "<br>";
}

handleForm($this->component->getParams());

