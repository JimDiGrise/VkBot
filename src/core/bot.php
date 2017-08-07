<?php 
    require '/../../vendor/autoload.php';
    use GuzzleHttp\Client;

    class Bot {
        private $bot;
        private $client;
        private $accessToken;

        public function __construct() {
            
            $this->client = new Client([
                'base_uri' => 'https://api.vk.com/method/',
                'timeout'  => 2.0,
            ]);    
        }
        public function setToken($token) {
            $this->accessToken = $token;
        }
        public function getItemIds() {
            $res = $this->client->request('GET', 'wall.get?count=10&domain=reutov.ilya&access_token=' . $this->accessToken);
            $body = json_decode($res->getBody());
            $itemIds = array();
            for($i = 1; $i < count($body->response); $i++) {
                array_push($itemIds, $body->response[$i]->id);
            }
            return $itemIds;
            
        }
        public function isLike($itemId){
            $res = $this->client->request('GET', 'likes.isLiked?access_token=' . $this->accessToken . '&domain=reutov.ilya&type=post&item_id=' . $itemId);
            $body = json_decode($res->getBody());
            //print_r($body);
            return $body->response;
        }
        public function setLike($itemId) {
            //echo $this->accessToken;
            $res = $this->client->request('GET', 'likes.add?access_token=' . $this->accessToken . ' &domain=reutov.ilya&type=post&item_id=' . $itemId);
            $body = json_decode($res->getBody());
            print_r($body);
         
        }   
        public function setLikes() {
            $ids = $this->getItemIds();
            foreach($ids as $id ) {
                usleep(500000);
                if(!$this->isLike($id)) {
                    echo $id . " Not Like\n"; 
                    $this->setLike($id);
                } 
            }
        }
    }
   

    
?>