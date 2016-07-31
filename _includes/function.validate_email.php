<?php

function validate_email($string) 
{
	if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/i", $string))
	{
    return true;
	}
	else
	{
    return false;
	}
}

?>