<?php

function printr($value)
{
   echo '<div style="position: relative; z-index: 10000; float: left; clear: both;"><table border="0" cellspacing="0" cellpadding="5"><tr>' .
      '<td bgcolor="#C0C000"><font size="1" face="verdana" color="#000000"><b>Debug</b></font></td>' .
      '</tr><tr><td bgcolor="#000000"><pre><font size="1" face="verdana" color="#FFFFFF">'; 

   print_r($value);
      
   echo '</font></pre></td></tr></table></div><div style="clear: both; height: 1px;"></div>';
}

?>