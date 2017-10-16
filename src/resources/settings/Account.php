<?php
namespace proworkflow\resources\settings;

/**
 * Proworkflow Account Settings
 *
 * @property string $accounttype
 * @property string $accounturl
 * @property string $apikey
 * @property string $currency
 * @property string $dateformat
 */
class Account extends Setting {

    const RESOURCE_NAME = "account";

    public static function instance() {
        return new self(parent::RESOURCE_NAME . '/' . self::RESOURCE_NAME);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'accounttype' => 'Account Type',
            'accounturl' => 'Account URL',
            'apikey' => 'API Key',
            'currency' => 'Currency',
            'dateformat' => 'Date Format',
            // TODO: Add the rest
        ];
    }

}