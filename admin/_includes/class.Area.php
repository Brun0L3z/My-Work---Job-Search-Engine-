<?php

class AreaList
{
	private static $instance;
	
	public static function getInstance()
	{
		if (self::$instance == null)
			self::$instance = new AreaList();
		
		return self::$instance;
	}
	
	public function updateArea($area)
	{
		global $db;
		
		$sql = 'UPDATE '.DB_PREFIX.'types_jobs
				SET name = "' . $area['name'] . '"
				WHERE id = ' . $area['id'];
		
		$db->query($sql);
	}
	
	public function deleteArea($area)
	{
		global $db;
		
		$sql = 'DELETE FROM '.DB_PREFIX.'types_jobs
				WHERE id = ' . $area['id'];
				
		$db->query($sql);
	}
	
	public function getAreaByID($areaID)
	{
		global $db;
		$area = null;
		$sql = 'SELECT id, name
		               FROM '.DB_PREFIX.'types_jobs
		               WHERE id = ' . $areaID;
		
		$result = $db->query($sql);
		
		$row = $result->fetch_assoc();
		
		if ($row)
			$area = array('id' => $row['id'], 'name' => $row['name']);
			
		return $area;  
	}
	public function insertArea($area)
	{
		global $db;
		
		$sql = 'INSERT INTO '.DB_PREFIX.'types_jobs SET name = "' . $area['name'] . '"';
		
		$db->query($sql);
	}
	//industries list
	 function getAreaList()
	{
		global $db;
		$industries = array();
		$sql = 'SELECT  id, name	FROM '.DB_PREFIX.'types_jobs
					   ORDER BY name ASC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$area[] = array('id' => $row['id'], 'name' => $row['name']);
		}
		return $area;
	}
}
?>