<?php
    namespace frontend\components;
    
    class Wall
    {
        public $group_id;
        const VER = "&v=4.0";
        public function __construct($name, $user=false)
        {
            $pos=strripos($name, '.com');
            $name=substr($name, $pos+5);
            if($user===false)
            {
                if(strpos($name, 'club')===0)
                    $this->group_id=substr($name,4);
                else 
                {
                    $group_id=@file_get_contents("https://api.vk.com/method/groups.getById?access_token=005779e1005779e100ebda815c0003b71600057005779e158eca5311aca80647ac8e0e4&group_ids=".$name . self::VER, false, stream_context_create(['http'=>['timeout'=>1]]));
                    $group_id=json_decode($group_id);
                    $this->group_id=$group_id->response[0]->gid;
                }
            } 
            else
            {
                if(strpos($name, 'id')===0)
                    $this->group_id=substr($name,2);
                else 
                {
                    $group_id=@file_get_contents("https://api.vk.com/method/users.get?access_token=005779e1005779e100ebda815c0003b71600057005779e158eca5311aca80647ac8e0e4&user_ids=".$name . self::VER, false, stream_context_create(['http'=>['timeout'=>1]]));
                    $group_id=json_decode($group_id);
                    $this->group_id=$group_id->response[0]->uid;
                }
            }  
        }
        
        public function getWall()
        {
            $wall = file_get_contents("https://api.vk.com/method/wall.get?owner_id=-".$this->group_id."&count=10&access_token=005779e1005779e100ebda815c0003b71600057005779e158eca5311aca80647ac8e0e4" . self::VER); 
            $wall = json_decode($wall);
            return $wall->response;
        }
        
        public function getUserWall()
        {
            $wall = file_get_contents("https://api.vk.com/method/wall.get?owner_id=".$this->group_id."&count=10&access_token=005779e1005779e100ebda815c0003b71600057005779e158eca5311aca80647ac8e0e4". self::VER); 
            $wall = json_decode($wall);
            return $wall->response;
        }
        
    }
?>