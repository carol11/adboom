<?php

//if param not given, function returns all params 
function parse_php_ini($file,$param=""){

	$ini_array = parse_ini_file($file, true);

	foreach($ini_array as $key => $value){

	   	if($value=="true" || $value=="on" || $value=="1"){
	   		$value = true;
	   	}elseif($value=="false" || $value=="off" || $value=="0"){
	   		$value = false;
	   	}

		if($param){
			if(isset($key) && $key == $param){
				print $key . ": " . $value . "<br>";
			}
		}elseif(isset($key)){
			print $key . ": " . $value . "<br>";
		}
	}

}


//function "parse_php_ini('adboom.ini')" with no optional parameter returns all config file settings
parse_php_ini("adboom.ini");

print "<br>";

//function "parse_php_ini('adboom.ini','host')" with optional parameter returns config file setting for the particular parameter only
parse_php_ini("adboom.ini","host");

?>