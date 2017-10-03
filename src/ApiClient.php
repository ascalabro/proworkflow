<?php
namespace proworkflow;

use proworkflow\resources\Message;
use proworkflow\resources\Project;
use proworkflow\resources\Task;
use GuzzleHttp;

class ApiClient {

    const API_ENDPOINT = 'https://api.proworkflow.net';

    /**
     * Our API key for connecting to the API
     * @var string
     */
    public $apikey;

    /**
     * The username to be
     * @var string
     */
    public $username;

    /**
     * The password of the user
     * @var string
     */
    public $password;

    /**
     * Use this http client to authenticate and pull from the API
     * @var GuzzleHttp\Client
     */
    public $client;

    /**
     * Proworkflow class constructor
     * @param string $apiKey The API key
     * @param string $username Proworkflow username
     * @param string $password Proworkflow password
     */
    public function __construct($apiKey, $username = '', $password = '') {
        $this->apikey = $apiKey;
        if (!strlen($username) > 0 || !strlen($password) > 0) {
            $this->username = "ascalabroni-ctr@laserspineinstitute.com"; // TODO get this from somewhere else
            $this->password = "Password="; // TODO get this from somewhere else
        } else {
            $this->username = $username;
            $this->password = $password;
        }
        $this->client = new GuzzleHttp\Client([
            'base_uri' => self::API_ENDPOINT,
                'headers' => [
                    'apikey' => $this->apikey
                ],
                'auth' => [
                    $this->username,
                    $this->password
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
        $r = $this->client->request('GET', Project::getResourcePath() . $projectId, $options)->getBody();
        $response = \GuzzleHttp\json_decode($r->getContents());
        if (isset($response->projects)) {
            return $response->projects; // array of projects
        }
    }

    /**
     * If $taskId is not specified, all tasks which the user can see are returned
     * @param string $taskId
     * @return mixed
     */
//    public function tasks($taskId = '') {
//        $r = $this->client->request('GET', Task::getResourcePath() . $taskId)->getBody();
//        $response = Json::decode($r->getContents());
//        if (isset($response['tasks'])) {
//            return $response['tasks']; // array of tasks
//        } elseif (isset($response['task'])) {
//            return $response['task']; // single task
//        } else {
//            throw new Exception('Unexpected response came back from API');
//        }
//    }
//
//    /**
//     * If $messageId is not specified, all tasks which the user can see are returned
//     * @param string $messageId
//     * @return mixed
//     */
//    public function messages($messageId = '') {
//        $r = $this->client->request('GET', Message::getResourcePath() . $messageId)->getBody();
//        $response = Json::decode($r->getContents());
//        if (isset($response['tasks'])) {
//            return $response['tasks']; // array of tasks
//        } elseif (isset($response['task'])) {
//            return $response['task']; // single task
//        } else {
//            throw new Exception('Unexpected response came back from API');
//        }
//    }

    /**
     * List of resources available from this class
     * @return array
     */
    public static function getValidResourceNames() {
        return [
            Project::RESOURCE_NAME => Project::className(),
//            Task::RESOURCE_NAME => Task::className(),
//            Message::RESOURCE_NAME => Message::className(),
        ];
    }

}