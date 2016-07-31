<?php

class Maintenance
{
	
	function __construct()
	{ }
	
	// delete temporary posts older than 2 days
	public function DeleteTemporaryJobs()
	{
		global $db;
		$sql = 'DELETE FROM '.DB_PREFIX.'jobs WHERE created_on < DATE_SUB(NOW(), INTERVAL 1 DAY) AND is_temp = 1 AND is_active = 0';
		$db->Execute($sql);
	}
}
?>