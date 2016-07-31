<?php

class QualificationList
{
	private static $instance;
	
	public static function getInstance()
	{
		if (self::$instance == null)
			self::$instance = new QualificationList();
		
		return self::$instance;
	}
	
	public function updateQualification($qualification)
	{
		global $db;
		
		$sql = 'UPDATE '.DB_PREFIX.'qualification
				SET qualification = "' . $qualification['name'] . '"
				WHERE id = ' . $qualification['id'];
		
		$db->query($sql);
	}
	
	public function deleteQualification($qualification)
	{
		global $db;
		
		$sql = 'DELETE FROM '.DB_PREFIX.'qualification
				WHERE id = ' . $qualification['id'];
				
		$db->query($sql);
	}
	
	public function getQualificationByID($qualificationID)
	{
		global $db;
		$qualification = null;
		$sql = 'SELECT id, qualification
		               FROM '.DB_PREFIX.'qualification
		               WHERE id = ' . $qualificationID;
		
		$result = $db->query($sql);
		
		$row = $result->fetch_assoc();
		
		if ($row)
			$qualification = array('id' => $row['id'], 'name' => $row['qualification']);
			
		return $qualification;  
	}
	public function insertQualification($qualification)
	{
		global $db;
		
		$sql = 'INSERT INTO '.DB_PREFIX.'qualification SET qualification = "' . $qualification['name'] . '"';
		
		$db->query($sql);
	}
	//qualification list
	 function getqualification()
	{
		global $db;
		$qualification = array();
		$sql = 'SELECT  id, qualification	FROM '.DB_PREFIX.'qualification
					   ORDER BY qualification ASC';
		$result = $db->query($sql);
		while ($row = $result->fetch_assoc())
		{
			$qualification[] = array('id' => $row['id'], 'name' => $row['qualification']);
		}
		return $qualification;
	}
}
?>