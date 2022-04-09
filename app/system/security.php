<?php 
namespace SYSTEM;
class Security{
	public static $Options;
	public static function crypt_pwd($password){
		return password_hash($password,PASSWORD_BCRYPT);
	}
	public static function check_pwd($password,$hash){
		return password_verify($password , $hash);
	}
    public static function encrypt($plaintext){
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
    public static function decrypt($cryptedtext){
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
        SYSTEM\Session::set('token',$token);
        echo "<input type='hidden' value='$token'>";//return  $token;
    }
    public static function Redirect($url){
		if (!headers_sent()) {
			session_write_close();
		    header('Location: '.$url);
		    exit;
		}
	}

    public static function filterInput($val){
        return trim(htmlentities(htmlspecialchars(strip_tags($val))));
    }

    public static function lfi($page,$path){
        if(isset($page) && isset($path)){
            $files = scandir($path);
            if(in_array($page,$files)){
                return $path."/".$page.".php";
            }

        }
        return $path."/404.php";
    }
}



