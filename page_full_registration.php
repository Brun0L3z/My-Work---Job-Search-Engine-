<?php
		if(!empty($_POST['action']) && $_POST['action'] == 'register')
		{
			escape($_POST);
			$register_errors = array();
			$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['referer'] = BASE_URL;

			if (isset($fresher)) $fresher = $fresher;
			else $fresher = '';
			 $resume=$_FILES['resume']['name'];
			 $resume_type=getExtension($resume);
			 $tmp = $_FILES['resume']['tmp_name'];
			 $size=$_FILES['resume']['size'];
			
			// validation
			if ($name == '')
			{
				$register_errors['name'] = 'First Name is required.';
			}
			if ($city == '')
			{
				$register_errors['location'] = 'Current Location is required.';
			}
			if (isset($gender) == '')
			{
				$register_errors['gender'] = 'Gender is required.';
			}
			
			if ($fresher == '')
			{
				$register_errors['fresher'] = 'Experience details are required.';
			}
			if ($fresher != 'fresher')
			
			{
					if ($year == '')
					{
						$year = 0;
					}
					if($month == ''){
						$month = 0;
					}
					if ($month == '' && $year == '')
					{
						$register_errors['year'] = 'Total Experience is required.';
					}
					
					if ( $job_month == "" && $job_year == '')
					{
						$register_errors['duration'] = 'Duration of job is required.';
					}
					if ($job_year == '')
					{
						$job_year = 0;
					}
					if($job_month == ''){
						$job_month = 0;
					}
					if(!empty($month)){
						if($job_month > $month || $job_year > $year){
								$register_errors['duration'] = 'Your exp is morethan total exp.';
						}
					}
					else{
						if($job_year > $year){
							$register_errors['duration'] = 'Your exp is morethan total exp.';
						}
					}
					if($job_year == $year){
						if($job_month > $month){
								$register_errors['duration'] = 'Your exp is morethan total exp.';
						}
					}
					if($salary == '')
					{
						$register_errors['salary'] = 'Current salary is required.'; 
					}
					if(!empty($salary))
                    {
						if($salary == 0.0){
							$register_errors['salary'] = 'Current salary is not correct.';
						}
						if(!empty($salary)){
							if(!preg_match("/^([0-9]{0,3}+\.)+[0-9]{0,3}$/",$salary))
							 {
								$register_errors['salary'] = 'salary in given format';
							 }
							 else
							 {
								 $valid = true;
							 }
						}
					}
					if ($job_title == '')
					{
						$register_errors['jobtitle'] = 'Job Title is required.';
					}
					if ($company_name == '')
					{
						$register_errors['companyname'] = 'Company Name is required.';
					}
					if ($industry == '')
					{
						$register_errors['industry'] = 'Industry of the Company is required.';
					}
					if ($jobslist == '')
					{
						$register_errors['job'] = 'Functional area of job is required.';
					}
			}
			if($skills_name=='')
			{
				 $register_errors['skills_name'] = 'Skills are required.';
			}
			if ($qualification == '' && $qualification_outside_ro_where == '')
			{
				$register_errors['qualification'] = 'Qualification Level is required.';
			}
			if($qualification != ''){
				$errors_outside['qualification_outside_ro_where'] = 'qua';
			}
			if ($education == '' && $education_outside_ro_where == '')
			{
				$register_errors['education'] = 'Education specilization is required.';
			}
			if($education != ''){
				$errors_outside['education_outside_ro_where'] = 'edu';
			}
			if ($passout == '')
			{
				$register_errors['passout'] = 'Year of passout is required.';
			}
			if ($institutename == '')
			{
				$register_errors['institutename'] = 'Institute Name is required.';
			}
			if(empty($resume))
			{
				$register_errors['resume'] = 'Upload CV is required.';
			}
			if (!empty($resume)){
				if($resume_type == 'txt' || $resume_type == 'doc' || $resume_type == 'docx' || $resume_type == 'pdf'){
					
				}
				else{
					$register_errors['cv']="Allowed formats are txt,doc,docx,pdf only.";
				}
				if(empty($register_errors['cv'])){
					if($size >= 25165824){
						$register_errors['size']="Maximum allowed size is 3MB.";
					}
				}
			}
		
			 $id = $_SESSION['UserId'];
			
			// no register_errors, go to review page
			if (empty($register_errors))
			{
				$user = new CRegister();
				if($education_outside_ro_where != '' && $education == ''){
					$dependent = 0;
					$category = 'education_list';
					$user->others($category , $dependent , $education_outside_ro_where , $id);
				}
				if($qualification_outside_ro_where != '' && $qualification == ''){
					$dependent = 0;
					$category = 'qualification';
					$user->others($category , $dependent , $qualification_outside_ro_where , $id);
				}
				if($year == '' && $month == ''){
					$exp="0";
				}
				else
				{
					$exp = $year .",".$month;
				}
				if($job_year == '' && $job_month == ''){
					$jobexp ="0";
				}
				else{
					$jobexp = $job_year.",".$job_month;
				}
					/* SMS Code Start here */
					$sms=new WaySMS();
					$result=$sms->send("$number","Hello ".$name.",\n\nThanks for registering with scan4jobs.com.\n\nRegards,\nscan4jobs Team.");
					 
			/* SMS Code End here */
			/* email Code Start here */
					$subject =" Welcome to Scan4jobs";
					$message = "Hello&nbsp;$name&nbsp;$surname,
					<br/>
					Welcome to Scan4jobs. Now you are a registered user of Scan4jobs. With this, you have an access to thousands of jobs available for your skill set; you can easily find the best job that suits your requirement.<br/>
					In addition to this, we periodically send you career information that helps you to boost your future career prospects and latest trends in the job market.<br/>
					Our goal is to help job seekers to find the best available jobs in the industry.<br/> 
					Best Regards,<br/> 
					Scan4jobs Team.<br/>
					http://www.scan4jobs.com.";
					$mail=new Postman();
					$result=$mail->Mailreguser("$email", $subject, $message,  "admin@scan4jobs.com");

			/* email Code End here */
				$resume_name=$id."_".$resume;
				if($resume != ''){
             		$path='resumes/'.$resume_name;
				}
				move_uploaded_file($tmp,'resumes/'.$resume_name);
				$name = ucfirst($name);
				$surname = ucfirst($surname);
				$gender = ucfirst($gender);
				$job_title = ucwords($job_title);
				$institutename = ucwords($institutename);
				$company_name = ucfirst($company_name);
					if($user->insert_details($id,$name, $surname,$gender,$fresher , $city, $state ,$exp,$salary, $job_title , $company_name, $industry ,$jobslist , $jobexp , $qualification , $education ,$passout, $institutename , $skills_name , $path)){
					if($job_id !='' && $title != ''){
						$_SESSION['UserId'] =$id;
						redirect_to(BASE_URL.URL_JOB.'/'.$job_id.'/'.$title.'/');
						exit;
					}
					else
					{
						$_SESSION['UserId']=$id;
						redirect_to(BASE_URL.'home/');
						exit;
					}
			
				}
						
			}
			// if errors exist, go back and edit the post
			else
			{
				$smarty->assign('register_errors', $register_errors);
				$smarty->assign('errors_outside', $errors_outside);
			}
			
		}
			$smarty->assign('continue' , get_user_info());
			$smarty->assign('types', get_types());
			$smarty->assign('cities', get_cities());
			$smarty->assign('year', get_years());
			$smarty->assign('month', get_months());
			$smarty->assign('salary', get_salary());
			$smarty->assign('industries',get_industries());
			$smarty->assign('qualification',get_qualification());
			$smarty->assign('states', get_states());
			$smarty->assign('education', education_list());
			$smarty->assign('jobslist', jobs_list());
			$smarty->assign('passoutlist', get_year_of_passout());	
			$url=$_SERVER['QUERY_STRING'];
			parse_str($url);
			$smarty->assign('job_id' ,$job_id);
			$smarty->assign('title' ,$title);
			$smarty->assign('number' , $number);
            $smarty->assign('email' , $email);
		    $template = 'full_registration.tpl';
		
?>