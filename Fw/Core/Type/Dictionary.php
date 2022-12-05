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
        // TODO: Implement current() method.
    }

    public function next()
    {
        // TODO: Implement next() method.
    }

    public function key()
    {
        // TODO: Implement key() method.
    }

    public function valid()
    {
        // TODO: Implement valid() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
    //ArrayAccess
    public function offsetExists(mixed $offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet(mixed $offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetSet(mixed $offset, mixed $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset(mixed $offset)
    {
        // TODO: Implement offsetUnset() method.
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
