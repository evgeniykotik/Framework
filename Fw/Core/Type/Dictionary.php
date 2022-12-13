<?php

namespace Fw\Core\Type;

class Dictionary implements \Iterator, \ArrayAccess, \Countable, \JsonSerializable
{
    private bool $readonly;
    private $values;

    public function __construct(array $values, bool $readonly = false)
    {
        $this->readonly = $readonly;
        $this->values = $values;
    }

    public function get($name)
    {
        return $this->values[$name];
    }

    public function set($name, $value)
    {
        if ($this->readonly) return;
        $this->values[$name] = $value;
    }

    public function getValues()
    {
        return $this->values;
    }

    public function setValues($values)
    {
        if ($this->readonly) return;
        array_merge($this->values, $values);
    }

    public function clear()
    {
        if ($this->readonly) return;
        $this->values = [];
    }

    //iterator
    public function current()
    {
        return current($this->values);
    }

    public function next()
    {
        return next($this->values);
    }

    public function key()
    {
        return key($this->values);
    }

    public function valid()
    {
        return current($this->values) != null;
    }

    public function rewind()
    {
        reset($this->values);
    }

    //ArrayAccess
    public function offsetExists(mixed $offset)
    {
        return isset($this->values[$offset]);
    }

    public function offsetGet(mixed $offset)
    {
        return $this->values[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value)
    {
        $this->values[$offset] = $value;
    }

    public function offsetUnset(mixed $offset)
    {
        unset($this->values[$offset]);
    }

    //countable
    public function count()
    {
        return count($this->values);
    }

    //JsonSer
    public function jsonSerialize()
    {
        return $this->values;
    }
}













