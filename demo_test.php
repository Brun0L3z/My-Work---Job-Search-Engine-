<?
function get_cities($id)
{
	$cities='';
	$sql = 'SELECT id,name FROM cities where state_id = '.$id.' ORDER BY name ASC';
	$cities='<select name="search_category"  id="search_category_id"><option value="" selected="selected"></option>';
	$result = mysql_query($sql);
	
	while ($rows =mysql_fetch_assoc($result))
	{
		//$cities[$row['id']] = $row['name'];
	$cities=$cities."<option value=". $rows['id'].">".  $rows['name']."</option>";
	
	}
	$cities=$cities."</select>";
	 
	
	return $cities;
}
 $choices=$_REQUEST['choices'];
print  get_cities($choices);
?>