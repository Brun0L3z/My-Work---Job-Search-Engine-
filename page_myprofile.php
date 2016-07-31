<?php
	    $url= $_SERVER['QUERY_STRING'];
		parse_str($url);
	    $smarty->assign('id' ,  $_SESSION['UserId']);
        $smarty->assign('user', get_user_info());
		$smarty->assign('edulist', education_list());
		$smarty->assign('list', get_qualification());
		$smarty->assign('cllist', get_cities());
		$smarty->assign('states', get_states());
		$smarty->assign('others',get_others());
		$smarty->assign('other_values',get_others_values());
		$smarty->assign('sallist', get_salary());
		$smarty->assign('salary_thousands', get_salary_thousands());
		$smarty->assign('years', get_years());
	    $smarty->assign('months', get_months());
        $smarty->assign('industries', get_industries());
        $smarty->assign('area', jobs_list());
		$smarty->assign('cllist', get_cities());
		$smarty->assign('passoutlist', get_year_of_passout());
		/*Resume Modification Started here*/
		if($edit == "resumedetails"){
			$smarty->assign('edit','resume');
			if($_POST['action'] == 'useredit')
			{  
				escape($_POST);
				$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['referer'] = BASE_URL;
				 $resume=$_FILES['resume']['name'];
				 $resume_type=getExtension($resume);
				 $tmp = $_FILES['resume']['tmp_name'];
				 $size=$_FILES['resume']['size'];
				if (empty($resume))
				{
				$resume_err['resume'] = 'Upload CV is required.';

				}
			if (!empty($resume)){
					if($resume_type == 'txt' || $resume_type == 'doc' || $resume_type == 'docx' || $resume_type == 'pdf'){
						
					}
					else{
						$resume_err['cv']="Allowed formats are txt,doc,docx,pdf only.";
					}
					if(empty($resume_err['cv'])){
						if($size >= 25165824){
							$resume_err['size']="Maximum allowed size is 3MB.";
						}
					}
				} 
				if (empty($resume_err))
				{
					$resume_name=$_SESSION['UserId']."_".$resume;
					$user = new Useredit();
					$resume='resumes/'.$resume_name;
					move_uploaded_file($tmp,'resumes/'.$resume_name);
					if($user->update_resume($resume))
					{
						redirect_to(BASE_URL.'myprofile/');
						exit;
					}
				}
				else{
					$smarty->assign('resume_err', $resume_err);
				}
			}
		}
		/*Resume Modification ends here*/
		/*Skills Modification start here*/
		if($edit == "skills"){
			$smarty->assign('skills','skills');
			if($_POST['action'] =='useredit')
			{  
				escape($_POST);
				$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['referer'] = BASE_URL;
				if ($skills_name == '')
				{
					$errors['skills_name'] = 'skills are required.';
				}
				if (empty($errors))
				{	
					$user = new Useredit();
					if($user->skills($skills_name)){
						redirect_to(BASE_URL.'myprofile/');
						exit;
					}
				}
				else
				{
					$smarty->assign('errors', $errors);
				}
           	
			}
		}
		/*Skills Modfication ends here*/
		/*Education Details Modification Starts here*/
		if($edit == "education_details"){
			$smarty->assign('education_details','education_details');
			if($_POST['action'] =='useredit')
			{  
				escape($_POST);
				$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['referer'] = BASE_URL;
				if ($qualification == '' && $qualification_outside_ro_where == '')
				{
					$errors['qualification'] = 'Qualification Level is required.';
				}
			
				if ($education_specialization == '' && $education_outside_ro_where == '')
				{
					$errors['education'] = 'Education specilization is required.';
				}
				if ($passout == '')
				{
					$errors['passout'] = 'Year of passout is required.';
				}
				if ($institutename == '')
				{
					$errors['institutename'] = 'Institute Name is required.';
				}
				if (empty($errors))
				{	
					$user = new Useredit();
					if($education_outside_ro_where != ''){
						$dependent = 0;
						$category = 'education_list';
						$user->others($category , $dependent , $education_outside_ro_where);
					}
					if($qualification_outside_ro_where != ''){
						$dependent = 0;
						$category = 'qualification';
						$user->others($category , $dependent , $qualification_outside_ro_where);
					
					}
					if($user->education_details($qualification,$education_specialization,$passout,$institutename)){
						redirect_to(BASE_URL.'myprofile/');
						exit;
					}
				}
				else
				{
					$smarty->assign('errors', $errors);
				}
           	
			}
		}
		/*Education Details Modification close here*/
		if($_SESSION['UserId'] == ''){
			  $template = 'detaillogin.tpl';
		}
		else
		{
		 $template = 'myprofile.tpl';
		}
		/*SMS Activate and Deactivate*/
		 if(!empty($_POST['action']) && $_POST['action'] =='useredit')
			  {
				if($_POST['sms'] != ''){
					$user = new Useredit();
					$user->sms_activation($_POST['sms']);
					{
						redirect_to(BASE_URL.'myprofile/');
						exit;
					}
				}
			  }
		/*SMS Activate and Deactivate closed here*/
		/*Work Experience Modification Started Here*/
		if($edit == "category"){
		$smarty->assign('category','category');
		if(!empty($_POST['action']) && $_POST['action'] =='useredit')
		{  
			escape($_POST);
			$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['referer'] = BASE_URL;
		if (isset($fresher)) $fresher = $fresher;
			else $fresher = '';
			// validation
		  	if($category == '')
			{
				$errors['category'] = 'Category is required.';
			}
			 if ($category == 'experienced')
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
						$errors['year'] = 'Total Experience is required.';
					}
					
					if ( $job_month == "" && $job_year == '')
					{
						$errors['job_year'] = 'Duration of job is required.';
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
								$errors['job_year'] = 'Your exp is morethan total exp.';
						}
					}
					else{
						if($job_year > $year){
							$errors['job_year'] = 'Your exp is morethan total exp.';
						}
					}
					if($job_year == $year){
						if($job_month > $month){
								$errors['job_year'] = 'Your exp is morethan total exp.';
						}
					}
					if($salary == '')
					{
						$errors['salary'] = 'Current salary is required.'; 
					}
					if(!empty($salary))
                    {
						if($salary == 0.0){
							$errors['salary'] = 'Current salary is not correct.';
						}
						if(!empty($salary)){
							if(!preg_match("/^([0-9]{0,3}+\.)+[0-9]{0,3}$/",$salary))
							 {
								$errors['salary'] = 'salary in given format';
							 }
							 else
							 {
								 $valid = true;
							 }
						}
					}
					if ($job_title == '')
					{
						$errors['job_title'] = 'Job Title is required.';
					}
					if ($company_name == '')
					{
						$errors['company_name'] = 'Company Name is required.';
					}
					if ($industry == '')
					{
						$errors['industry'] = 'Industry of the Company is required.';
					}
					if ($functional_area == '')
					{
						$errors['job'] = 'Functional area of job is required.';
					}
			 }
			// no register_$errors, go to review page
			if (empty($errors))
			{			
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
				$user = new Useredit();
					if($user->experience_details($category,$exp,$salary,$job_title,$company_name,$industry,$functional_area,$jobexp)){
						redirect_to(BASE_URL.'myprofile/');
						exit;
					}

		}
		else
		{
			$smarty->assign('errors', $errors);
		}
	}
	}
	/*Work Experience Closed Here*/
	/*Personal details Modification start here*/
		if($edit == "personal_details"){
			$smarty->assign('personal_details','personal_details');
			if($_POST['action'] =='useredit')
			{  
				escape($_POST);
				$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['referer'] = BASE_URL;
				if ($contactnumber == '')
				{
					$errors['contactnumber'] = "Mobile No is required.";
				}
				if(!empty($contactnumber)){
					if(strlen($contactnumber) != 10)
					{
					$errors['contactnumber'] = "Enter your  Mobile No Correctly.";
					}
				}
				if ($city == '')
				{
					$errors['city'] = 'Location is required.';
				}
				if (isset($gender) == '')
				{
					$errors['gender'] = 'Gender is required.';
				}
				if (empty($errors))
				{	
					$user = new Useredit();
					if($user->personal_details($contactnumber,$city,$state,$gender)){
						redirect_to(BASE_URL.'myprofile/');
						exit;
					}
				}
				else
				{
					$smarty->assign('errors', $errors);
				}
           	
			}
		}
		/*Personal details Modfication ends here*/

	?>