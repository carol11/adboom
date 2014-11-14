<?php

//if param not given, function returns all params 
function parse_php_ini($file,$param=""){

	$count = 0;
	$fh = fopen($file, "r");
	
	while(!feof($fh)){
		$count++;
	    $line = fgets($fh);

	    $newLine = $line.$count;
	   	
	   	$newLine = explode("=",$line);
	   	$newLine[0] = trim($newLine[0]);
	   	$newLine[1] = trim($newLine[1]);
	   	
	   	if($newLine[1]=="true" || $newLine[1]=="on" || $newLine[1]=="1"){
	   		$newLine[1] = true;
	   	}elseif($newLine[1]=="false" || $newLine[1]=="off" || $newLine[1]=="0"){
	   		$newLine[1] = false;
	   	}

	   	if(!$param && substr(trim($line), 0, 1) != '#' && strlen(trim($line)) > 1){
	   		print $newLine[0].": ".$newLine[1]."<br>";
	   	}else{
	   		if($newLine[0]==$param){
	   			print $newLine[0].": ".$newLine[1]."<br>";
	   		}
	   	}
		
	}

	fclose($file);

}


//function "parse_php_ini('adboom.ini')" with no optional parameter returns all config file settings
parse_php_ini("adboom.ini");

print "<br>";

//function "parse_php_ini('adboom.ini','host')" with optional parameter returns config file setting for the particular parameter only
parse_php_ini("adboom.ini","host");

?>