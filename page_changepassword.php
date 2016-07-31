<?php
if(!empty($_POST['action']) && $_POST['action'] == 'register')
{
	escape($_POST);
	$register_errors = array();
	$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
	$_SESSION['referer'] = BASE_URL;
	// validation
	if ($oldpassword == '')
	{
		$register_errors['oldpassword'] = 'Old password is required.';
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
			if(!empty($cpwd))
			{
				if($pwd != $cpwd)
				{
					$register_errors['match'] = "Password & Confirm Password doesn't match.";
				}
			}
			// no register_errors, go to review page
			if (empty($register_errors))
			{
				$user = new CRegister();
				$user->check_password($oldpassword,$id);
				$rows = $user->getRows();
				if(!empty($rows))
				{
					if($user->change_password($pwd,$id))
						{
						  redirect_to(BASE_URL.'myprofile/');
							exit;
						}
				}
				else
					{
					$register_errors['match'] = "Old password  doesn't match.";
					$smarty->assign('register_errors', $register_errors);
					}
			}
			// if errors exist, go back and edit the post
			else
			{
				$smarty->assign('register_errors', $register_errors);
			}
}
		$smarty->assign('user', get_user_info());
		$template = 'changepassword.tpl';
?>