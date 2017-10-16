<?php
namespace proworkflow\resources;

/**
 * Proworkflow Contacts
 *
 * @property integer $id
 * @property integer $companyid
 * @property string $companyname
 * @property string $firstname
 * @property string $type
 */
class Contact extends ApiResource {

    const RESOURCE_NAME = "contacts";

    public static function instance() {
        return new self(self::RESOURCE_NAME);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'companyid' => 'Company ID',
            'companyname' => 'Company Name',
            'firsname' => 'First Name',
            'lastname' => 'Last Name',
            'type' => 'Type'
        ];
    }

}