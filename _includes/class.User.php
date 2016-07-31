<?php
 class CUser
 {
 	private $userId;
 	private $username;
 	private $email;
 	
 	public function __construct(){}
 	
 	public function login($email, $password)
 	{
 		global $db;
		$sql = 'SELECT id FROM '.DB_PREFIX.'user_info WHERE email="'.$email.'" AND password="'.md5($password).'"';
	
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		if (!empty($row))
		{
			$this->userId = $row['id']; 
			return true;
		}
		return false;
 	}
 	
 	public function getId()
 	{
 		return $this->userId;
 	}
 }
?>