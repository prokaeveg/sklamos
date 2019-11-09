<?php 

	function clear_string($cl_str, $connection){
	$cl_str = strip_tags($cl_str);
    $cl_str = mysqli_real_escape_string($connection, $cl_str);
    $cl_str = trim($cl_str);

    return $cl_str;
	}

	function check_symbol($value, $field_name, $required, $pattern){
		if ($required == "1" && empty($value)) {
		$GLOBALS['alert'] = $GLOBALS['alert'].'Поле \"'.$field_name.'\" не заполнено'.'\n';
		return 0;
		}
		$value = trim($value);
		$value = stripslashes($value);
		$value = strip_tags($value);
		$value = htmlspecialchars($value);
		if ($pattern != "0") {
		if (!empty($value) && !preg_match($pattern, $value, $matches)) $GLOBALS['alert'] = $GLOBALS['alert'].'Значение в поле \"'.$field_name.'\" не соответствует шаблону'.'\n';
		}
		return $value;
	}

	function group_numerals($int){
    
    	switch (strlen($int)) {

		    case '4':
	        
		        $price = substr($int,0,1).' '.substr($int,1,4);

			    break;

		    case '5':
	        
		        $price = substr($int,0,2).' '.substr($int,2,5);

			    break;

		    case '6':
	        
		        $price = substr($int,0,3).' '.substr($int,3,6);

			    break;

		    case '7':
	        
		        $price = substr($int,0,1).' '.substr($int,1,3).' '.substr($int,4,7);

			    break;
	        
		    default:
	        
		        $price = $int;
		        
			    break;

		}
	    return $price; 
	}
 ?>