<?php
class Useredit
{
	private $userId;
	private $email;
	private $username;
	public function __construct(){}
	public function personal_details($contact_number,$city_id,$state_id,$gender)
	{
		global $db;
		$sql = 'UPDATE '.DB_PREFIX.'user_info SET	contact_number="'.$contact_number.'",city_id="'.$city_id.'",state_id="'.$state_id.'",
		gender="'.$gender.'",recent_login = NOW()where id="'.$_SESSION['UserId'].'"';
		$result = $db->query($sql);
		return true;
	}
	public function sms_activation($sms){
		global $db;
		$sql = 'UPDATE '.DB_PREFIX.'user_info SET sms='.$sms.' WHERE id='.$_SESSION['UserId'] ;
		$db->query($sql);
		return true;
   }
   public function update_resume($resume){
	   global $db;
	   $sql = 'UPDATE '.DB_PREFIX.'user_info SET resume_path="'.$resume.'",recent_login = NOW() WHERE id='.$_SESSION['UserId'].'';
	   $db->query($sql);
	   return true;
   }
   public function skills($skills){
	  global $db;
	   $sql = 'UPDATE '.DB_PREFIX.'user_info SET skills="'.$skills.'",recent_login = NOW() WHERE id='.$_SESSION['UserId'].'';
	   $db->query($sql);
	   return true;
	}
	public function education_details($qualification,$education_specialization,$passout,$institute){
	   global $db;
		$sql = 'UPDATE '.DB_PREFIX.'user_info SET qualification="'.$qualification.'",
		education_specialization="'.$education_specialization.'",year_of_passout="'.$passout.'",
		institute_name="'.$institute.'",recent_login = NOW() WHERE id='.$_SESSION['UserId'].'';
	   $db->query($sql);
	   return true;

	}
	public function experience_details($category,$exp,$salary,$job_title,$company_name,$industry,$functional_area,$jobexp)
	{
		global $db;
		$id=$_SESSION['UserId'] ;
		$sql = 'UPDATE '.DB_PREFIX.'user_info SET	category="'.$category.'",total_exp="'.$exp.'",salary="'.$salary.'",job_title="'.$job_title.'", company_name="'.$company_name.'", 	industry="'.$industry.'",functional_area="'.$functional_area.'",latest_job_exp="'.$jobexp.'",recent_login = NOW()where id="'.$id.'"';
		$result = $db->query($sql);
		return true;
	}
	public function others($category , $dependent , $others){
		global $db;
		$sql = 'UPDATE '.DB_PREFIX.'others SET category="'.$category.'",dependent="'.$dependent.'",others="'.$others.'" WHERE user_id='.$_SESSION['UserId'].' AND category="'.$category.'"';
			$db->query($sql);
	}

}
?>