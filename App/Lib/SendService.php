<?php

namespace App\Lib;

require_once('../api/mailjet-apiv3-php-no-composer-master/vendor/autoload.php');

use \Mailjet\Resources;

class SendService{

    /**
     * send Mail whith MailJet
     * 
     * @param string $subject  
     * @param string $email
     * @param string $lastName 
     * @param string $firstName
     * @param string $message
     * 
     */
    public function sendMail($subject, $email, $lastName, $firstName, $message){
        $username = $lastName.' '.$firstName;
        $mj = new \Mailjet\Client('f5a38ef45364c7b8057731e348d878dd','3a9b3b3dd2ae1693b3b1340e52ab89d5',true,['version' => 'v3.1']);
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
            $response = $mj->post(Resources::$Email, ['body' => $body, 'timeout' => 60000,  'connect_timeout' => 60000]);
            $response->success();
    }    

}