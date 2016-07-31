{include file="header.tpl"}
<div id="content">
	<div id="userlist">
		<table style="border:1px solid black;">
			<tr>
			    <th height="40px" width="100">Id</th>
			    <th height="40px" width="100">User Id</th>   
			    <th height="40px" width="100">Category</th>
			    <th height="40px" width="100">Dependent</th>
			    <th height="40px" width="100">Others</th>
                            <th height="40px" width="100">Confirm</th>
			    <th colspan="2" height="40px" width="auto">Related dropdown</th>
			</tr>
			{foreach item=other from=$other name=tmp}
			<form  method="post"action="{$BASE_URL_ADMIN}userothers/?mode=user&userid={$other.user_id}">
				<tr>
					<td height="40px" width="auto" align="center" bgcolor="#ffffff">{$other.id}</td>  
					<td height="40px" width="auto" align="center" bgcolor="#ffffff">{$other.user_id}</td> 
					<td height="40px" width="auto" align="center" bgcolor="#ffffff">{$other.category|escape}</td>
					<td height="40px" width="auto" align="center" bgcolor="#ffffff">{$other.dependent|escape}</td>
					<td height="40px" width="auto" align="center" bgcolor="#ffffff">{$other.others|escape}</td>
					<td height="40px" width="auto" align="center" bgcolor="#ffffff">
						<a href="{$BASE_URL_ADMIN}userothers/?
						other=data&name={$other.others|escape}&category=
						{$other.category|escape}&user={$other.user_id}" 
						onclick="return confirm('Do U want to Active This {$other.category|escape} Category ')" title="active">
						<img id="tick" src="{$BASE_URL_ADMIN}_templates/img/tick.png" alt="delete" /></a>
					</td>
					{assign var="education_list" value=$other.category}
					{assign var="industry" value=$other.category}
					{assign var="qualifica" value=$other.category}
					{assign var="types_jobs" value=$other.category}
					<td height="40px" width="auto" align="center" bgcolor="#ffffff">
				{if $education_list == education_list}
					<span id="dropdown">
					<select name="education"  id="education"  onChange="disp_text()" {if $errors_outside.education_outside_ro_where != 'edu' && $smarty.post.education_outside_ro_where != ''}disabled="disabled"{/if}>
					<option value=""> {$translations.jobs.education}</option>
					{section name="c" loop=$education}
					<option value="{$education[c].id}" {if $smarty.post.education == $education[c].id}selected="selected"{/if}>{$education[c].name}
					</option>
					{/section}
					</select>
					</span>
				{elseif $industry == industries}
					<span id="dropdown">
					<select name="industry" class="list2"  id="usereditlist">
					<option value=""> {$translations.jobs.industry}</option>
					{section name="c" loop=$industries}
					<option value="{$industries[c].industry_id}" {if $smarty.post.industry == $industries[c].industry_id}selected="selected"{/if}>{$industries[c].name}
					</option>
					{/section}
					</select>
					</span>
				{elseif $qualifica == qualification}
					<span id="dropdown">
					<select name="qualification" id="qualification" {if $errors_outside.qualification_outside_ro_where != 'qua' && $smarty.post.qualification_outside_ro_where != ''}disabled="disabled"{/if}>
					<option value=""> {$translations.jobs.qualification}</option>
					{section name="c" loop=$qualification}
					<option value="{$qualification[c].id}" {if $smarty.post.qualification == $qualification[c].id}selected="selected"{/if}>{$qualification[c].qualification}
					</option>
					{/section}
					</select>
					</span>
				 {elseif $types_jobs == types_jobs}	
					<select name="jobslist" class="intro1" id="usereditlist">
						<option value=""> {$translations.jobs.functional_area}</option>
						{section name="c" loop=$jobslist}
						<option value="{$jobslist[c].id}" {if $smarty.post.jobslist== $jobslist[c].id}selected="selected"{/if}>{$jobslist[c].name}
						</option>
						{/section}
						</select>
                                    {/if}
				    </td>
				    <td bgcolor="#ffffff" >
				    <input id="tick" type="image" src="{$BASE_URL_ADMIN}_templates/img/tick.png"onclick="return confirm('Do U want to Active This {$other.category|escape} Category ')"/>
				    <input type="hidden" name="action" value="others" />
			       </td>
			</tr>
		</form>
			    {/foreach}
	</table>
	</div><!--userlist-->
</div><!-- #content -->
{include file="footer.tpl"}
