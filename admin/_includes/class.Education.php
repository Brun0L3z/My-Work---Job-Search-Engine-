<?php

class EducationList
{
	private static $instance;
	
	public static function getInstance()
	{
		if (self::$instance == null)
			self::$instance = new EducationList();
		
		return self::$instance;
	}
	
	public function updateEducation($area)
	{
		global $db;
		
		$sql = 'UPDATE '.DB_PREFIX.'education_list
				SET name = "' . $area['name'] . '"
				WHERE id = ' . $area['id'];
		
		$db->query($sql);
	}
	
	public function deleteEducation($area)
	{
		global $db;
		
		$sql = 'DELETE FROM '.DB_PREFIX.'education_list
				WHERE id = ' . $area['id'];
				
		$db->query($sql);
	}
	
	public function getEducationByID($areaID)
	{
		global $db;
		$area = null;
		$sql = 'SELECT id, name
		               FROM '.DB_PREFIX.'education_list
		               WHERE id = ' . $areaID;
		
		$result = $db->query($sql);
		
		$row = $result->fetch_assoc();
		
		if ($row)
			$area = array('id' => $row['id'], 'name' => $row['name']);
			
		return $area;  
	}
	public function insertEducation($area)
	{
		global $db;
		
		$sql = 'INSERT INTO '.DB_PREFIX.'education_list SET name = "' . $area['name'] . '"';
		
		$db->query($sql);
	}
	//industries list
	 function getEducationList()
	{
		global $db;
		$industries = array();
		$sql = 'SELECT  id, name	FROM '.DB_PREFIX.'education_list
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