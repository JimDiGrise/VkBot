<?php
    
    require 'core/bot.php';

    class Accounts {
        private $accounts  = [
            "e251a204861727687f17bb8e80b1509181181e8b7c3182e3ce75f1052b2989f550a3ac6624516731721de", 
            "e251a204861727687f17bb8e80b1509181181e8b7c3182e3ce75f1052b2989f550a3ac6624516731721de",
            "e251a204861727687f17bb8e80b1509181181e8b7c3182e3ce75f1052b2989f550a3ac6624516731721de",
            "e251a204861727687f17bb8e80b1509181181e8b7c3182e3ce75f1052b2989f550a3ac6624516731721de"
        ];
        public function getRandomAccount() {
            $randomToken = rand(0, count($this->accounts) - 1);
            return $this->accounts[$randomToken];
        }
    }
    $acc = new Accounts();
    $newToken = $acc->getRandomAccount();
    $bot = new Bot();
    $bot->setToken($newToken);
    $bot->setLikes();
?>