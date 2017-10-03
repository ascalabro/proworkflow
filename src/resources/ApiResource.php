<?php
namespace proworkflow\resources;


use proworkflow\interfaces\HasResourceEndpointInterface;

class ApiResource implements HasResourceEndpointInterface {

    protected $_resource_name;

    public static function className()
    {
        return get_called_class();
    }

    public static function instance() {
        return new self;
    }

    /**
     * Returns the attribute labels.
     *
     * Attribute labels are mainly used for display purpose. For example, given an attribute
     * `firstName`, we can declare a label `First Name` which is more user-friendly and can
     * be displayed to end users.
     *
     * By default an attribute label is generated using [[generateAttributeLabel()]].
     * This method allows you to explicitly specify attribute labels.
     *
     * Note, in order to inherit labels defined in the parent class, a child class needs to
     * merge the parent labels with child labels using functions such as `array_merge()`.
     *
     * @return array attribute labels (name => label)
     * @see generateAttributeLabel()
     */
    public function attributeLabels()
    {
        return [];
    }

    protected function _setResourceName($resource_name) {
        $this->_resource_name = $resource_name;
    }

    public static function getResourcePath()
    {
        return '';
    }
}