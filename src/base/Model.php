<?php

namespace agilov\docdocsdk\base;

/**
 * Class Model
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
abstract class Model extends Obj
{
    /**
     * @var array attribute values indexed by attribute names
     */
    private $_attributes = [];

    /**
     * @return array
     */
    abstract public function attributes();

    /**
     * PHP getter magic method.
     * This method is overridden so that attributes and related objects can be accessed like properties.
     *
     * @param string $name property name
     * @return mixed property value
     * @see getAttribute()
     */
    public function __get($name)
    {
        if (isset($this->_attributes[$name]) || array_key_exists($name, $this->_attributes)) {
            return $this->_attributes[$name];
        }

        if ($this->hasAttribute($name)) {
            return null;
        }

        $value = parent::__get($name);

        return $value;
    }

    /**
     * PHP setter magic method.
     *
     * You can set any attribute to object.
     * Use hasAttribute instead of hasProperty check for strict mode
     *
     * @param string $name property name
     * @param mixed $value property value
     */
    public function __set($name, $value)
    {
        //if (!$this->hasProperty($name)) {
        if ($this->hasAttribute($name)) {
            $this->_attributes[$name] = $value;
        }else {
            parent::__set($name, $value);
        }
    }

    /**
     * Returns a value indicating whether the model has an attribute with the specified name.
     * @param string $name the name of the attribute
     * @return bool whether the model has an attribute with the specified name.
     */
    public function hasAttribute($name)
    {
        return isset($this->_attributes[$name]) || in_array($name, $this->attributes(), true);
    }

    /**
     * Returns the named attribute value.
     * If this record is the result of a query and the attribute is not loaded,
     * `null` will be returned.
     * @param string $name the attribute name
     * @return mixed the attribute value. `null` if the attribute is not set or does not exist.
     * @see hasAttribute()
     */
    public function getAttribute($name)
    {
        return isset($this->_attributes[$name]) ? $this->_attributes[$name] : null;
    }
}
