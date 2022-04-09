<?php

function env($key){
    $data = [];
        if ($file = fopen(".env", "r")) {
            while(!feof($file)) {
                $line = fgets($file);
                if(strpos("#",$line)) continue;
                else{
                $tmp = explode(":",$line);
                $k = trim($tmp[0]);
                if(isset($k) && isset($tmp[1]))
                    $data[$k] = trim($tmp[1]);
                }
            }
            fclose($file);
            if(isset($data[trim($key)])) 
                return $data[$key];
            else   
                return "false";
    }   
}