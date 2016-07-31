<?php
		if(!empty($_POST['action']) && $_POST['action'] == 'register')
		{
			escape($_POST);
			$register_errors = array();
			$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['referer'] = BASE_URL;
			
			// validation
			if ($email == '')
			{
				$register_errors['email'] = 'Email ID is required.';
			}
			if(!empty($email)){
				if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) {
						 $register_errors['email'] = 'Email ID is not valid.';
					}
					else {
					$valid = true;
					}
				/*if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				 } else {
				  $register_errors['email'] = 'Email ID is not valid.';
				}*/
			}
			if ($pwd == '')
		   {
			$register_errors['pwd'] = 'Password is required.';
		   }
		   if(!empty($pwd))
		   {
			if(strlen($pwd) < 8 || strlen($pwd) > 15){
			 $register_errors['pwd'] = 'Password should be 8 to 15 characters.'; 
			}
		   }
		   if ($cpwd == '')
		   {
			$register_errors['cpwd'] = 'Confirm Password is required.';
		   }
			if(!empty($cpwd)){
				if($pwd != $cpwd)
				{
					$register_errors['match'] = "Password & Confirm Password doesn't match.";
				}
			}
			if ($contactnumber == '')
			{
				$register_errors['contactnumber'] = "Mobile No is required.";
			}
			if(!empty($contactnumber)){
				if(strlen($contactnumber) != 10)
				{
				$register_errors['contactnumber'] = "Enter your 10-digit Mobile No.";
				}
			}
			if(isset($terms) != 1){
				$register_errors['terms'] = "Please accept the terms and conditions.";
			}
			if(!isset($sms))
			{
				  $sms=0;
			}
			if(!empty($email)){
				$user = new CRegister();
				$user->userExists($email);
				$id = $user->getId();
				if($id != 0)
				{
					$register_errors['id'] = "Email ID already exits.";
					$smarty->assign('register_errors', $register_errors);
				}
				
			}
		
			
			// no register_errors, go to review page
			if (empty($register_errors))
			{
				$contactnumber=$code.$contactnumber;
				$user = new CRegister();
				$user->userExists($email);
				if($user->insert($email, $pwd,$contactnumber,$sms))
					{
						if($job_id != '' && $title != ''){

						$_SESSION['UserId'] = $user->getId();
						
					redirect_to(BASE_URL.'full_registration/?job_id='.$job_id.'&title='.$title);
						exit;
						}
						else{
							$_SESSION['UserId'] = $user->getId();
						
					redirect_to(BASE_URL.'full_registration/');
						exit;
						}
					}
				}
			
			else
			{
				$smarty->assign('register_errors', $register_errors);
			}
		}
		$url=$_SERVER['QUERY_STRING'];
		parse_str($url);
		$smarty->assign('job_id' ,$job_id);
		$smarty->assign('title' ,$title);
		$template = 'detailregistration.tpl';
?>