<?php
namespace proworkflow\resources;

/**
 * Proworkflow Message
 *
 * @property integer $id
 * @property integer $projectid
 * @property integer $categoryid
 * @property string $categoryname
 * @property string $completeddate
 * @property string $lastmodified
 * @property string $name
 * @property string $description
 * @property integer $projectnumber
 * @property string $projectstatus
 * @property string $projecttitle
 * @property string $startdate
 * @property integer $order1
 * @property integer $order2
 * @property integer $order3
 * @property integer $priority
 * @property string $projectcategoryname
 * @property integer $projectmanagerid
 * @property string $projectmanagername
 * @property string $creatorname
 * @property integer $creatorid
 * @property string $duedate
 * @property string $type
 * @property string $status
 *
 */
class Message extends ApiResource {

    const RESOURCE_NAME = 'messages';

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
            'projectid' => 'Project ID',
            'categoryid' => 'Category ID',
            'categoryname' => 'Category Name',
            'completeddate' => 'Completed Date',
            'lastmodified' => 'Last Modified',
            'name' => 'Name',
            'description' => 'Description',
            'projectnumber' => 'Project Number',
            'projectstatus' => 'Project Status',
            'projecttitle' => 'Project Title',
            'startdate' => 'Start Date',
            'order1' => 'Order1',
            'order2' => 'Order2',
            'order3' => 'Order3',
            'priority' => 'Priority',
            'projectcategoryname' => 'Project Category Name',
            'projectmanagerid' => 'Project Manager ID',
            'projectmanagername' => 'Project Manager Name',
            'creatorname' => 'Creator Name',
            'creatorid' => 'Creator ID',
            'duedate' => 'Due Date',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }

}