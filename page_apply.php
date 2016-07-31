<?php
$url=$_SERVER['QUERY_STRING'];
parse_str($url);
$j = new Job($job_id);
$data = array('company_email' => $j->mPosterEmail,
'company_name' => $j->mCompany,
'job_title' => $j->mTitle,
'apply' => $j->mApply,
'job_id' => $job_id);
$app = new JobApplication($job_id,$j->mApply);
$applicantIP = $_SERVER['REMOTE_ADDR'];
if (!$applicationTimeoutDisabled)
{
	$applicationTimeoutPassed = $app->HasApplyTimeoutPassed($applicantIP);
}
	$applicationAllowed = $applicationTimeoutDisabled || $applicationTimeoutPassed;
if ($applicationAllowed)
{
	$app->job_apply_exit($user_id);
	if($app->getRows() == 0){
	$app->Apply($applicantIP , $user_id);
	$app->Jobs_Apply();
	}
	else{
		$send ='B2C2';
	}
	$mailSender = new Postman();
	$applyMailSent = $mailSender->MailApplyOnline($data);
	if ($applyMailSent)
	{
		$_SESSION['apply_mail_sent'] = 1;
		$_SESSION['apply_successful'] = 1;
	}
	else
	{
		$_SESSION['apply_mail_sent'] = -1;
		$_SESSION['apply_successful'] = -1;
		$_SESSION['apply_fields'] = $_POST;
	}
}
else
{
		$_SESSION['apply_allowed'] =  -1;
		$_SESSION['apply_successful'] = -1;
		$_SESSION['apply_fields'] = $_POST;
}

if($send == ''){
		redirect_to(BASE_URL.'success/');
}
else{
		redirect_to(BASE_URL.'success/?fail='.$send);
}
exit;
?>