{include file="header.tpl"}
{literal}
<script type="text/javascript">
function form() {
var keys=document.forms["search"]["keywords"].value;
	if(keys == ''){
		alert("Please enter keywords.");
		return false;
	}
}
</script>
{/literal}
{literal}
<script type="text/javascript">
	$(document).ready(function(){
	$('.check:button').toggle(function(){
	$('input:checkbox').attr('checked','checked');
	$(this).val('Uncheck all')
	},function(){
	$('input:checkbox').removeAttr('checked');
	$(this).val('Check all');        
	})
	})
</script>
	{/literal}
<div id="content">
<img src="{$BASE_URL_ADMIN}_templates/img/scan4jobs_search.png" width="60" height="60" alt="search"/>
<h2>{$translations.advance_search.heading}</h2>
	<form  method="post" name="search" action="{$BASE_URL_ADMIN}search/" onsubmit="return form();">
		<table>
			<tr>
				<td><input type="text"  name="keywords" value="{$smarty.post.keywords}"/></td>
				<td>
					<input type="image" src="{$BASE_URL_ADMIN}_templates/img/go.png" alt="GO" />
					<input type="hidden" name="action" value="search"/>
				</td>
			</tr>
		</table>
	</form>
	{if $users != ''}
	{if $rows != ''}
	<div><!--empty-->
		<b>{$translations.advance_search.search_dispaly} <span style="color:#9E3A37;">{$keywords}</span></b>
		<br/>
		<b>{$translations.advance_search.total_records} <span style="color:#9E3A37;">{$rows}</span></b>
	</div><!--empty div closed-->
    <form name="test" method="post" action="{$BASE_URL_ADMIN}userexcel/" >
		<div id="excel">
			<input type="submit"  class="check" value="Export to excel" onclick="return confirm('If u checked the value press Ok \n else press Cancel ')">
		</div><!-- #excel -->
		<tr>

			<th><input type="button" class="check" value="Check all" /></th>

		</tr>
	<div id="userlist">
		<table style="border:1px solid black;">
			<tr>
			    <th height="40px" width="100px">{$translations.user_list.id}</th>
			    <th height="40px" width="100px">{$translations.user_list.username}</th>
			    <th height="40px" width="110px">{$translations.user_list.lastname}</th>
			    <th height="40px" width="150px">{$translations.user_list.email}</th>
			    <th height="40px" width="200px">{$translations.user_list.contact_number}</th>
			    <th height="40px" width="150px">{$translations.user_list.resume}</th>
			   <!-- <th height="40px" width="100px">{$translations.user_list.delete}</th> -->
			</tr>
			{assign var="sno" value="1"}
			{foreach item=user from=$users name=tmp}
			<tr>
				<td height="40px" width="100px" bgcolor="#ffffff" ><input type="checkbox" name="cbs[]" value={$user.id} class="cb-element" /> {$sno}</td>         
				<td height="40px" width="100px" bgcolor="#ffffff">	
				{if $p == 'new_page'}
				<a {if $CURRENT_PAGE == 'view'}class="selected"{/if} target="_blank" href="{$BASE_URL_ADMIN}view/{$user.id}/">{$user.firstname|escape}</a>
				{else}
				<a {if $CURRENT_PAGE == 'view'}class="selected"{/if} href="{$BASE_URL_ADMIN}view/{$user.id}/">{$user.firstname|escape}</a>
				{/if}
				</td>
				<td height="40px" width="100px" bgcolor="#ffffff">{$user.lastname|escape}</td>
				<td height="40px" width="100px" bgcolor="#ffffff">{$user.email|escape}</td>
				<td height="40px" width="100px" bgcolor="#ffffff">{$user.contact_number|escape}</td>
				<td height="40px" width="100px" bgcolor="#ffffff">
				<a {if $CURRENT_PAGE == 'resume'}class="selected"{/if} href="{$BASE_URL}./{$user.resume_path|escape}" target="_blank"> {$user.resume_path|escape}</a></td>
				<!--<td height="40px" width="100px" bgcolor="#ffffff">
				<a href="javascript:void(0);" onclick="JobberUser.Delete('{$BASE_URL_ADMIN}userdelete/', {$user.id});" title="Delete this user"><img src="{$BASE_URL_ADMIN}_templates/img/bin.png" alt="delete" /></a></td>-->
			</tr>
			{assign var="sno" value=$sno+1}
			{foreachelse}
				<tr>
					<td colspan="2">{$translations.user_list.user}</td>
				</tr>
			{/foreach}
			 </form>
		</table>
	</div><!--userlist-->
	{$pages}
	{else}
	<b> {$translations.advance_search.no_records} <span style="color:#9E3A37;">{$smarty.post.keywords}</span>.</b>
	{/if}
	{/if}

</div><!-- #content -->
{include file="footer.tpl"}