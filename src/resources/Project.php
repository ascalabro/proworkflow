<?php
namespace proworkflow\resources;

/**
 * Proworkflow Project
 *
 * @property integer $id
 * @property integer $number
 * @property string $customstatus
 * @property integer $priority
 * @property string $duedate
 * @property string $groupname
 * @property string $internalclientgroupname
 * @property string $lastmodified
 * @property string $internalclientcontactname
 * @property integer $taskstimeallocated
 * @property integer $timetracked
 * @property string $title
 * @property string $teamname
 * @property string $startdate
 * @property string $status
 * @property string $managername
 * @property string $categoryname
 * @property string $companyname
 * @property string $completedate
 * @property string $description
 * @property string $internalclientteamname
 * @property integer $managerid
 * @property integer $percentcomplete
 * @property string $privatenotes
 * @property string $type
 */
class Project extends ApiResource {

    const RESOURCE_NAME = "projects";

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
            'number' => 'Number',
            'customstatus' => 'Custom Status',
            'priority' => 'Priority',
            'duedate' => 'Due Date',
            'groupname' => 'Group Name',
            'internalclientgroupname' => 'Internal Client Group Name',
            'lastmodified' => 'Last Modified',
            'internalclientcontactname' => 'Internal Client Contact Name',
            'taskstimeallocated' => 'Tasks Time Allocated',
            'timetracked' => 'Time Tracked',
            'title' => 'Title',
            'teamname' => 'Team Name',
            'startdate' => 'Start Date',
            'status' => 'Status',
            'managername' => 'Manager Name',
            'categoryname' => 'Category Name',
            'companyname' => 'Company Name',
            'completedate' => 'Complete Date',
            'description' => 'Description',
            'internalclientteamname' => 'Internal Client Team Name',
            'managerid' => 'Manager ID',
            'percentcomplete' => 'Percent Complete',
            'privatenotes' => 'Private Notes',
            'type' => 'Type',
        ];
    }

}