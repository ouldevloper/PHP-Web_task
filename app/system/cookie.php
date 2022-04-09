<?php

namespace SYSTEM;
class cookie{
    private $expires  = env("cookie_expires_time");
    private $path     = env("cookie_path");
    private $domain   = env("cookie_domain");
    private $secure   = env("cookie_isSecure");
    private $httponly = env("cookie_isHttpOnly");
    public function set($key,$value){
        setcookie($key,
                  $value,
                  $this->expires,
                  $this->path,
                  $this->domain,
                  $this->secure,
                  $this->httponly);
    }
    public function set()
}