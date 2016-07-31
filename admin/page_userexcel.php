<?php
$host = 'scan4jobs.db.9771910.hostedresource.com';
$user = 'scan4jobs';
$pass = 'Tech_jobs@2012';
$db = 'scan4jobs';
$table = 'user_info';
$file = 'export';
$csv_output="";
		$fields="id,email,password,contact_number,sms,firstname,lastname,gender,category,city_id, state_id,total_exp,salary,job_title,company_name,industry,functional_area,latest_job_exp, qualification,education_specialization,year_of_passout,institute_name,skills,resume_path,recent_login,created_date"; 
		$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
		mysql_select_db($db) or die("Can not connect.");
		$result = mysql_query("SHOW COLUMNS FROM ".$table."");
		$i = 0;
if (mysql_num_rows($result) > 0) 
{
	while ($row = mysql_fetch_assoc($result))
{
	$csv_output .= '"   ' . $row['Field'].'   ",';
	$i++;
}
}

if(isset($_POST['cbs'])) {
  $cbs[] = implode(",", $_POST['cbs']);  
	} else {
	    $cbs = "";
	}
		 $name=$cbs;
		$csv_output .= "\n";
	$values = mysql_query("SELECT $fields FROM ".$table." WHERE  id  IN(".implode(',',$name).")");
	while ($rowr = mysql_fetch_row($values)) 
{
for ($j=0;$j<$i;$j++) 
{
	$csv_output .= '"   '.$rowr[$j].'   ",';
}
$csv_output .= "\n";
}
$filename = $file."_".date("Y-m-d_H-i",time());
	header("Content-type: application/vnd.ms-excel");
	header("Content-disposition: csv" . date("Y-m-d") . ".csv");
	header( "Content-disposition: filename=".$filename.".csv");
	print $csv_output;
	exit;
?>