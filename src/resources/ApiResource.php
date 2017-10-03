<?php
namespace proworkflow\resources;

use proworkflow\interfaces\HasResourceEndpointInterface;

class ApiResource implements HasResourceEndpointInterface {

    protected $_resourceName;

    public function __construct($resourceName)
    {
        $this->_resourceName = $resourceName;
    }

    public static function className()
    {
        return get_called_class();
    }

    /**
     * Returns the attribute labels.
     *
     * Attribute labels are mainly used for display purpose. For example, given an attribute
     * `firstName`, we can declare a label `First Name` which is more user-friendly and can
     * be displayed to end users.
     *
     * Note, in order to inherit labels defined in the parent class, a child class needs to
     * merge the parent labels with child labels using functions such as `array_merge()`.
     *
     * @return array attribute labels (name => label)
     */
    public function attributeLabels()
    {
        return [];
    }

    public function getResourcePath()
    {
        return '/' . $this->_resourceName . '/';
    }

    public function getResourceName()
    {
        return $this->_resourceName;
    }
}