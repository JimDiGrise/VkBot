<?php
    
    require 'core/bot.php';

    class Accounts {
        private $accounts  = [
            "eaf3a74c662a387e3b2afafb429f0593a5d3e14475ac0cbc0cd7b031083fcee0135109d553d1fa6a083d0", 
            "eaf3a74c662a387e3b2afafb429f0593a5d3e14475ac0cbc0cd7b031083fcee0135109d553d1fa6a083d0",
            "eaf3a74c662a387e3b2afafb429f0593a5d3e14475ac0cbc0cd7b031083fcee0135109d553d1fa6a083d0",
            "eaf3a74c662a387e3b2afafb429f0593a5d3e14475ac0cbc0cd7b031083fcee0135109d553d1fa6a083d0"
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