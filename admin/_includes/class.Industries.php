<?php

class Industries
{
	private static $instance;
	
	public static function getInstance()
	{
		if (self::$instance == null)
			self::$instance = new Industries();
		
		return self::$instance;
	}
	
	public function updateIndustry($industry)
	{
		global $db;
		
		$sql = 'UPDATE '.DB_PREFIX.'industries
				SET name = "' . $industry['name'] . '"
				WHERE industry_id = ' . $industry['id'];
		
		$db->query($sql);
	}
	
	public function deleteIndustry($industry)
	{
		global $db;
		
		$sql = 'DELETE FROM '.DB_PREFIX.'industries
				WHERE industry_id = ' . $industry['id'];
				
		$db->query($sql);
	}
	
	public function getIndustryByID($industryID)
	{
		global $db;
		$industry = null;
		$sql = 'SELECT industry_id, name
		               FROM '.DB_PREFIX.'industries
		               WHERE industry_id = ' . $industryID;
		
		$result = $db->query($sql);
		
		$row = $result->fetch_assoc();
		
		if ($row)
			$industry = array('id' => $row['industry_id'], 'name' => $row['name']);
			
		return $industry;  
	}
	public function insertIndustry($industry)
	{
		global $db;
		
		$sql = 'INSERT INTO '.DB_PREFIX.'industries SET name = "' . $industry['name'] . '"';
		
		$db->query($sql);
	}
	//industries list
	 function getindustries()
	{
		global $db;
		$industries = array();
		$sql = 'SELECT  industry_id, name	FROM '.DB_PREFIX.'industries
					   ORDER BY name ASC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$industries[] = array('id' => $row['industry_id'], 'name' => $row['name']);
		}
		return $industries;
	}
}
?>