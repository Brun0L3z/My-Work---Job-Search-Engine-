<?php
	if(!empty($_POST['action']) && $_POST['action'] =='useredit')
		{  
			
			escape($_POST);
			$_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['referer'] = BASE_URL;
				
		if (isset($fresher)) $fresher = $fresher;
			else $fresher = '';
			 $resume=$_FILES['resume']['name'];
			 $resume_type=getExtension($resume);
			 $tmp = $_FILES['resume']['tmp_name'];
			 $size=$_FILES['resume']['size'];
			
			// validation
				if ($firstname == '')
	{
	$errors['firstname'] = 'First Name is required.';
	}
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
		
		
	         	if ($category == '')
			{
			  
				$errors['category'] = 'Category is required.';
			
			}
			 
			 if ($category == 'experienced')
			{
			  	
				if ($year == '')
					{
					       
						$errors['year'] = 'Total Experience is required.';
					}

					  if($salary == '')
					{
						
						$errors['salary'] = 'Current salary is required.'; 
					}
					if(!empty($salary))
                         {
		             if(!preg_match("/^([0-9]{0,3}+\.)+[0-9]{0,3}$/",$salary))
			             {
			           $errors['salary'] = 'Enter salary in given format';
			               }
			               else
			                {
				           $valid = true;
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
						
						$errors['industry'] = 'Company Industry is required.';
					}
                    if ($functional_area == '')
					{
					$errors['job'] = '  Job area is required.';
					}
					if ($job_year == '')
					{
						
						$errors['job_year'] = 'Job Duration is required.';
					}
					if($job_year > $year)
						{
						$err=$errors['job_year'] = 'Your exp is morethan total exp.';
					}
			 
			 }
				if ($qualification == '')
			{
				$errors['qualification'] = 'Qualification Level is required.';
			}
		
			if ($education_specialization == '')
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
            if ($skills_name == '')
			{
				$errors['skills_name'] = 'skills are required.';
			}
			if (empty($resume))
			{
				$errors['resume'] = 'Upload CV is required.';

			}
			if (!empty($resume)){
				if($resume_type == 'txt' || $resume_type == 'doc' || $resume_type == 'docx' || $resume_type == 'pdf'){
					
				}
				else{
					$errors['cv']="Allowed formats are txt,doc,docx,pdf only.";
				}
				if(empty($errors['cv'])){
					if($size >= 25165824){
						$errors['size']="Maximum allowed size is 3MB.";
					}
				}
			} 
		
			 $id = $_SESSION['UserId'];
			
			// no register_$errors, go to review page
			if (empty($errors))
			{			
             $resume_name=$id."_".$resume;
				if($years == '' && $month == ''){
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
				
				if($skills_name == '' && $skillsexp == '' ){
					$skills == "0";
				}
				else{
					if($skillsexp == ''){
						$skillsexp = "0";
						$skills = $skills_name.",".$skillsexp;
					}
					else{
						$skills = $skills_name.",".$skillsexp;
					}
				}
			
			$user = new Useredit();
		    $resume='resumes/'.$resume_name;
			move_uploaded_file($tmp,'resumes/'.$resume_name);
			if($user->insert ($contactnumber,$city,$state,$gender,$category,$exp,$firstname,$lastname,
	$salary,$qualification,$education_specialization,$passout,$institutename,$skills,$resume,$job_title,$company_name,$industry,$functional_area,$jobexp))
			{
				
					redirect_to(BASE_URL.'myprofile/');
					exit;
            }

		}
		else
		{
			$smarty->assign('errors', $errors);
		}
	}
	    $smarty->assign('id' ,  $_SESSION['UserId']);
		$smarty->assign('user', get_user_info());
        $smarty->assign('education_list', education_list());
		$smarty->assign('passoutlist', get_year_of_passout());	
		$smarty->assign('states', get_states());
		$smarty->assign('year_of_passout', get_year_of_passout());
		$smarty->assign('salary', get_salary());
	    $smarty->assign('cities', get_cities());
		$smarty->assign('month', get_months());
	    $smarty->assign('qualification', get_qualification());
		$smarty->assign('year', get_years());
		$smarty->assign('jobslist', jobs_list());
		 $smarty->assign('industries',get_industries());
		$smarty->assign('exlist', get_years());
	   	$template = 'useredit.tpl';
?>