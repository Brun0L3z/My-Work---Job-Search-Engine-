{include file="header.tpl"}
{literal}
<script type="text/javascript">
function form() {
	var keys=document.forms["search"]["title_skills"].value;
	var location=document.forms["search"]["location"].value;
	var area=document.search.area.value;
	var industry=document.search.industry.value;
	var minexp=document.search.minexp.value;
	var maxexp=document.search.maxexp.value;
	var minsalary=document.search.minsalary.value;
	var maxsalary=document.search.maxsalary.value;
	if((keys == '') && (area == '') && (location == '') && (industry == '') && (minsalary == '') && (maxsalary == '') && (minexp == '') && (maxexp == '')){
		alert("Please fill atleast one filed or select one field");
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
	<span style="color:#7c9843;font-size:20px;"><u>{$translations.advance_search.user_search}</u></span>
	<form  method="post" name="search" action="{$BASE_URL_ADMIN}advance_search/" onsubmit="return form();">
	<table id="advance_search">
		<tr>
			<td align="right">{$translations.advance_search.keywords}</td>
			<td ><input type="text" name="title_skills" id="skills" placeholder="{$translations.search.title_skills}" value="{$smarty.post.title_skills}"></td>
		</tr>
		<tr>
			<td align="right">{$translations.advance_search.location}</td>
			<td>
			<select name="location" id="location">/* multiple="yes" size="3">*/
					<option value=""> {$translations.search.location}</option>
					{section name="c" loop=$cities}
					<option value="{$cities[c].id}" {if $smarty.post.location == $cities[c].id}selected="selected"{/if}>{$cities[c].name}
					</option>
					{/section}
			</select>
			</td>
		</tr>
		<tr>
			<td align="right">{$translations.advance_search.experience}</td>
			<td>
					<select name="minexp" id="minexp">
						<option value="">{$translations.search.minexp}</option>
						{section name="c" loop=$year}
						<option value="{$year[c].id}" {if $smarty.post.minexp == $year[c].id}selected="selected"{/if}>{$year[c].years}
						</option>
						{/section}
					</select>
					<select name="maxexp" id="maxexp">
						<option value="">{$translations.search.maxexp}</option>
						{section name="c" loop=$year}
						<option value="{$year[c].id}" {if $smarty.post.maxexp == $year[c].id}selected="selected"{/if}>{$year[c].years}
						</option>
						{/section}
					</select>
			</td>
		</tr>
		{if $error != ''}
		<tr>
			<td colspan="2" align="right">
				<div class="suggestion">{$error}</div>
				
			</td>
		</tr>
		{/if}
		<tr>
			<td align="right">{$translations.advance_search.salary}</td>
			<td>
				<select name="minsalary" id="minsalary">
					<option value="">{$translations.search.minsalary}</option>
					{section name="c" loop=$salary}
					<option value="{$salary[c].id}" {if $smarty.post.minsalary == $salary[c].id}selected="selected"{/if}>{$salary[c].salary}
					</option>
					{/section}
				</select>
				<select name="maxsalary" id="maxsalary">
					<option value="">{$translations.search.maxsalary}</option>
					{section name="c" loop=$salary}
					<option value="{$salary[c].id}" {if $smarty.post.maxsalary == $salary[c].id}selected="selected"{/if}>{$salary[c].salary}
					</option>
				{/section}
				</select>
			</td>
		</tr>
		{if $salary_error != ''}
		<tr>
			<td colspan="2" align="right">
				<div class="suggestion">{$salary_error}</div>
				
			</td>
		</tr>
		{/if}
		<tr>
			<td align="right">{$translations.advance_search.functional_area}</td>
			<td>
				<select name="area" id="area">/* multiple="yes" size="3">*/
					<option value=""> {$translations.search.area}</option>
					{section name="c" loop=$jobslist}
					<option value="{$jobslist[c].id}" {if $smarty.post.area == $jobslist[c].id}selected="selected"{/if}>{$jobslist[c].name}
					</option>
					{/section}
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">{$translations.advance_search.industry}</td>
			<td>
				<select name="industry" id="industry">
					<option value=""> {$translations.search.industry}</option>
					{section name="c" loop=$industries}
					<option value="{$industries[c].industry_id}" {if $smarty.post.industry == $industries[c].industry_id}selected="selected"{/if}>{$industries[c].name}
					</option>
					{/section}
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="padding-left:340px;">
				<input type="image" src="{$BASE_URL_ADMIN}_templates/img/searchbutton.png" alt="Search" />
				<input type="hidden" name="action" value="search" />
			</td>
		</tr>
	</table>
	</form>
	{if $users != ''}
	{if $rows != ''}
	<div><!--empty-->
	{if $keywords != ''}
		<b>{$translations.advance_search.search_dispaly} <span style="color:#9E3A37;">{$keywords}</span></b>
		<br/>
	{/if}
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
				<td height="40px" width="100px" bgcolor="#ffffff" align="center"><input type="checkbox" name="cbs[]" value={$user.id} class="cb-element" /> {$sno}</td>         
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
					<td colspan="2">{$translations.advance_search.user}</td>
				</tr>
			{/foreach}
			</form>
		</table>
	</div><!--userlist-->
	{$pages}
	{else}
	<b> {$translations.advance_search.no_records}.</b>
	{/if}
	{/if}
</div><!-- #content -->
{include file="footer.tpl"}