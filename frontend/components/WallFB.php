<?php
    namespace frontend\components;
    
    class WallFB
    {
        public $group_id;
        public $at;
        public function __construct($name)
        {
            $this->at="573815686124177|gEwY_inZ-n_4MVZStgQZ6cHKuRM";

            $group_id=file_get_contents("https://graph.facebook.com/".$this->getUID($name)."?access_token=$this->at");
            $group_id=json_decode($group_id);
            $this->group_id=$group_id->id;                
        }
        
        public function getWall()
        {            
            $g=  (file_get_contents("https://graph.facebook.com/".$this->group_id."/feed?access_token=$this->at&limit=10"));
            $g=json_decode($g);
            return $g->data;
        }

        private function getUID($url)
        {
            $parsed_url = parse_url($url);

            if ($id = $this->checkID($parsed_url)) {
                return $id;
            }
            return $parsed_url;
        }

        private function checkID($parsed_url)
        {
            $parsed_uri = [];
            if (isset($parsed_url['query']) && !empty($parsed_url['query']))
            {
                parse_str($parsed_url['query'], $parsed_uri);
                return isset($parsed_uri['id']) ? $parsed_uri['id'] : false;
            }
            if (isset($parsed_url['path']) && !empty($parsed_url['path']))
            {
                return $parsed_url['path'];
            }

        }
        
    }
?>