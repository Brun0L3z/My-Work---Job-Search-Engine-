<?php
	class Types{
		private $id;
		private $varName;
		private $cost;
		private $name;
		private $typeArray = array();
		
		public function __construct()
		{
			
		}
		
		public function getId()
		{
			return $this->id;
		}
		public function getName()
		{
			return $this->name;
		}
		public function getVarName()
		{
			return $this->varName;
		}
		
		
		public function setId($id)
		{
			$this->id = $id;
		}
		public function setVarName($varName)
		{
			$this->varName = $varName;
		}
		
		public function setName($name)
		{
			$this->name = $name;
		}
		
		public function getAllTypes()
		{
			global $db;
			$sql = 'SELECT * FROM '.DB_PREFIX.'types';
			$result = $db->query($sql);
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$this->typeArray[$i] = new Types();
				$this->typeArray[$i]->id = $row['id'];
				$this->typeArray[$i]->varName = $row['var_name'];
				$this->typeArray[$i]->name = $row['name'];
				$i++;
			}
		}
		
		public function getTypesArray()
		{
			return $this->typeArray;
		}
		public function insertType()
		{
			global $db;
			$sql = 'INSERT INTO '.DB_PREFIX.'types VALUES(null, "'.$this->name.'", "'.$this->varName.'")';
			$db->query($sql);
			$this->id = $db->insert_id;
		}
		
		public function updateType()
		{
			global $db;
			$sql = 'UPDATE '.DB_PREFIX.'types SET var_name =  "'.$this->varName.'",
				name = "'.$this->name.'"
				WHERE id='.$this->id;
			$db->query($sql);
		}
		
		public function deleteType()
		{
			global $db;
			$sql = 'DELETE FROM '.DB_PREFIX.'types
				WHERE id='.$this->id;
			$db->query($sql);
		}
		
		public function verifyAreJobs($typeId)
		{
			global $db;
			$sql = 'SELECT count(id) AS nr FROM '.DB_PREFIX.'jobs 
				WHERE type_id = '.$typeId.' GROUP BY 
				type_id';
			$result = $db->query($sql);
			
			if($row = $result->fetch_assoc())
			{
				return $row['nr'];
			}
			return false;
		}
      public function othereducateexits($education)
		{
			global $db;
			$sql_check='SELECT * FROM '.DB_PREFIX.'education_list WHERE name="'.$education.'"';
			$result = $db->query($sql_check);
			$row = $result->fetch_assoc();
			if (!empty($row))
			{
				$this->educateId = $row['id']; 
				return true;
			}
		
		}
	public function geteducateId()
 		{
 		return $this->educateId;
 		}
	 public function otherqualifyexits($qualification)
		{
			global $db;
			$sql_check='SELECT * FROM '.DB_PREFIX.'qualification WHERE qualification="'.$qualification.'"';
			$result = $db->query($sql_check);
			$row = $result->fetch_assoc();
			if (!empty($row))
			{
				$this->qualifyId = $row['id']; 
				return true;
			}
		
		}
	public function getqualifyId()
 		{
 		return $this->qualifyId;
 		}
	public function otherindustryexits($industries)
		{
			global $db;
			$sql_check='SELECT * FROM '.DB_PREFIX.'industries WHERE name="'.$industries.'"';
			$result = $db->query($sql_check);
			$row = $result->fetch_assoc();
			if (!empty($row))
			{
				$this->industryId = $row['industry_id']; 
				return true;
			}
		
		}
	public function getindustryId()
 		{
 		return $this->industryId;
 		}
	public function otherfunctionalareaexits($types_jobs)
		{
			global $db;
			$sql_check='SELECT * FROM '.DB_PREFIX.'types_jobs WHERE name="'.$types_jobs.'"';
			$result = $db->query($sql_check);
			$row = $result->fetch_assoc();
			if (!empty($row))
			{
				$this->functionalareaId = $row['id']; 
				return true;
			}
		
		}
	public function getfunctionalareaId()
 		{
 		return $this->functionalareaId;
 		}

	}
?>