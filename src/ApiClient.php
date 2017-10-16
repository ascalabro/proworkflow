<?php
namespace proworkflow;

use proworkflow\resources\Contact;
use proworkflow\resources\Message;
use proworkflow\resources\Project;
use proworkflow\resources\settings\Account;
use proworkflow\resources\settings\Setting;
use proworkflow\resources\Task;
use GuzzleHttp;

class ApiClient {

    /**
     * The Proworkflow API base url
     */
    const API_ENDPOINT = 'https://api.proworkflow.net';

    /**
     * Use this http client to authenticate and pull from the API
     * @var GuzzleHttp\Client
     */
    public $client;

    /**
     * Proworkflow API class constructor
     * @param array $creds The API key
     */
    public function __construct($creds) {
        if (!isset($creds['apikey']) || !isset($creds['username']) || !isset($creds['password'])) {
            throw new \Exception("Required keys not set when instantiating " . __CLASS__);
        }
        $this->client = new GuzzleHttp\Client([
            'base_uri' => self::API_ENDPOINT,
                'headers' => [
                    'apikey' => $creds['apikey']
                ],
                'auth' => [
                    $creds['username'],
                    $creds['password']
                ]
        ]);
    }

    /**
     * If $projectId not specified, all projects which the user can see are returned
     * @param string $projectId
     * @return mixed
     */
    public function projects($projectId = '') {
        $options = ['query' => ['tasks' => true]]; // include tasks in response (only applicable for single project query)
        $r = $this->client->request('GET', Project::instance()->getResourcePath() . $projectId, $options)->getBody();
        $response = \GuzzleHttp\json_decode($r->getContents());
        if (isset($response->projects)) {
            return $response->projects; // array of projects
        } elseif (isset($response->project)) {
            return $response->project; // single project
        } else {
            throw new \Exception('Unexpected response came back from API');
        }
    }

    /**
     * If $taskId is not specified, all tasks which the user has permission to see are returned
     * @param string $taskId
     * @return mixed
     */
    public function tasks($taskId = '') {
        $r = $this->client->request('GET', Task::instance()->getResourcePath() . $taskId)->getBody();
        $response = \GuzzleHttp\json_decode($r->getContents());
        if (isset($response->tasks)) {
            return $response->tasks; // array of tasks
        } elseif (isset($response->task)) {
            return $response->task; // single task
        } else {
            throw new \Exception('Unexpected response came back from API');
        }
    }

    /**
     * If $messageId is not specified, all tasks which the user can see are returned
     * @param string $messageId
     * @return mixed
     */
    public function messages($messageId = '') {
        $r = $this->client->request('GET', Message::instance()->getResourcePath() . $messageId)->getBody();
        $response = \GuzzleHttp\json_decode($r->getContents());
        if (isset($response->messages)) {
            return $response->messages; // array of messages
        } elseif (isset($response->message)) {
            return $response->message; // single message
        } else {
            throw new \Exception('Unexpected response came back from API');
        }
    }

    /**
     * If $messageId is not specified, all tasks which the user can see are returned
     * @param string $contactId
     * @return mixed
     */
    public function contacts($contactId = '') {
        $r = $this->client->request('GET', Contact::instance()->getResourcePath() . $contactId)->getBody();
        $response = \GuzzleHttp\json_decode($r->getContents());
        if (isset($response->contacts)) {
            return $response->contacts; // array of messages
        } elseif (isset($response->contact)) {
            return $response->contact; // single message
        } else {
            throw new \Exception('Unexpected response came back from API');
        }
    }

    /**
     * If $messageId is not specified, all tasks which the user can see are returned
     * @param string $settingId
     * @return mixed
     */
    public function accountSettings($contactId = '') {
        $r = $this->client->request('GET', Account::instance()->getResourcePath() . $contactId)->getBody();
        $response = \GuzzleHttp\json_decode($r->getContents());
        if (isset($response->settings)) {
            return $response->settings; // array of messages
        } elseif (isset($response->settings)) {
            return $response->settings; // single message
        } else {
            throw new \Exception('Unexpected response came back from API');
        }
    }

    /**
     * List of resources available from this class
     * @return array
     */
    public static function whichResourcesCanBeFetched() {
        return [
            Project::RESOURCE_NAME => Project::className(),
            Task::RESOURCE_NAME => Task::className(),
            Message::RESOURCE_NAME => Message::className(),
        ];
    }

}