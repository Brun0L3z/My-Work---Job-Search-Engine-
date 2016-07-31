<?php
	$user = new Userlist();
	if($user->Deleteuser($_POST['job_id']))
		echo 1;
	else
		echo "0";
	exit;
	
?>