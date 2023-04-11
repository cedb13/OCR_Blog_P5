<?php

namespace App\Lib;

require_once('../api/mailjet-apiv3-php-no-composer-master/vendor/autoload.php');

use \Mailjet\Resources;

use App\Lib\Database as Db;

class SendService{

    private $db;

    public function __construct(){
        $this->db = new Db;
    }

    public function sendMail($subject, $email, $lastName, $firstName, $message){
        $username = $lastName.' '.$firstName;
        $mj = new \Mailjet\Client(getenv('f5a38ef45364c7b8057731e348d878dd'),getenv('3a9b3b3dd2ae1693b3b1340e52ab89d5'),true,['version' => 'v3.1']);
        $body = [
                'Messages' => [
                    [
                        'From' => [
                        'Email' => "cedric.bonche@gmail.com",
                        'Name' => "Cedric"
                        ],
                        'To' => [
                            [
                            'Email' => "cedric.bonche@gmail.com",
                            'Name' => "Cedric"
                            ]
                        ],
                        'Subject' => "$subject",
                        'TextPart' => "$email, $username, $message",

                    ]
                ]
            ];
            $response = $mj->post(Resources::$Email, ['body' => $body]);
            $response->success() && var_dump($response->getData());
    }    

   
    

}