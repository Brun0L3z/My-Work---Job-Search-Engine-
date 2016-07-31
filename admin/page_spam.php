<?php
class Spam
{
    function __construct()
    { }
 public function count_reports()
    {
        global $db;
       
        $sql = 'SELECT count(distinct job_id) AS totalNumberOfReports
                                FROM '.DB_PREFIX.'spam_reports';
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        $totalNumberOfReports = $row['totalNumberOfReports'];
		return $totalNumberOfReports;
	}

    public function Reports()
    {
        global $db;
       $sql = 'SELECT DISTINCT b.title AS title, b.company AS company, a.job_id AS job_id,sp.counter as counter FROM '.DB_PREFIX.'spam_reports a join  '.DB_PREFIX.'jobs b on a.job_id = b.id
                join (
        select job_id,count(*) as counter  from '.DB_PREFIX.'spam_reports 
        group by job_id) as sp on a.job_id=sp.job_id ORDER BY  counter DESC';
          
        $result = $db->query($sql);
        
        $spam = '';
        while ($row = $result->fetch_assoc())
            /*$spam .= '<div>' . $row['counter'] .     '   <a href="' . BASE_URL . URL_JOB .'/' . $row['job_id'] . '/">' . $row['title'] .  '</a> at '. $row['company'] .' </div>';*/

		$spam[] = array('counter' => $row['counter'] ,'id' => $row['job_id'], 'title' => $row['title'],
			'company' => $row['company']);
       
        return $spam;
    }
}

$spam = new Spam();
$smarty->assign('reports', $spam->Reports());

$smarty->assign('count_reports', $spam->count_reports());


$template = 'spam.tpl';
?>