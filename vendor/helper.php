<?php 

class Security{
	const Algo = PASSWORD_BCRYPT;
	public static $Options;
	public static function crypt_pwd($password){
		return password_hash($password,self::Algo,self::$Options);
	}
	public static function check_pwd($password){
		return password_verify ($password , self::crypt_pwd($password));
	}
    public function encrypt($plaintext){
        $cipher = env("crypt_cipher");
        $key   =  env("crypt_key");
        if (in_array($cipher, openssl_get_cipher_methods()))
        {
            $ivlen = openssl_cipher_iv_length($cipher);
            $iv =    openssl_random_pseudo_bytes($ivlen);
            $crypt = openssl_encrypt($plaintext, $cipher, $key, $options=0, $iv);
            return $crypt;
        }else{
            return false;
        }
    }
    public function decrypt($cryptedtext){
        $cipher = env("crypt_cipher");
        $key   =  env("crypt_key");
        if (in_array($cipher, openssl_get_cipher_methods()))
        {
            $ivlen = openssl_cipher_iv_length($cipher);
            $iv =    openssl_random_pseudo_bytes($ivlen);
            $plain = openssl_decrypt($cryptedtext, $cipher, $key, $options=0, $iv);
            return $plain;
        }else{
            return false;
        }
    }
    public static function Xss($payload){
        return htmlentities(htmlspecialchars(strip_tags($payload)));
    }
    public static function Csrf(){
        $token = sha1(uniqid(mt_rand(),true));
        return $token;
    }
    public static function Redirect($url){
		if (!headers_sent()) {
			session_write_close();
		    header('Location: '.$url);
		    exit;
		}
	}
}



