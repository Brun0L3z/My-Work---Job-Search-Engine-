<?php
 class CRegister
 {
 	private $userId;
 	private $name;
	private $pwd;
 	private $email;
 
 	public function __construct(){}
 	
 	public function insert($email, $pwd, $contactnumber,$sms)
 	{
 		global $db;	
		$sql = 'INSERT INTO '.DB_PREFIX.'user_info(email,password,contact_number,sms) VALUES ( "'.$email.'","'.md5($pwd).'" ,"'.$contactnumber.'","'.$sms.'")';
		$result = $db->query($sql);
		//Going to home page after registration successfull
		$sql = 'SELECT id FROM '.DB_PREFIX.'user_info WHERE email="'.$email.'"';
	
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		if (!empty($row))
		{
			$this->userId = $row['id']; 
			return true;
		}

		return false;
		
 	}
	//Checking for emailid is alerdy available or not.
	public function userExists($email){
		global $db;
		$sql_check='SELECT * FROM '.DB_PREFIX.'user_info WHERE email="'.$email.'"';
		$result = $db->query($sql_check);
		$row = $result->fetch_assoc();
		if (!empty($row))
		{
			$this->userId = $row['id']; 
			return true;
		}
		
	}
	public function getId()
 	{
 		return $this->userId;
 	}

	public function insert_details($id,$name, $surname,$gender,$fresher , $city, $state ,$exp,$salary, $job_title , $company_name, $industry ,$jobslist , $jobexp , $qualification , $education , $passout,$institutename ,  $skills , $path)
 	{
 		global $db;	
		
		$sql="UPDATE user_info SET firstname='$name',lastname='$surname',gender='$gender',category='$fresher',city_id='$city',state_id='$state',total_exp='$exp',salary='$salary',job_title='$job_title',company_name='$company_name',industry='$industry',functional_area='$jobslist',latest_job_exp='$jobexp', qualification='$qualification',education_specialization='$education',year_of_passout='$passout' ,institute_name='$institutename',skills='$skills',resume_path='$path', created_date=NOW() WHERE id='$id' ";
		$result = $db->query($sql);
		return true;
 	}
	public function check_password($oldpassword,$id)
	 {
		global $db;	
		 $sql='SELECT * FROM '.DB_PREFIX.'user_info WHERE id='.$id.' and password = "'.md5($oldpassword).'"';
		$result = $db->query($sql);
		$rows = $db->QueryNumRows($sql);
		if(!empty($rows)){
			$this->rows = $rows;
		}
		return true;
	 }
	public function change_password($pwd,$id)
	 {
		global $db;
		 $sql = 'UPDATE user_info SET password = "'.md5($pwd).'" WHERE id = "'.$id.'"';
		 $db->query($sql);
		 return true;
	}
	public function getRows()
 	{
 		return $this->rows;
 	}
	public function others($category , $dependent , $others , $id){
		global $db;
		$sql = "INSERT INTO others( category, dependent, others, user_id) VALUES ('".$category."',".$dependent.", '".$others."',".$id.")";
		$db->query($sql);
	}
	
 	
 }
?>