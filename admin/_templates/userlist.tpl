{include file="header.tpl"}
<div id="content">
	<div><!--empty-->
		<img src="{$BASE_URL_ADMIN}_templates/img/User-Executive-Green-icon.png" width="40" height="40" alt="edit" />
		<h3>{$translations.user_list.list}<h3>
		{$translations.user_list.total_records}{$count}
	</div><!--empty div closed-->
	<div id="userlist">
	
		<table style="border:1px solid black;">
			<tr>
			    <th height="40px" width="100px">{$translations.user_list.id}</th>
			    <th height="40px" width="100px">{$translations.user_list.username}</th>
			    <th height="40px" width="110px">{$translations.user_list.lastname}</th>
			    <th height="40px" width="150px">{$translations.user_list.email}</th>
			    <th height="40px" width="200px">{$translations.user_list.contact_number}</th>
			    <th height="40px" width="150px">{$translations.user_list.resume}</th>
			   <th height="40px" width="100px">{$translations.user_list.delete}</th> 
			</tr>
			{assign var="sno" value="1"}
			{foreach item=user from=$user name=tmp}
			<tr>
				<td height="40px" width="100px" bgcolor="#ffffff" align="center">{$sno}</td>         
				<td height="40px" width="100px" bgcolor="#ffffff">	  		     
				<a {if $CURRENT_PAGE == 'view'}class="selected"{/if} href="{$BASE_URL_ADMIN}view/{$user.id}/">{$user.firstname|escape}</a></td>
				<td height="40px" width="100px" bgcolor="#ffffff">{$user.lastname|escape}</td>
				<td height="40px" width="100px" bgcolor="#ffffff">{$user.email|escape}</td>
				<td height="40px" width="100px" bgcolor="#ffffff">{$user.contact_number|escape}</td>
				<td height="40px" width="100px" bgcolor="#ffffff">
				<a {if $CURRENT_PAGE == 'resume'}class="selected"{/if} href="{$BASE_URL}./{$user.resume_path|escape}" target="_blank"> {$user.resume_path|escape}</a></td>
				<td height="40px" width="100px" bgcolor="#ffffff">
				{*<a href="javascript:void(0);" onclick="JobberUser.Delete('{$BASE_URL_ADMIN}userdelete/', {$user.id});" title="Delete this user"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="delete" /></a>*}
					<a href="{$BASE_URL_ADMIN}user/?mode=delete&id={$user.id}" onclick="return confirm('Are you sure you want to delete?')" title="Delete"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="delete" /></a>
				</td>
			</tr>
			{assign var="sno" value=$sno+1}
			{foreachelse}
				<tr>
					<td colspan="2">{$translations.user_list.user}</td>
				</tr>
			{/foreach}
		</table>
	</div><!--userlist-->
	{$pages}
</div><!-- #content -->
{include file="footer.tpl"}