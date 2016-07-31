<?php
$url=$_SERVER['QUERY_STRING'];
parse_str($url);

if($_GET['other'] == 'data') 
	{
       if($_GET['name']) 
		   {
		   if($category=="education_list")  
			   {
			  $education=mysql_real_escape_string($_GET['name']);
			  if($education)
				   {
					$educate = new Types();
						$educate->othereducateexits($education);
						$id = $educate->geteducateId();
					    if($id != 0)
						{
						?>
							<script type="text/javascript">
							window.alert("This category is already in database others value is stored in user table!");
							</script>
						<?php
						 $sql="UPDATE user_info SET education_specialization='$id' WHERE id='$user' ";
						$result = $db->query($sql);
						}
						else
						{
                         $query = " INSERT INTO education_list (name) VALUES ('".mysql_real_escape_string($_GET['name'])."')";
					mysql_query($query);
					$id = mysql_insert_id();
					$sql="UPDATE user_info SET education_specialization='$id' WHERE id='$user' ";
					$result = $db->query($sql);
					$sql = "DELETE FROM others WHERE user_id='$user' and category='education_list'";
					$result = $db->query($sql);
					}
				
					}
			   }
			 elseif($category=="qualification")  
			   {
			$qualification=mysql_real_escape_string($_GET['name']);
			  if($qualification)
				   {
					$qualify = new Types();
						$qualify->otherqualifyexits($qualification);
						$id = $qualify->getqualifyId();
					    if($id != 0)
						{
						?>
						<script type="text/javascript">
						window.alert("This category is already in database others value is stored in user table!");
						</script>
						<?php
						 $sql="UPDATE user_info SET qualification='$id' WHERE id='$user' ";
						$result = $db->query($sql);
						}
						else
						{
                    $query = " INSERT INTO qualification (qualification) VALUES ('".mysql_real_escape_string($_GET['name'])."')";
					mysql_query($query);
					$id = mysql_insert_id();
					$sql="UPDATE user_info SET qualification='$id' WHERE id='$user' ";
					$db->query($sql);
					$query = "DELETE FROM others WHERE user_id='$user' and category='qualification'";
					  $db->query($query);
						}
				
					}
			   }
			    elseif($category=="industries")  
			   {
				$industries=mysql_real_escape_string($_GET['name']);
				if($industries)
				   {
					$industry = new Types();
						$industry->otherindustryexits($industries);
						$id = $industry->getindustryId();
						if($id != 0)
						{
        				?>
						<script type="text/javascript">
						window.alert("This category is already in database others value is stored in user table!");
						</script>
						<?php
						$sql="UPDATE user_info SET industry='$id' WHERE id='$user' ";
						$result = $db->query($sql);
							 
						}
						else
						{
                    $query = " INSERT INTO industries (name) VALUES ('".mysql_real_escape_string($_GET['name'])."')";
					mysql_query($query);
					$id = mysql_insert_id();
					$sql="UPDATE user_info SET industry='$id' WHERE id='$user' ";
						}
				
					}
			   }
			   elseif($category=="types_jobs")  
			   {
				 $types_jobs=mysql_real_escape_string($_GET['name']);
				 if($types_jobs)
				   {
					$functionalarea = new Types();
						$functionalarea->otherfunctionalareaexits($types_jobs);
						$id = $functionalarea->getfunctionalareaId();
						if($id != 0)
						{
        				?>
						<script type="text/javascript">
						window.alert("This category is already in database others value is stored in user table!");
						</script>
						<?php
						$sql="UPDATE user_info SET functional_area='$id' WHERE id='$user' ";			
						$result = $db->query($sql);
						}
						else
						{	 
					$query = " INSERT INTO types_jobs (name) VALUES ('".mysql_real_escape_string($_GET['name'])."')";
					mysql_query($query);
					$id = mysql_insert_id();
					$sql="UPDATE user_info SET functional_area='$id' WHERE id='$user' ";
						}

						
				   }
			   }
		   }
	}
	if(!empty($_POST['action']) && $_POST['action'] == 'others'){
	escape($_POST);
		if($qualification != ''){
			$sql="UPDATE user_info SET qualification='$qualification' WHERE id='$userid' ";
			$result = $db->query($sql);
			/* email Code Start here */
			$subject =" Modified your qualification";
			$user = new Userlist($userid);
			$u = $user->GetUserInfo();
			$message = "Hello&nbsp;".$u['firstname']."&nbsp;".$u['lastname'].",<br/>
			Welcome to Scan4jobs.Your  qualification is updated .Please login to check. <br/>
			Best Regards,<br/> 
			Scan4jobs Team.<br/>
			http://www.scan4jobs.com.";
			$mail=new Postman();
			$result=$mail->Mailreguser("".$u['email']."", $subject, $message,  "admin@scan4jobs.com");
			/* email Code End here */
			$sql = "DELETE FROM others WHERE user_id='".$userid."' and category='qualification'";
			$result = $db->query($sql);
		}
		if($education != ''){
			$sql="UPDATE user_info SET education_specialization='$education' WHERE id='$userid' ";
			$result = $db->query($sql);
			/* email Code Start here */
			$subject =" Modified your education specialization";
			$user = new Userlist($userid);
			$u = $user->GetUserInfo();
			$message = "Hello&nbsp;".$u['firstname']."&nbsp;".$u['lastname'].",<br/>
			Welcome to Scan4jobs.Your  education specialization is updated .Please login to check. <br/>
			Best Regards,<br/> 
			Scan4jobs Team.<br/>
			http://www.scan4jobs.com.";
			$mail=new Postman();
			$result=$mail->Mailreguser("".$u['email']."", $subject, $message,  "admin@scan4jobs.com");
			/* email Code End here */
			$sql = "DELETE FROM others WHERE user_id='".$userid."' and category='education_list'";
			$result = $db->query($sql);
		}
	}
		$smarty->assign('category' ,$category);
		$smarty->assign('qualification' ,$qualification);
		$smarty->assign('industries' ,$industries);
		$smarty->assign('types_jobs' ,$types_jobs);
		$smarty->assign('user' ,$user_info);
		$smarty->assign('other', get_others());
		$smarty->assign('cities', get_cities());
		$smarty->assign('industries',get_industries());
		$smarty->assign('qualification',get_qualification());
		$smarty->assign('jobslist', jobs_list());
		$smarty->assign('education', education_list());
		$template = 'userothers.tpl'; 
?>
