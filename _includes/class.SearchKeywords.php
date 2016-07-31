<?php

class SearchKeywords
{
	var $mKeywords = false;
	
	function __construct($keywords)
	{ 
		$this->mKeywords = $keywords;
	}
	
	// save recorded keywords, if available
	public function Save()
	{
		global $db;
		$sql = 'INSERT INTO '.DB_PREFIX.'searches (keywords, created_on) VALUES ("' . $this->mKeywords . '", NOW())';
		$db->query($sql);
	}
}
?>