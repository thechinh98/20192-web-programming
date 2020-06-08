<?php
 
/** Check if environment is development and display errors **/
 
function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
    error_reporting(E_ALL);
    ini_set('display_errors','On');
    
} else {
    error_reporting(E_ALL);
    ini_set('display_errors','Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
}
 
/** Check for Magic Quotes and remove them **/
 
function stripSlashesDeep($value) {
   $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
    return $value;
}

function removeMagicQuotes() {
if ( get_magic_quotes_gpc() ) {
    $_GET    = stripSlashesDeep($_GET   );
    $_POST   = stripSlashesDeep($_POST  );
    $_COOKIE = stripSlashesDeep($_COOKIE);
}
}

/** Check register globals and remove them **/
function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
       foreach ($array as $value) {
           foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                   unset($GLOBALS[$key]);
                }
            }
        }
    }
}
 /** Main Call Function **/

function callHook() {
   global $url;
 
    $urlArray = array();
    $urlArray = explode("/",$url);

    $controller = $urlArray[0];
   array_shift($urlArray);
   $action = $urlArray[0];
   array_shift($urlArray);
    $queryString = $urlArray;

61.    $controllerName = $controller;
62.    $controller = ucwords($controller);
63.    $model = rtrim($controller, 's');
64.    $controller .= 'Controller';
65.    $dispatch = new $controller($model,$controllerName,$action);
66. 
67.    if ((int)method_exists($controller, $action)) {
68.        call_user_func_array(array($dispatch,$action),$queryString);
69.    } else {
70.        /* Error Generation Code Here */
71.    }
72.}
73. 
74./** Autoload any classes that are required **/
75. 
76.function __autoload($className) {
77.    if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
78.        require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
79.    } else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
80.        require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
81.    } else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
82.        require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
83.    } else {
84.        /* Error Generation Code Here */
85.    }
86.}
87. 
88.setReporting();
89.removeMagicQuotes();
90.unregisterGlobals();
91.callHook();
