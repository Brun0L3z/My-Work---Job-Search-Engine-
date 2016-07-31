{include file="header.tpl"}
{literal}
<script type="text/javascript">
function form() {
var keys=document.forms["search"]["title_skills"].value;
var area=document.search.area.value;
	if((keys.length == 0) && (area.length == 0)){
		alert('Please enter Skills or Functional Area of the Job you are searching for');
		return false;
	}
}
</script>
{/literal}
<div id="content">
<div id="advance_search">
	<span style="color:#0070c0;font-size:20px;"><u>{$translations.advance_search.advance_search_title}</u></span>
	<form  method="post" name="search" action="{$BASE_URL}job_search/" onsubmit="return form();">
	<table>
		<tr>
			<td align="right" width="250px;">{$translations.advance_search.keywords}</td>
			<td ><input type="text" name="title_skills" id="search_text" placeholder="{$translations.search.title_skills}" value="{$smarty.post.title_skills}"></td>
		</tr>
		<tr>
			<td align="right" width="250px;">{$translations.advance_search.location}</td>
			<td>
			<input type="text" name="advance_keywords" id="search_text" placeholder="{$translations.search.location}" value="{$smarty.post.advance_keywords}"></td>
		</tr>
		<tr>
			<td align="right" width="250px;">{$translations.advance_search.experience}</td>
			<td>
				<span id="dropdown">
					<select name="minexp" id="list_sd">
						<option value="">{$translations.search.minexp}</option>
						{section name="c" loop=$year}
						<option value="{$year[c].id}" {if $smarty.post.minexp == $year[c].id}selected="selected"{/if}>{$year[c].years}
						</option>
						{/section}
					</select>
				</span>
				<span id="dropdown">
					<select name="maxexp" id="list_sd">
						<option value="">{$translations.search.maxexp}</option>
						{section name="c" loop=$year}
						<option value="{$year[c].id}" {if $smarty.post.maxexp == $year[c].id}selected="selected"{/if}>{$year[c].years}
						</option>
						{/section}
					</select>
				</span>
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
			<td align="right" width="250px;">{$translations.advance_search.salary}</td>
			<td>
			<span id="dropdown">
				<select name="minsalary" id="list_sd">
					<option value="">{$translations.search.minsalary}</option>
					{section name="c" loop=$salary}
					<option value="{$salary[c].id}" {if $smarty.post.minsalary == $salary[c].id}selected="selected"{/if}>{$salary[c].salary}
					</option>
					{/section}
				</select>
			</span>
			<span id="dropdown">
				<select name="maxsalary" id="list_sd">
					<option value="">{$translations.search.maxsalary}</option>
					{section name="c" loop=$salary}
					<option value="{$salary[c].id}" {if $smarty.post.maxsalary == $salary[c].id}selected="selected"{/if}>{$salary[c].salary}
					</option>
				{/section}
				</select>
			</span>
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
			<td align="right" width="250px;">{$translations.advance_search.functional_area}</td>
			<td>
			<span id="dropdown">
				<select name="area" id="list2">/* multiple="yes" size="3">*/
					<option value=""> {$translations.search.area}</option>
					{section name="c" loop=$jobslist}
					<option value="{$jobslist[c].id}" {if $smarty.post.area == $jobslist[c].id}selected="selected"{/if}>{$jobslist[c].name}
					</option>
					{/section}
				</select>
			</span>
			</td>
		</tr>
		<tr>
			<td align="right" width="250px;">{$translations.advance_search.industry}</td>
			<td>
			<span id="dropdown">
				<select name="industry" id="list2">
					<option value=""> {$translations.search.industry}</option>
					{section name="c" loop=$industries}
					<option value="{$industries[c].industry_id}" {if $smarty.post.industry == $industries[c].industry_id}selected="selected"{/if}>{$industries[c].name}
					</option>
					{/section}
				</select>
			</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="padding-left:340px;">
				<input type="image" src="{$BASE_URL}_templates/{$THEME}/img/searchbutton.png" alt="Search" />
				<input type="hidden" name="action" value="search" />
			</td>
		</tr>
	</table>
	</form>
</div><!--advance_search closed-->
{if $rows != ''}
<div id="search_result">
	{if $rows != 1 && $rows != 0}
		<P><b>{$rows}</b><a>{$translations.jobs.avilable}</a></P>
	{elseif $rows == 1}
		<P><b>{$rows}</b><a>{$translations.jobs.onejob}</a></P>
	{else}
		<P><b>0</b><a>{$translations.jobs.avilable}</a></P>
	{/if}
</div>	
{/if}
{if $no_categ != 1}
	{if $jobs}
		{include file="jobs-list.tpl"}
	{else}
		<div id="no-ads">
			{if $norecords == 1}
				{$translations.jobs.no_job_found}<br />
			{/if}
		</div><!-- #no-ads -->
{/if}
{/if}
</div><!-- #content -->
{include file="footer.tpl"}