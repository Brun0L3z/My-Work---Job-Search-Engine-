<?php

function escape($what)
{
	global $db;

	foreach ($what as $variable => $value)
	{
		if (is_string($value) || is_numeric($value))
		{
			$GLOBALS[$variable] = $db->real_escape_string(strip_tags($value));
		}
		else
		{
			$GLOBALS[$variable] = $value;
		}
	}
}
?>