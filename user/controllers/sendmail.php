<?php
require 'mailjet/vendor/autoload.php';
use \Mailjet\Resources;

// Use your saved credentials, specify that you are using Send API v3.1

$apikey = 'dab9532161be2c206411450235b6e2b2';
$apisecret = 'c14721e5e43b7434b5dc77084eb890ba';

$mj = new \Mailjet\Client($apikey, $apisecret,true,['version' => 'v3.1']);

// Define your request body

$body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "dsoft78@gmail.com",
          'Name' => "E-Exam Alerts"
        ],
        'To' => [
          [
            'Email' => "info@dsoftmedia.com",
            'Name' => "info@dsoftmedia.com"
          ]
        ],
        'TemplateID' => 4491191,
        'TemplateLanguage' => true,
        'Subject' => "E-Exam - Email Verification",
        'Variables' => json_decode('{"confirmation_link":"http://dsmverify.com"}', true)
      ]
    ]
  ];

// All resources are located in the Resources class

$response = $mj->post(Resources::$Email, ['body' => $body]);

// Read the response

echo $response;

$response->success() && var_dump($response->getData());
?>