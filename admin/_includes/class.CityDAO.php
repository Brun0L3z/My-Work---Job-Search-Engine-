<?php

class CityDAO
{
	private static $instance;
	
	public static function getInstance()
	{
		if (self::$instance == null)
			self::$instance = new CityDAO();
		
		return self::$instance;
	}
	
	public function updateCity($city)
	{
		global $db;
		
		$sql = 'UPDATE '.DB_PREFIX.'cities
				SET name = "' . $city['name'] . '"
				, ascii_name = "' . $city['ascii_name'] . '"
				, state_id = "' . $city['state_id'] . '"
				WHERE id = ' . $city['id'];
		
		$db->query($sql);
	}
	
	public function deleteCity($city)
	{
		global $db;
		
		$sql = 'DELETE FROM '.DB_PREFIX.'cities
				WHERE id = ' . $city['id'];
		
		$db->query($sql);
	}
	
	public function getCityByID($cityID)
	{
		global $db;
		
		$city = null;
		
		$sql = 'SELECT id, name, ascii_name, state_id
		               FROM '.DB_PREFIX.'cities
		               WHERE id = ' . $cityID;
		
		$result = $db->query($sql);
		
		$row = $result->fetch_assoc();
		
		if ($row)
			$city = array('id' => $row['id'], 'name' => $row['name'], 'ascii_name' => $row['ascii_name'], 'state_id' => $row['state_id']);
			
		return $city;  
	}
	
	public function getCityByAsciiName($ascii_name)
	{
		global $db;
		
		$city = null;
		
		$sql = 'SELECT id, name, state_id
		               FROM '.DB_PREFIX.'cities
		               WHERE ascii_name = "' . $ascii_name . '"';
	
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		
		if ($row)
			$city = array('id' => $row['id'], 'name' => $row['name'], 'state_id' => $row['state_id']);
			
		return $city;
	}
	
	public function insertCity($city)
	{
		global $db;
		
		$sql = 'INSERT INTO '.DB_PREFIX.'cities SET name = "' . $city['name'] . '", ascii_name = "' . $city['ascii_name'] . '", state_id = "' . $city['state_id'] . '"';
		
		$db->query($sql);
	}
	
	function getCities()
	{
		global $db;
		
		$cities = array();
		
		$sql = 'SELECT id, name, ascii_name, state_id
		               FROM '.DB_PREFIX.'cities
		               ORDER BY name ASC';
		
		$result = $db->query($sql);
		
		while ($row = $result->fetch_assoc())
		{
			$cities[] = array('id' => $row['id'], 'name' => $row['name'], 'ascii_name' => $row['ascii_name'], 'state_id' => $row['state_id']);
		}
		
		return $cities;
	}
}
?>