<?php

namespace App\Controllers;

use App\Controllers\Controller as Controller;
use App\Model\UserAdmin;

class UserAdminController extends Controller{

    public function show(){

        $messageDeco['messageDeco'] = UserAdmin::decoMessage();
        $modalMessage['modalMessage'] = UserAdmin::modalMessage();
        $deconnect['deconnect'] = UserAdmin::deconnect();
        $displayNone['displayNone'] = UserAdmin::displayNone();
        $displayLog['displayLog'] = UserAdmin::login();
        $message['message'] = UserAdmin::logMessage();
        $this->setContents($messageDeco);
        $this->setContents($modalMessage);
        $this->setContents($deconnect);
        $this->setContents($displayNone);
        $this->setContents($displayLog);
        $this->setContents($message);
        $this->render('default');

    }
}