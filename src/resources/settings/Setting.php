<?php
namespace proworkflow\resources\settings;

/**
 * Proworkflow Settings base class
 *
 * @property integer $id
 * @property integer $companyid
 * @property string $companyname
 * @property string $firstname
 * @property string $type
 */
class Setting extends \proworkflow\resources\ApiResource  {

    const RESOURCE_NAME = "settings";

}
