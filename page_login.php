 <?php
		if(!empty($_POST['action']) && $_POST['action'] == 'login')
		{
			escape($_POST);
			$errors = array();
			
			$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['referer'] = BASE_URL;
			
			// validation
			if ($username == '')
			{
				$errors['username'] = 'Email ID is required.';
			}
			if(!empty($username)){
				if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $username)) {
						$errors['username'] = 'Email ID is not valid.';
					}
					else {
					$valid = true;
					}
			}
			if ($password == '')
			{
				$errors['password'] = 'Password is required.';
			}
			
			// no errors, go to review page
			if (empty($errors))
			{
				require_once '_includes/class.User.php';
				$admin = new CUser();
				
				if($admin->login($username, $password))
				{
					$_SESSION['UserId'] = $admin->getId();
					redirect_to(BASE_URL.'home/');
					exit;
				}
				else
				{
					$errors['incorrect'] = 'Incorrect Email ID or Password';
					$smarty->assign('errors', $errors);
				}
			}
			// if errors exist, go back and edit the post
			else
			{
				$smarty->assign('errors', $errors);
			}
		}
			define('NUMBER_OF_LATEST_JOBS_TO_GET', $settings['latest_jobs']);
		$job = new Job();
		$smarty->assign('latest_jobs', $job->GetJobs(0, 0, NUMBER_OF_LATEST_JOBS_TO_GET, 0, 0));
		$template = 'login.tpl';
		
?>