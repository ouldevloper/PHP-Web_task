<?php

namespace APP\SYSTEM;
class Application{

	private static $instance;
	protected static $_uri 				= [];      
	protected static $_method			= []; 
	protected static $requestMethods 	= [];
	private $callback;
    private $controller;
    private $action;
    private $params = [];

    private function __construct(){
    	$this->parseUrl();
    }

    public static function getInstance(){
		if(self::$instance == null)
			self::$instance = new static;
		return self::$instance;
	}

    private function parseUrl(){    	
    	$uri = preg_replace('#(/)+#', '/', $_SERVER['REQUEST_URI']); 
    	//$uri = isset($_GET['uri'])?$_GET['uri']:/*'/';/*/$_SERVER['REQUEST_URI'];
    	//$uri = preg_replace('#(/)+#', '/', $uri);  	
        $requestUri = (isset($uri) and !empty($uri) and $uri != '/') ? trim($uri,'/'):'/';
		foreach (self::$_uri as $key => $value) {
			
			$tmp = $this->generatePattern($value);
			if(preg_match("#^$tmp$#", $requestUri)){
				if(strtolower(self::$requestMethods[$key]) == strtolower($_SERVER['REQUEST_METHOD'])){
					$this->getParams($value,$requestUri);
					if(is_callable(self::$_method[$key])){
						$this->callback = self::$_method[$key];
					}else{
						if(@strpos(self::$_method[$key],'@')){
							$tmp = explode('@', self::$_method[$key]);
							if(is_array($tmp)){
								if(isset($tmp[0]) && $tmp[0]!=''){
									$this->controller = $tmp[0];
								}
								if(isset($tmp[1]) && $tmp[1]!=''){
									$this->action = $tmp[1];
								}
							}	
						}	
					}	
				}
			}
		}       
    }

    public function run(){
 		if($this->callback != null){
 			call_user_func($this->callback);
        }else{
        	$className ='';
        	if(!empty($this->controller)){
        		$className = 'OULDEVELOPER\\Controllers\\'.ucfirst(strtolower($this->controller)).'Controller';
	        	$actionName = $this->action;
        	}
	        if(!class_exists($className) ) {
	            //$this->controller = 'Error';
	            //$className = '\\OULDEVELOPER\\Controllers\\Errors\\ErrorController';
	            //$actionName = 'not Found";
	        }

	        if(!method_exists($className,$actionName)){
	            $actionName = 'notfound';
	        }      
	        $cntrl= new $className;
	        $cntrl->setController($this->controller);
	        $cntrl->setAction($this->action);
	        $cntrl->setParams($this->params);
	        $cntrl->$actionName();
         }
        
    }

    private function generatePattern($url){
		$url = explode('/', trim($url,'/'));
		if(is_array($url)){
			foreach ($url as $key => $value) {
				if(empty($url[$key])){
					unset($url[$key]);
				}else{
					$url[$key] = preg_replace('#^\{(.)+\}$#', '(.)+', $value);
				}
			}
		}
		return implode('/', $url);
	}

	private function getParams($route,$url){
		$route = explode('/', trim($route,'/'));
		$val = explode('/', trim($url,'/'));
		if(is_array($route) and is_array($val)){
			foreach ($route as $key => $value) {
				if(empty($route[$key]) || empty($val[$key])){
					unset($route[$key]);
					unset($val[$key]);		
				}else{					
					if(preg_match('#^\{(.)+\}$#', $value)){
						$param = str_replace(['{','}'], '', $value);
						$this->params[$param] = $val[$key];
					}
				}
			}
		}
	}
}