<?php

                $current_data = file_get_contents('chat.json'); 
                $array_data = json_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_GET["name"],  
                     'msg'          =>     $_GET["msg"] 
                );  
                $array_data[] = $extra;  
                $final_data = json_encode($array_data);  
                file_put_contents('chat.json', $final_data);
  
?>