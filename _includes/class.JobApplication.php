<?php

class JobApplication
{
var $mJobId = false;
var $mApply = false;
	function __construct($job_id , $apply)
	{ 
		$this->mJobId = $job_id;
		$this->mApply = $apply;
	}
	function getRows()
	{
		return $this->rows;
	}
	public function job_apply_exit($user_id){
	global $db;
	$sql = 'SELECT job_id,user_id FROM '.DB_PREFIX.'job_applications WHERE job_id = '.$this->mJobId .' AND user_id = '.$user_id;
	$db->query($sql);
	$rows = $db->QueryNumRows($sql);
		if (!empty($rows))
		{
			$this->rows = $rows; 
		}
	}
	public function Apply($ip,$user_id)
	{
		global $db;
		$sql = 'INSERT INTO '.DB_PREFIX.'job_applications (job_id, created_on, ip, user_id)
		VALUES (' . $this->mJobId . ', NOW(), "' . $ip . '","'. $user_id .'")';
		$db->query($sql);
	}

	public function Jobs_Apply()
	{
		global $db;
		$sql = 'UPDATE jobs SET apply = '.$this->mApply.'+1 WHERE id = '.$this->mJobId;
		$db->query($sql);
	}
	public function HasApplyTimeoutPassed($ip)
	{
		global $db;
		$sql = 'SELECT id
		FROM '.DB_PREFIX.'job_applications
		WHERE ip = "' . $ip . '" AND DATE_SUB(NOW(), INTERVAL ' . MINUTES_BETWEEN_APPLY_TO_JOBS_FROM_SAME_IP . ' MINUTE) < created_on';
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return empty($row);
	}
	public function Count()
	{
		global $db;
		$sql = 'SELECT COUNT(id) AS count FROM '.DB_PREFIX.'job_applications WHERE job_id = ' . $this->mJobId;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
		return $row['count'];
	}
}
?>