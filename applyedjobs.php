<?php
$job = new Job();
$smarty->assign('jobs',$job->jobsapplyed());
$template='applyedjobs.tpl';
?>