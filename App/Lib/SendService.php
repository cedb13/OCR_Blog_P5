<?php

namespace App\Lib;

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
        $mj = new \Mailjet\Client('5e18944f6f199989198715d38e49e682','3bea1e70778da32c0b3ce910be3a48eb',true,['version' => 'v3.1']);
        $body = [
                'Messages' => [
                    [
                        'From' => [
                        'Email' => "oldced.devtest@gmail.com",
                        'Name' => "Cedric"
                        ],
                        'To' => [
                            [
                            'Email' => "oldced.devtest@gmail.com",
                            'Name' => "Cedric"
                            ]
                        ],
                        'Subject' => "$subject",
                        'TextPart' => "
                        Email envoyé de : $email, 
                        Par utilisateur : $username,
                        Message : $message",
                        'HTMLPart' => "<h3>Email envoyé de : $email<br>
                        Par l'utilisateur : $username</h3><br>
                        <p><strong>Message :</strong><br> $message</p>",
                        'CustomID' => "AppGettingStartedTest"
                    ]
                ]
            ];
            $response = $mj->post(Resources::$Email, ['body' => $body, 'timeout' => 60000,  'connect_timeout' => 60000]);
            $response->success();
    }    

}