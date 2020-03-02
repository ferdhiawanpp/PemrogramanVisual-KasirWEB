<?php

/*config */
 
$basepath = "http://localhost/cob/";
include 'Library/Library.php';

/*autoload*/

if (isset($_GET['F'])) {
	$cont = explode("/", $_GET['F']);
	if ($cont[1] == null) {
		$cont[1] = "index";
	}
}else{
	$cont[0] = "Controller";
	$cont[1] = "index";
}

include 'Controller/'.$cont[0].'.php';

/*spl_autoload_register(function($class){
include $class."/".$class .'.php';
});
*/ 
$class=$cont[0];
$fungsi=$cont[1];
$controller = new $class;
$controller ->$fungsi();